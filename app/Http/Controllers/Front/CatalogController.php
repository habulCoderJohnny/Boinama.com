<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\Comment;
use App\Models\CrossSellingProduct;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductChildCategory;
use App\Models\Rating;
use App\Models\Reply;
use App\Models\Report;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CatalogController extends Controller
{

    // CATEGORIES SECTOPN

    public function categories()
    {
        return view('front.categories');
    }

    // -------------------------------- CATEGORY SECTION ----------------------------------------

    public function category(Request $request, $slug = null, $slug1 = null, $slug2 = null)
    {

        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        $cat = null;
        $subcat = null;
        $childcat = null;
        $minprice = $request->min;
        $maxprice = $request->max;
        $sort = $request->sort;
        $search = $request->search;
        $minprice = round(($minprice / $curr->value), 2);
        $maxprice = round(($maxprice / $curr->value), 2);

        if (!empty($slug)) {
            $cat = Category::where('slug', $slug)->firstOrFail();
            $data['cat'] = $cat;
        }
        if (!empty($slug1)) {
            $subcat = Subcategory::where('slug', $slug1)->firstOrFail();
            $data['subcat'] = $subcat;
        }
        if (!empty($slug2)) {
            $childcat = Childcategory::where('slug', $slug2)->firstOrFail();
            $data['childcat'] = $childcat;
        }

        $prods = Product::when($cat, function ($query, $cat) {
            return $query->where('category_id', $cat->id);
        })
            ->when($subcat, function ($query, $subcat) {
                return $query->where('subcategory_id', $subcat->id);
            })
            ->when($childcat, function ($query, $childcat) {
                return $query->where('childcategory_id', $childcat->id);
            })
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', '%' . $search . '%');
            })
            ->when($minprice, function ($query, $minprice) {
                return $query->where('price', '>=', $minprice);
            })
            ->when($maxprice, function ($query, $maxprice) {
                return $query->where('price', '<=', $maxprice);
            })
            ->when($sort, function ($query, $sort) {
                if ($sort == 'date_desc') {
                    return $query->orderBy('id', 'DESC');
                } elseif ($sort == 'date_asc') {
                    return $query->orderBy('id', 'ASC');
                } elseif ($sort == 'price_desc') {
                    return $query->orderBy('price', 'DESC');
                } elseif ($sort == 'price_asc') {
                    return $query->orderBy('price', 'ASC');
                }
            })
            ->when(empty($sort), function ($query, $sort) {
                return $query->orderBy('id', 'DESC');
            });

        $prods = $prods->where(function ($query) use ($cat, $subcat, $childcat, $request) {
            $flag = 0;

            if (!empty($cat)) {
                foreach ($cat->attributes as $key => $attribute) {
                    $inname = $attribute->input_name;
                    $chFilters = $request["$inname"];
                    if (!empty($chFilters)) {
                        $flag = 1;
                        foreach ($chFilters as $key => $chFilter) {
                            if ($key == 0) {
                                $query->where('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                            } else {
                                $query->orWhere('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                            }

                        }
                    }
                }
            }

            if (!empty($subcat)) {
                foreach ($subcat->attributes as $attribute) {
                    $inname = $attribute->input_name;
                    $chFilters = $request["$inname"];
                    if (!empty($chFilters)) {
                        $flag = 1;
                        foreach ($chFilters as $key => $chFilter) {
                            if ($key == 0 && $flag == 0) {
                                $query->where('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                            } else {
                                $query->orWhere('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                            }

                        }
                    }

                }
            }

            if (!empty($childcat)) {
                foreach ($childcat->attributes as $attribute) {
                    $inname = $attribute->input_name;
                    $chFilters = $request["$inname"];
                    if (!empty($chFilters)) {
                        $flag = 1;
                        foreach ($chFilters as $key => $chFilter) {
                            if ($key == 0 && $flag == 0) {
                                $query->where('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                            } else {
                                $query->orWhere('attributes', 'like', '%' . '"' . $chFilter . '"' . '%');
                            }
                        }
                    }

                }
            }
        });
        $productId = ProductChildCategory::query();

        if (!empty($data['childcat'])) {
            $productId = $productId->where('childcategory_id', $data['childcat'])->pluck('product_id');
        }
        $productId = $productId->get()->toArray();

// $productId = ProductChildCategory::where('childcategory_id', $data['childcat']->id)->pluck('product_id')->toArray();
        $prods = Product::query();
        if (!empty($productId)) {
            $prods = $prods->whereIn('id', $productId);
        }
        if ($prods->count() > 0) {
            $prods = $prods->get();
        } else {
            $prods = collect([]);
        }

        // <!-- $prods = Product::whereIn('id', $productId)->get(); -->
        $prods = (new Collection(Product::filterProducts($prods)))->paginate(12);
        $data['prods'] = $prods;
        if ($request->ajax()) {

            if (!isset($request->max)) {
                if (!isset($request->page)) {
                    return view('front.category', $data);
                } else {
                    return view('includes.product.filtered-products', $data);
                }
            } else {
                return view('includes.product.filtered-products', $data);
            }
            $data['ajax_check'] = 1;
            return view('includes.product.filtered-products', $data);
        }
        return view('front.category', $data);
    }

    public function getsubs(Request $request)
    {
        $category = Category::where('slug', $request->category)->firstOrFail();
        $subcategories = Subcategory::where('category_id', $category->id)->get();
        return $subcategories;
    }

    // -------------------------------- PRODUCT DETAILS SECTION ----------------------------------------

    public function report(Request $request)
    {
        //--- Validation Section
        $rules = [
            'note' => 'max:400',
        ];
        $customs = [
            'note.max' => 'Note Must Be Less Than 400 Characters.',
        ];
        $validator = Validator::make($request->all(), $rules, $customs);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Report;
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends

    }

    public function product($slug)
    {

        $productt = Product::with("childCategories")->where('slug', '=', $slug)->firstOrFail();

        // $subcategories = Subcategory::whereIn('id', $productt->childCategories->pluck("subcategory_id"))->get();

        $writer = null;
        $category = null;
        foreach ($productt->childCategories as $child) {
            if ($child->subcategory->slug == "Authors") {
                $writer = $child->name;
            }
            if ($child->subcategory->slug == "bisoy") {
                $category = $child->name;
            }
        }

        if ($productt->status == 0) {
            return response()->view('errors.404')->setStatusCode(404);
        }
        $productt->views += 1;
        $productt->update();
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        /*
        $product_click = new ProductClick;
        $product_click->product_id = $productt->id;
        $product_click->date = Carbon::now()->format('Y-m-d');
        $product_click->save();
         */
        $related = Product::where('status', '=', 1)->whereTop(1)->where('id', '!=', $productt->id)->take(8)->get();

        return view('front.product', compact('productt', 'curr', 'related', 'writer', 'category'));

    }

    public function quick($id)
    {
        $product = Product::findOrFail($id);
        if (Session::has('currency')) {
            $curr = Currency::find(Session::get('currency'));
        } else {
            $curr = Currency::where('is_default', '=', 1)->first();
        }
        return view('load.quick', compact('product', 'curr'));

    }

    public function affProductRedirect($slug)
    {
        $product = Product::where('slug', '=', $slug)->first();
//        $product->views+=1;
//        $product->update();

        return redirect($product->affiliate_link);

    }
    // -------------------------------- PRODUCT DETAILS SECTION ENDS----------------------------------------

    // -------------------------------- PRODUCT COMMENT SECTION ----------------------------------------

    public function comment(Request $request)
    {
        $comment = new Comment;
        $input = $request->all();
        $comment->fill($input)->save();
        $comments = Comment::where('product_id', '=', $request->product_id)->get()->count();
        $data[0] = $comment->user->photo ? url('assets/images/users/' . $comment->user->photo) : url('assets/images/noimage.png');
        $data[1] = $comment->user->name;
        $data[2] = $comment->created_at->diffForHumans();
        $data[3] = $comment->text;
        $data[4] = $comments;
        $data[5] = route('product.comment.delete', $comment->id);
        $data[6] = route('product.comment.edit', $comment->id);
        $data[7] = route('product.reply', $comment->id);
        $data[8] = $comment->user->id;
        return response()->json($data);
    }

    public function commentedit(Request $request, $id)
    {
        $comment = Comment::findOrFail($id);
        $comment->text = $request->text;
        $comment->update();
        return response()->json($comment->text);
    }

    public function commentdelete($id)
    {
        $comment = Comment::findOrFail($id);
        if ($comment->replies->count() > 0) {
            foreach ($comment->replies as $reply) {
                $reply->delete();
            }
        }
        $comment->delete();
    }

    // -------------------------------- PRODUCT COMMENT SECTION ENDS ----------------------------------------

    // -------------------------------- PRODUCT REPLY SECTION ----------------------------------------

    public function reply(Request $request, $id)
    {
        $reply = new Reply;
        $input = $request->all();
        $input['comment_id'] = $id;
        $reply->fill($input)->save();
        $data[0] = $reply->user->photo ? url('assets/images/users/' . $reply->user->photo) : url('assets/images/noimage.png');
        $data[1] = $reply->user->name;
        $data[2] = $reply->created_at->diffForHumans();
        $data[3] = $reply->text;
        $data[4] = route('product.reply.delete', $reply->id);
        $data[5] = route('product.reply.edit', $reply->id);
        return response()->json($data);
    }

    public function replyedit(Request $request, $id)
    {
        $reply = Reply::findOrFail($id);
        $reply->text = $request->text;
        $reply->update();
        return response()->json($reply->text);
    }

    public function replydelete($id)
    {
        $reply = Reply::findOrFail($id);
        $reply->delete();
    }

    // -------------------------------- PRODUCT REPLY SECTION ENDS----------------------------------------

    // ------------------ Rating SECTION --------------------

    public function reviewsubmit(Request $request)
    {
        $ck = 0;
        $orders = Order::where('user_id', '=', $request->user_id)->where('status', '=', 'completed')->get();

        foreach ($orders as $order) {
            $cart = unserialize(gzdecode(utf8_decode($order->cart)));
            foreach ($cart->items as $product) {
                if ($request->product_id == $product['item']['id']) {
                    $ck = 1;
                    break;
                }
            }
        }
        if ($ck == 1) {
            $user = Auth::guard('web')->user();
            $prev = Rating::where('product_id', '=', $request->product_id)->where('user_id', '=', $user->id)->get();
            if (count($prev) > 0) {
                return response()->json(array('errors' => [0 => 'You Have Reviewed Already.']));
            }
            $Rating = new Rating;
            $Rating->fill($request->all());
            $Rating['review_date'] = date('Y-m-d H:i:s');
            $Rating->save();
            $data[0] = 'Your Rating Submitted Successfully.';
            $data[1] = Rating::rating($request->product_id);
            return response()->json($data);
        } else {
            return response()->json(array('errors' => [0 => 'Buy This Product First']));
        }
    }

    public function reviews($id)
    {
        $productt = Product::find($id);
        return view('load.reviews', compact('productt', 'id'));

    }

    // ------------------ Rating SECTION ENDS --------------------

    public function crossSell($id)
    {
        $product = Product::find($id);

        $crprods = CrossSellingProduct::where('product_id', $id)->get();
        $countCrprods = count($crprods);

        $left = 6 - $countCrprods;

        $relatedProds = [];
        $crossIds = [];

        foreach ($crprods as $key => $crprod) {
            if ($crprod != $id) {
                $crossIds[] = $crprod->cross_selling_product_id;
            }

        }

        $term = Str::slug($product->name, ' ');

        // check if the product's childcategory is in `cs_category_relations` table
        if (!empty($product->childcategory->category_relation)) {

            $sType = $product->childcategory->category_relation->search_type;
            // if related with 'category' then show products under that category
            if ($product->childcategory->category_relation->cs_category_type == 'App\Models\Category') {
                $relatedProds = Product::where('category_id', $product->childcategory->category_relation->cs_category_id)
                    ->whereNotIn('id', $crossIds)
                    ->when($sType == 'keyword', function ($query) use ($term) {
                        return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', array($term));
                    }, function ($query) {
                        return $query->inRandomOrder();
                    })->limit($left)->get();
            }
            // if related with 'subcategory' then show products under that subcategory
            elseif ($product->childcategory->category_relation->cs_category_type == 'App\Models\Subcategory') {
                $relatedProds = Product::where('subcategory_id', $product->childcategory->category_relation->cs_category_id)
                    ->whereNotIn('id', $crossIds)
                    ->when($sType == 'keyword', function ($query) use ($term) {
                        return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', array($term));
                    }, function ($query) {
                        return $query->inRandomOrder();
                    })->limit($left)->get();
            }
            // if related with 'childcategory' then show products under that childcategory
            elseif ($product->childcategory->category_relation->cs_category_type == 'App\Models\Childcategory') {
                $relatedProds = Product::where('childcategory_id', $product->childcategory->category_relation->cs_category_id)
                    ->whereNotIn('id', $crossIds)
                    ->when($sType == 'keyword', function ($query) use ($term) {
                        return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', array($term));
                    }, function ($query) {
                        return $query->inRandomOrder();
                    })->limit($left)->get();
            }
        }

        // check if the product's subcategory is in `cs_category_relations` table
        elseif (!empty($product->subcategory->category_relation)) {

            $sType = $product->subcategory->category_relation->search_type;

            // if related with 'category' then show products under that category
            if ($product->subcategory->category_relation->cs_category_type == 'App\Models\Category') {
                $relatedProds = Product::where('category_id', $product->subcategory->category_relation->cs_category_id)
                    ->whereNotIn('id', $crossIds)
                    ->when($sType == 'keyword', function ($query) use ($term) {
                        return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', array($term));
                    }, function ($query) {
                        return $query->inRandomOrder();
                    })->limit($left)->get();
            }
            // if related with 'subcategory' then show products under that subcategory
            elseif ($product->subcategory->category_relation->cs_category_type == 'App\Models\Subcategory') {
                $relatedProds = Product::where('subcategory_id', $product->subcategory->category_relation->cs_category_id)
                    ->whereNotIn('id', $crossIds)
                    ->when($sType == 'keyword', function ($query) use ($term) {
                        return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', array($term));
                    }, function ($query) {
                        return $query->inRandomOrder();
                    })->limit($left)->get();
            }
            // if related with 'childcategory' then show products under that childcategory
            elseif ($product->subcategory->category_relation->cs_category_type == 'App\Models\Childcategory') {

                $relatedProds = Product::where('childcategory_id', $product->subcategory->category_relation->cs_category_id)
                    ->whereNotIn('id', $crossIds)
                    ->when($sType == 'keyword', function ($query) use ($term) {
                        return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', array($term));
                    }, function ($query) {
                        return $query->inRandomOrder();
                    })->limit($left)->get();
            }

        }

        // check if the product's category is in `cs_category_relations` table
        elseif (!empty($product->category->category_relation)) {

            $sType = $product->category->category_relation->search_type;
            // if related with 'category' then show products under that category
            if ($product->category->category_relation->cs_category_type == 'App\Models\Category') {
                $relatedProds = Product::where('category_id', $product->category->category_relation->cs_category_id)
                    ->whereNotIn('id', $crossIds)
                    ->when($sType == 'keyword', function ($query) use ($term) {
                        return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', array($term));
                    }, function ($query) {
                        return $query->inRandomOrder();
                    })->limit($left)->get();
            }
            // if related with 'subcategory' then show products under that subcategory
            elseif ($product->category->category_relation->cs_category_type == 'App\Models\Subcategory') {
                $relatedProds = Product::where('subcategory_id', $product->category->category_relation->cs_category_id)
                    ->whereNotIn('id', $crossIds)
                    ->when($sType == 'keyword', function ($query) use ($term) {
                        return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', array($term));
                    }, function ($query) {
                        return $query->inRandomOrder();
                    })->limit($left)->get();
            }
            // if related with 'childcategory' then show products under that childcategory
            elseif ($product->category->category_relation->cs_category_type == 'App\Models\Childcategory') {
                $relatedProds = Product::where('childcategory_id', $product->category->category_relation->cs_category_id)
                    ->whereNotIn('id', $crossIds)
                    ->when($sType == 'keyword', function ($query) use ($term) {
                        return $query->whereRaw('MATCH (name) AGAINST (? IN BOOLEAN MODE)', array($term));
                    }, function ($query) {
                        return $query->inRandomOrder();
                    })->limit($left)->get();
            }
        }

        // return response()->json(['crprods' => $crprods, 'relatedprods' => $relatedProds]);

        return view('load.cross-selling', compact('crprods', 'relatedProds'));

    }

}
