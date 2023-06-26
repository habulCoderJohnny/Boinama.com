<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeOption;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\CrossSellingProduct;
use App\Models\Currency;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\ProductChildCategory;
use App\Models\Subcategory;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Image;
// use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Product::where('product_type', '=', 'normal')->orderBy('id', 'desc');
        //--- Integrating This Collection Into Datatables
        return DataTables::of($datas)
            ->editColumn('name', function (Product $data) {
                $name = mb_strlen($data->name, 'UTF-8') > 50 ? mb_substr($data->name, 0, 50, 'UTF-8') . '...' : $data->name;

                $id = '<small>' . __("ID") . ': <a href="' . route('front.product', $data->slug) . '" target="_blank">' . sprintf("%'.08d", $data->id) . '</a></small>';

                $id3 = $data->type == 'Physical' ? '<small class="ml-2"> ' . __("SKU") . ': <a href="' . route('front.product', $data->slug) . '" target="_blank">' . $data->sku . '</a>' : '';

                return $name . '<br>' . $id . $id3;
            })
            ->editColumn('sku', function (Product $data) {
                $sku = '<a href="' . route('front.product', $data->slug) . '" target="_blank">' . $data->sku . '</a>';
                return $sku;
            })
            ->editColumn('price', function (Product $data) {
                $sign = Currency::where('is_default', '=', 1)->first();
                $price = round($data->price * $sign->value, 2);
                $price = $sign->sign . $price;
                return $price;
            })
            ->editColumn('stock', function (Product $data) {
                $stck = (string) $data->stock;
                if ($stck == "0") {
                    return "Out Of Stock";
                } elseif ($stck == null) {
                    return "Unlimited";
                } else {
                    return $data->stock;
                }

            })
            ->addColumn('status', function (Product $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-prod-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>Activated</option><<option data-val="0" value="' . route('admin-prod-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>Deactivated</option>/select></div>';
            })
            ->addColumn('action', function (Product $data) {
                $catalog = $data->type == 'Physical' ? ($data->is_catalog == 1 ? '<a href="javascript:;" data-href="' . route('admin-prod-catalog', ['id1' => $data->id, 'id2' => 0]) . '" data-toggle="modal" data-target="#catalog-modal" class="delete"><i class="fas fa-trash-alt"></i> Remove Catalog</a>' : '<a href="javascript:;" data-href="' . route('admin-prod-catalog', ['id1' => $data->id, 'id2' => 1]) . '" data-toggle="modal" data-target="#catalog-modal"> <i class="fas fa-plus"></i> Add To Catalog</a>') : '';
                return '<div class="godropdown"><button class="go-dropdown-toggle"> Actions<i class="fas fa-chevron-down"></i></button><div class="action-list"><a href="' . route('admin-prod-edit', $data->id) . '"> <i class="fas fa-edit"></i> Edit</a><a href="javascript" class="set-gallery" data-toggle="modal" data-target="#setgallery"><input type="hidden" value="' . $data->id . '"><i class="fas fa-eye"></i> View Gallery</a>' . $catalog . '<a data-href="' . route('admin-prod-feature', $data->id) . '" class="feature" data-toggle="modal" data-target="#modal2"> <i class="fas fa-star"></i> Highlight</a><a href="javascript:;" data-href="' . route('admin-prod-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i> Delete</a></div></div>';
            })
            ->rawColumns(['name', 'status', 'action', 'sku'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** JSON Request
    public function deactivedatatables()
    {
        $datas = Product::where('status', '=', 0)->orderBy('id', 'desc');

        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('name', function (Product $data) {
                $name = mb_strlen($data->name, 'UTF-8') > 50 ? mb_substr($data->name, 0, 50, 'UTF-8') . '...' : $data->name;

                $id = '<small>' . __("ID") . ': <a href="' . route('front.product', $data->slug) . '" target="_blank">' . sprintf("%'.08d", $data->id) . '</a></small>';

                $id3 = $data->type == 'Physical' ? '<small class="ml-2"> ' . __("SKU") . ': <a href="' . route('front.product', $data->slug) . '" target="_blank">' . $data->sku . '</a>' : '';

                return $name . '<br>' . $id . $id3;
            })
            ->editColumn('price', function (Product $data) {
                $sign = Currency::where('is_default', '=', 1)->first();
                $price = round($data->price * $sign->value, 2);
                $price = $sign->sign . $price;
                return $price;
            })
            ->editColumn('stock', function (Product $data) {
                $stck = (string) $data->stock;
                if ($stck == "0") {
                    return "Out Of Stock";
                } elseif ($stck == null) {
                    return "Unlimited";
                } else {
                    return $data->stock;
                }

            })
            ->addColumn('status', function (Product $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-prod-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>Activated</option><<option data-val="0" value="' . route('admin-prod-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>Deactivated</option>/select></div>';
            })
            ->addColumn('action', function (Product $data) {
                $catalog = $data->type == 'Physical' ? ($data->is_catalog == 1 ? '<a href="javascript:;" data-href="' . route('admin-prod-catalog', ['id1' => $data->id, 'id2' => 0]) . '" data-toggle="modal" data-target="#catalog-modal" class="delete"><i class="fas fa-trash-alt"></i> Remove Catalog</a>' : '<a href="javascript:;" data-href="' . route('admin-prod-catalog', ['id1' => $data->id, 'id2' => 1]) . '" data-toggle="modal" data-target="#catalog-modal"> <i class="fas fa-plus"></i> Add To Catalog</a>') : '';
                return '<div class="godropdown"><button class="go-dropdown-toggle"> Actions<i class="fas fa-chevron-down"></i></button><div class="action-list"><a href="' . route('admin-prod-edit', $data->id) . '"> <i class="fas fa-edit"></i> Edit</a><a href="javascript" class="set-gallery" data-toggle="modal" data-target="#setgallery"><input type="hidden" value="' . $data->id . '"><i class="fas fa-eye"></i> View Gallery</a>' . $catalog . '<a data-href="' . route('admin-prod-feature', $data->id) . '" class="feature" data-toggle="modal" data-target="#modal2"> <i class="fas fa-star"></i> Highlight</a><a href="javascript:;" data-href="' . route('admin-prod-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i> Delete</a></div></div>';
            })
            ->rawColumns(['name', 'status', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** JSON Request
    public function catalogdatatables()
    {
        $datas = Product::where('is_catalog', '=', 1)->orderBy('id', 'desc');

        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->editColumn('name', function (Product $data) {
                $name = mb_strlen(strip_tags($data->name), 'utf-8') > 50 ? mb_substr(strip_tags($data->name), 0, 50, 'utf-8') . '...' : strip_tags($data->name);
                $id = '<small>ID: <a href="' . route('front.product', $data->slug) . '" target="_blank">' . sprintf("%'.08d", $data->id) . '</a></small>';

                $id3 = $data->type == 'Physical' ? '<small class="ml-2"> SKU: <a href="' . route('front.product', $data->slug) . '" target="_blank">' . $data->sku . '</a>' : '';

                return $name . '<br>' . $id . $id3;
            })
            ->editColumn('price', function (Product $data) {
                $sign = Currency::where('is_default', '=', 1)->first();
                $price = round($data->price * $sign->value, 2);
                $price = $sign->sign . $price;
                return $price;
            })
            ->editColumn('stock', function (Product $data) {
                $stck = (string) $data->stock;
                if ($stck == "0") {
                    return "Out Of Stock";
                } elseif ($stck == null) {
                    return "Unlimited";
                } else {
                    return $data->stock;
                }

            })
            ->addColumn('status', function (Product $data) {
                $class = $data->status == 1 ? 'drop-success' : 'drop-danger';
                $s = $data->status == 1 ? 'selected' : '';
                $ns = $data->status == 0 ? 'selected' : '';
                return '<div class="action-list"><select class="process select droplinks ' . $class . '"><option data-val="1" value="' . route('admin-prod-status', ['id1' => $data->id, 'id2' => 1]) . '" ' . $s . '>Activated</option><<option data-val="0" value="' . route('admin-prod-status', ['id1' => $data->id, 'id2' => 0]) . '" ' . $ns . '>Deactivated</option>/select></div>';
            })
            ->addColumn('action', function (Product $data) {
                return '<div class="godropdown"><button class="go-dropdown-toggle"> Actions<i class="fas fa-chevron-down"></i></button><div class="action-list"><a href="' . route('admin-prod-edit', $data->id) . '"> <i class="fas fa-edit"></i> Edit</a><a href="javascript" class="set-gallery" data-toggle="modal" data-target="#setgallery"><input type="hidden" value="' . $data->id . '"><i class="fas fa-eye"></i> View Gallery</a><a data-href="' . route('admin-prod-feature', $data->id) . '" class="feature" data-toggle="modal" data-target="#modal2"> <i class="fas fa-star"></i> Highlight</a><a href="javascript:;" data-href="' . route('admin-prod-catalog', ['id1' => $data->id, 'id2' => 0]) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i> Remove Catalog</a></div></div>';
            })
            ->rawColumns(['name', 'status', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.product.index');
    }

    //*** GET Request
    public function deactive()
    {
        return view('admin.product.deactive');
    }

    //*** GET Request
    public function catalogs()
    {
        return view('admin.product.catalog');
    }

    //*** GET Request
    public function types()
    {
        return view('admin.product.types');
    }

    //*** GET Request
    public function createPhysical()
    {
        $cats = Category::all();
        $sign = Currency::where('is_default', '=', 1)->first();
        $products = Product::where('status', 1)->orderBy('name', 'ASC')->get();
        return view('admin.product.create.physical', compact('cats', 'sign', 'products'));
    }

    //*** GET Request
    public function createDigital()
    {
        $cats = Category::all();
        $sign = Currency::where('is_default', '=', 1)->first();
        $products = Product::where('status', 1)->orderBy('name', 'ASC')->get();
        return view('admin.product.create.digital', compact('cats', 'sign', 'products'));
    }

    //*** GET Request
    public function createLicense()
    {
        $cats = Category::all();
        $sign = Currency::where('is_default', '=', 1)->first();
        $products = Product::where('status', 1)->orderBy('name', 'ASC')->get();
        return view('admin.product.create.license', compact('cats', 'sign', 'products'));
    }

    //*** GET Request
    public function status($id1, $id2)
    {
        $data = Product::findOrFail($id1);
        $data->status = $id2;
        $data->update();
    }

    //*** GET Request
    public function catalog($id1, $id2)
    {
        $data = Product::findOrFail($id1);
        $data->is_catalog = $id2;
        $data->update();
        if ($id2 == 1) {
            $msg = "Product added to catalog successfully.";
        } else {
            $msg = "Product removed from catalog successfully.";
        }

        return response()->json($msg);

    }

    //*** POST Request
    public function uploadUpdate(Request $request, $id)
    {
        //--- Validation Section
        $rules = [
            'image' => 'required',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $data = Product::findOrFail($id);

        //--- Validation Section Ends
        $image = $request->image;
        list($type, $image) = explode(';', $image);
        list(, $image) = explode(',', $image);
        $image = base64_decode($image);
        $image_name = Str::random(10) . '.png';
        $path = 'assets/images/products/' . $image_name;
        file_put_contents($path, $image);
        if ($data->photo != null) {
            if (file_exists(public_path() . '/assets/images/products/' . $data->photo)) {
                unlink(public_path() . '/assets/images/products/' . $data->photo);
            }
        }
        $input['photo'] = $image_name;
        $data->update($input);
        if ($data->thumbnail != null) {
            if (file_exists(public_path() . '/assets/images/thumbnails/' . $data->thumbnail)) {
                unlink(public_path() . '/assets/images/thumbnails/' . $data->thumbnail);
            }
        }

        $img = Image::make(public_path() . '/assets/images/products/' . $data->photo)->resize(350, 500);
        $thumbnail = Str::random(10) . '.jpg';
        $img->save(public_path() . '/assets/images/thumbnails/' . $thumbnail);
        $data->thumbnail = $thumbnail;
        $data->update();
        return response()->json(['status' => true, 'file_name' => $image_name]);
    }

    //*** POST Request
    public function store(Request $request)
    {

        if (!empty($request->cs_products)) {
            $request->cs_products = $request->cs_products;
        } else {
            $request->cs_products = [];
        }
        $crossCount = count($request->cs_products);

        //--- Validation Section
        $rules = [
            'photo' => 'required',
            'file' => 'mimes:zip',
            'cs_products' => [
                'nullable',
                function ($attribute, $value, $fail) use ($crossCount) {
                    if ($crossCount > 6) {
                        $fail('Maximum 6 cross selling products can be added.');
                    }
                },
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new Product;
        $sign = Currency::where('is_default', '=', 1)->first();

        $input = $request->except(["subcategory_id", "child_id"]);

        // Check File
        if ($file = $request->file('file')) {
            $name = time() . str_replace(' ', '', $file->getClientOriginalName());
            $file->move('assets/files', $name);
            $input['file'] = $name;
        }
        $image = $request->photo;
        list($type, $image) = explode(';', $image);
        list(, $image) = explode(',', $image);
        $image = base64_decode($image);
        $image_name = Str::random(10) . '.png';
        $path = 'assets/images/products/' . $image_name;
        file_put_contents($path, $image);
        $input['photo'] = $image_name;

        $pdfName = null;

        if ($pdfFile = $request->file('pdf')) {
            $pdfName = uniqid() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move('assets/files', $pdfName);
        }
        $input['pdf'] = $pdfName;

        // Check Physical
        if ($request->type == "Physical") {
            //--- Validation Section
            $rules = ['sku' => 'min:8|unique:products'];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
            //--- Validation Section Ends

            // Check Condition
            if ($request->product_condition_check == "") {
                $input['product_condition'] = 0;
            }

            // Check Shipping Time
            if ($request->shipping_time_check == "") {
                $input['ship'] = null;
            }

            // Check Size
            if (empty($request->size_check)) {
                $input['size'] = null;
                $input['size_qty'] = null;
                $input['size_price'] = null;
            } else {
                if (in_array(null, $request->size) || in_array(null, $request->size_qty)) {
                    $input['size'] = null;
                    $input['size_qty'] = null;
                    $input['size_price'] = null;
                } else {
                    if (in_array(0, $input['size_qty'])) {
                        return response()->json(array('errors' => [0 => 'Size Qty can not be 0.']));
                    }

                    $input['size'] = implode(',', array_filter($request->size));
                    $input['size_qty'] = implode(',', array_filter($request->size_qty));

                    $size_prices = $request->size_price;
                    $s_price = array();
                    foreach ($size_prices as $key => $sPrice) {
                        $s_price[$key] = $sPrice / $sign->value;
                    }

                    $input['size_price'] = implode(',', $s_price);
                }
            }

            // Check Whole Sale
            if (empty($request->whole_check)) {
                $input['whole_sell_qty'] = null;
                $input['whole_sell_discount'] = null;
            } else {
                if (in_array(null, $request->whole_sell_qty) || in_array(null, $request->whole_sell_discount)) {
                    $input['whole_sell_qty'] = null;
                    $input['whole_sell_discount'] = null;
                } else {
                    $input['whole_sell_qty'] = implode(',', $request->whole_sell_qty);
                    $input['whole_sell_discount'] = implode(',', $request->whole_sell_discount);
                }
            }

            // Check Color
            if (empty($request->color_check)) {
                $input['color'] = null;
            } else {
                $input['color'] = implode(',', $request->color);
            }

            // Check Measurement
            if ($request->mesasure_check == "") {
                $input['measure'] = null;
            }

        }

        // Check Seo
        if (empty($request->seo_check)) {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
        } else {
            if (!empty($request->meta_tag)) {
                $input['meta_tag'] = implode(',', $request->meta_tag);
            }
        }

        // Check License

        if ($request->type == "License") {

            if (in_array(null, $request->license) || in_array(null, $request->license_qty)) {
                $input['license'] = null;
                $input['license_qty'] = null;
            } else {
                $input['license'] = implode(',,', $request->license);
                $input['license_qty'] = implode(',', $request->license_qty);
            }

        }

        // Check Features
        if (in_array(null, $request->features) || in_array(null, $request->colors)) {
            $input['features'] = null;
            $input['colors'] = null;
        } else {
            $input['features'] = implode(',', str_replace(',', ' ', $request->features));
            $input['colors'] = implode(',', str_replace(',', ' ', $request->colors));
        }

        //tags
        if (!empty($request->tags)) {
            $input['tags'] = implode(',', $request->tags);
        }

        // Conert Price According to Currency
        $input['price'] = ($input['price'] / $sign->value);
        $input['previous_price'] = ($input['previous_price'] / $sign->value);

        // store filtering attributes for physical product
        $attrArr = [];
        if (!empty($request->category_id)) {
            $catAttrs = Attribute::where('attributable_id', $request->category_id)->where('attributable_type', 'App\Models\Category')->get();
            if (!empty($catAttrs)) {
                foreach ($catAttrs as $key => $catAttr) {
                    $in_name = $catAttr->input_name;
                    if ($request->has("$in_name")) {
                        $attrArr["$in_name"]["values"] = implode(',', $request["$in_name"]);
                        $attrArrCategoryPrices = implode(',', $request["$in_name" . "_price"]);

                        if (count($attrArrCategoryPrices) > 0) {
                            foreach ($attrArrCategoryPrices as $attrArrCategoryPrice) {
                                $attrArr["$in_name"]["prices"][] = ($attrArrCategoryPrice / $sign->value);
                            }
                        }
                        if ($catAttr->details_status) {
                            $attrArr["$in_name"]["details_status"] = 1;
                        } else {
                            $attrArr["$in_name"]["details_status"] = 0;
                        }
                    }
                }
            }
        }

        if (!empty($request->subcategory_id)) {
            $subAttrs = Attribute::whereIn('attributable_id', $request->subcategory_id)->where('attributable_type', 'App\Models\Subcategory')->get();
            if (!empty($subAttrs)) {
                foreach ($subAttrs as $key => $subAttr) {
                    $in_name = $subAttr->input_name;
                    if ($request->has("$in_name")) {
                        $attrArr["$in_name"]["values"] = $request["$in_name"];
                        $attrArrSubCategoryPrices = $request["$in_name" . "_price"];
                        if (count($attrArrSubCategoryPrices) > 0) {
                            foreach ($attrArrSubCategoryPrices as $attrArrSubCategoryPrice) {
                                $attrArr["$in_name"]["prices"][] = ($attrArrSubCategoryPrice / $sign->value);
                            }
                        }
                        if ($subAttr->details_status) {
                            $attrArr["$in_name"]["details_status"] = 1;
                        } else {
                            $attrArr["$in_name"]["details_status"] = 0;
                        }
                    }
                }
            }
        }
        if (!empty($request->childcategory_id)) {
            $childAttrs = Attribute::whereIn('attributable_id', $request->childcategory_id)->where('attributable_type', 'App\Models\Childcategory')->get();
            if (!empty($childAttrs)) {
                foreach ($childAttrs as $key => $childAttr) {
                    $in_name = $childAttr->input_name;
                    if ($request->has("$in_name")) {
                        $attrArr["$in_name"]["values"] = $request["$in_name"];
                        $attrArrChildCategoryPrices = $request["$in_name" . "_price"];
                        if (count($attrArrChildCategoryPrices) > 0) {
                            foreach ($attrArrChildCategoryPrices as $attrArrChildCategoryPrice) {
                                $attrArr["$in_name"]["prices"][] = ($attrArrChildCategoryPrice / $sign->value);
                            }
                        }
                        if ($childAttr->details_status) {
                            $attrArr["$in_name"]["details_status"] = 1;
                        } else {
                            $attrArr["$in_name"]["details_status"] = 0;
                        }
                    }
                }
            }
        }

        if (empty($attrArr)) {
            $input['attributes'] = null;
        } else {
            $jsonAttr = json_encode($attrArr);
            $input['attributes'] = $jsonAttr;
        }
        $data->fill($input)->save();

        // "subcategory_id", "child_id"

        // Set SLug

        $prod = Product::find($data->id);
        if ($prod->type != 'Physical') {
            $prod->slug = Str::slug($data->name, '-') . '-' . strtolower(Str::random(3) . $data->id . Str::random(3));
        } else {
            $prod->slug = Str::slug($data->name, '-') . '-' . strtolower($data->sku);
        }

        $childCategory = [];

        foreach ($request->child_id as $key => $child) {
            array_push($childCategory, ["product_id" => $prod->id, "childcategory_id" => $child, "created_at" => now(), "updated_at" => now()]);
        }
        ProductChildCategory::insert($childCategory);

        // Set Thumbnail
        $img = Image::make(public_path() . '/assets/images/products/' . $prod->photo)->resize(350, 500);
        $thumbnail = Str::random(10) . '.jpg';
        $img->save(public_path() . '/assets/images/thumbnails/' . $thumbnail);
        $prod->thumbnail = $thumbnail;
        $prod->update();

        // Add To Gallery If any
        $lastid = $data->id;

        if ($files = $request->file('gallery')) {
            foreach ($files as $key => $file) {
                $gallery = new Gallery;
                $name = time() . str_replace(' ', '', $file->getClientOriginalName());
                $file->move('assets/images/galleries', $name);
                $gallery['photo'] = $name;
                $gallery['product_id'] = $lastid;
                $gallery->save();
            }
        }
        //logic Section Ends

        // Add cross selling products
        $csprods = $request->cs_products;
        foreach ($csprods as $key => $csprod) {
            $prod = new CrossSellingProduct();
            $prod->product_id = $data->id;
            $prod->cross_selling_product_id = $csprod;
            $prod->type = 'admin';
            $prod->save();
        }

        //--- Redirect Section
        $msg = 'New Product Added Successfully.<a href="' . route('admin-prod-index') . '">View Product Lists.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** POST Request
    public function import()
    {

        $cats = Category::all();
        $sign = Currency::where('is_default', '=', 1)->first();
        return view('admin.product.productcsv', compact('cats', 'sign'));
    }

    public function importSubmit(Request $request)
    {
        $log = "";
        //--- Validation Section
        $rules = [
            'csvfile' => 'required|mimes:csv,txt',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }

        $filename = '';
        if ($file = $request->file('csvfile')) {
            $filename = time() . '-' . $file->getClientOriginalName();
            $file->move('assets/temp_files', $filename);
        }

        //$filename = $request->file('csvfile')->getClientOriginalName();
        //return response()->json($filename);
        $datas = "";

        $file = fopen(public_path('assets/temp_files/' . $filename), "r");
        $i = 1;
        while (($line = fgetcsv($file)) !== false) {

            if ($i != 1) {

                if (!Product::where('sku', $line[0])->exists()) {

                    //--- Validation Section Ends

                    //--- Logic Section
                    $data = new Product;
                    $sign = Currency::where('is_default', '=', 1)->first();

                    $input['type'] = 'Physical';
                    $input['sku'] = $line[0];

                    $input['category_id'] = null;
                    $input['subcategory_id'] = null;
                    $input['childcategory_id'] = null;

                    $mcat = Category::where(DB::raw('lower(name)'), strtolower($line[1]));
                    //$mcat = Category::where("name", $line[1]);

                    if ($mcat->exists()) {
                        $input['category_id'] = $mcat->first()->id;

                        if ($line[2] != "") {
                            $scat = Subcategory::where(DB::raw('lower(name)'), strtolower($line[2]));

                            if ($scat->exists()) {
                                $input['subcategory_id'] = $scat->first()->id;
                            }
                        }
                        if ($line[3] != "") {
                            $chcat = Childcategory::where(DB::raw('lower(name)'), strtolower($line[3]));

                            if ($chcat->exists()) {
                                $input['childcategory_id'] = $chcat->first()->id;
                            }
                        }

                        $input['photo'] = $line[5];
                        $input['name'] = $line[4];
                        $input['details'] = $line[6];
                        $input['color'] = $line[13];
                        $input['price'] = $line[7];
                        $input['previous_price'] = $line[8] != "" ? $line[8] : null;
                        $input['stock'] = $line[9];
                        $input['size'] = $line[10];
                        $input['size_qty'] = $line[11];
                        $input['size_price'] = $line[12];
                        $input['youtube'] = $line[15];
                        $input['policy'] = $line[16];
                        $input['meta_tag'] = $line[17];
                        $input['meta_description'] = $line[18];
                        $input['tags'] = $line[14];
                        $input['product_type'] = $line[19];
                        $input['affiliate_link'] = $line[20];
                        $input['slug'] = Str::slug($input['name'], '-') . '-' . strtolower($input['sku']);

                        $image_url = $line[5];

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                        curl_setopt($ch, CURLOPT_URL, $image_url);
                        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
                        curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
                        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                        curl_setopt($ch, CURLOPT_HEADER, true);
                        curl_setopt($ch, CURLOPT_NOBODY, true);

                        $content = curl_exec($ch);
                        $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);

                        $thumb_url = '';

                        if (strpos($contentType, 'image/') !== false) {
                            $fimg = Image::make($line[5])->resize(350, 500);
                            $fphoto = Str::random(10) . '.jpg';
                            $fimg->save(public_path() . '/assets/images/products/' . $fphoto);
                            $input['photo'] = $fphoto;
                            $thumb_url = $line[5];
                        } else {
                            $fimg = Image::make(public_path() . '/assets/images/noimage.png')->resize(350, 500);
                            $fphoto = Str::random(10) . '.jpg';
                            $fimg->save(public_path() . '/assets/images/products/' . $fphoto);
                            $input['photo'] = $fphoto;
                            $thumb_url = public_path() . '/assets/images/noimage.png';
                        }

                        $timg = Image::make($thumb_url)->resize(350, 500);
                        $thumbnail = Str::random(10) . '.jpg';
                        $timg->save(public_path() . '/assets/images/thumbnails/' . $thumbnail);
                        $input['thumbnail'] = $thumbnail;

                        // Conert Price According to Currency
                        $input['price'] = ($input['price'] / $sign->value);
                        $input['previous_price'] = ($input['previous_price'] / $sign->value);

                        // Save Data
                        $data->fill($input)->save();

                    } else {
                        $log .= "<br>Row No: " . $i . " - No Category Found!<br>";
                    }

                } else {
                    $log .= "<br>Row No: " . $i . " - Duplicate Product Code!<br>";
                }

            }

            $i++;

        }
        fclose($file);

        //--- Redirect Section
        $msg = 'Bulk Product File Imported Successfully.<a href="' . route('admin-prod-index') . '">View Product Lists.</a>' . $log;
        return response()->json($msg);
    }

    //*** GET Request
    public function edit($id)
    {
        if (!Product::where('id', $id)->exists()) {
            return redirect()->route('admin.dashboard')->with('unsuccess', __('Sorry the page does not exist.'));
        }

        $cats = Category::get();
        $data = Product::findOrFail($id);
        $sign = Currency::where('is_default', '=', 1)->first();

        $childSub = ProductChildCategory::with("childcategory")->where("product_id", $id)->get();

        $subCat = [];
        $subChild = [];
        foreach ($childSub as $childData) {
            array_push($subChild, $childData->childcategory);
            array_push($subCat, $childData->childcategory->subcategory);
        }
        $subCat = collect($subCat);

        if ($data->user_id > 0) {
            $vproducts = Product::where('user_id', $data->user_id)->where('status', 1)->orderBy('name', 'ASC')->get();
        } else {
            $vproducts = '';
        }
        $products = Product::where('status', 1)
            ->when($data->user_id > 0, function ($query) use ($data) {
                return $query->where('user_id', '<>', $data->user_id);
            })
            ->orderBy('name', 'ASC')->get();

        if ($data->type == 'Digital') {
            return view('admin.product.edit.digital', compact('cats', 'data', 'sign', 'vproducts', 'products'));
        } elseif ($data->type == 'License') {
            return view('admin.product.edit.license', compact('cats', 'data', 'sign', 'vproducts', 'products'));
        } elseif ($data->type == 'Campaign') {
            return view('admin.product.edit.campaign', compact('cats', 'data', 'sign', 'vproducts', 'products'));
        } else {
            return view('admin.product.edit.physical', compact('cats', 'data', 'sign', 'vproducts', 'products', 'subChild', 'subCat'));
        }

    }

    //*** POST Request
    public function update(Request $request, $id)
    {

        if (!empty($request->vcs_products)) {
            $request->vcs_products = $request->vcs_products;
        } else {
            $request->vcs_products = [];
        }

        if (!empty($request->acs_products)) {
            $request->acs_products = $request->acs_products;
        } else {
            $request->acs_products = [];
        }

        $crossCount = count($request->acs_products) + count($request->vcs_products);

        //--- Validation Section
        $rules = [
            'file' => 'mimes:zip',
            'acs_products' => [
                'nullable',
                function ($attribute, $value, $fail) use ($crossCount) {
                    if ($crossCount > 6) {
                        $fail('Maximum 6 cross selling products can be added.');
                    }
                },
            ],
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //-- Logic Section
        $data = Product::findOrFail($id);
        $sign = Currency::where('is_default', '=', 1)->first();
        $input = $request->except(['child_id', 'subcategory_id']);

        //Check Types
        if ($request->type_check == 1) {
            $input['link'] = null;
        } else {
            if ($data->file != null) {
                if (file_exists(public_path() . '/assets/files/' . $data->file)) {
                    unlink(public_path() . '/assets/files/' . $data->file);
                }
            }
            $input['file'] = null;
        }

        // Check Physical
        if ($data->type == "Physical") {

            //--- Validation Section
            $rules = ['sku' => 'min:8|unique:products,sku,' . $id];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
            //--- Validation Section Ends

            // Check Condition
            if ($request->product_condition_check == "") {
                $input['product_condition'] = 0;
            }

            // Check Shipping Time
            if ($request->shipping_time_check == "") {
                $input['ship'] = null;
            }

            // Check Size

            if (empty($request->size_check)) {
                $input['size'] = null;
                $input['size_qty'] = null;
                $input['size_price'] = null;
            } else {
                if (in_array(null, $request->size) || in_array(null, $request->size_qty) || in_array(null, $request->size_price)) {
                    $input['size'] = null;
                    $input['size_qty'] = null;
                    $input['size_price'] = null;
                } else {

                    if (in_array(0, $input['size_qty'])) {
                        return response()->json(array('errors' => [0 => 'Size Qty can not be 0.']));
                    }

                    $input['size'] = implode(',', $request->size);
                    $input['size_qty'] = implode(',', $request->size_qty);
                    $size_prices = $request->size_price;
                    $s_price = array();
                    foreach ($size_prices as $key => $sPrice) {
                        $s_price[$key] = $sPrice / $sign->value;
                    }

                    $input['size_price'] = implode(',', $s_price);
                }
            }

            // Check Whole Sale
            if (empty($request->whole_check)) {
                $input['whole_sell_qty'] = null;
                $input['whole_sell_discount'] = null;
            } else {
                if (in_array(null, $request->whole_sell_qty) || in_array(null, $request->whole_sell_discount)) {
                    $input['whole_sell_qty'] = null;
                    $input['whole_sell_discount'] = null;
                } else {
                    $input['whole_sell_qty'] = implode(',', $request->whole_sell_qty);
                    $input['whole_sell_discount'] = implode(',', $request->whole_sell_discount);
                }
            }

            // Check Color
            if (empty($request->color_check)) {
                $input['color'] = null;
            } else {
                if (!empty($request->color)) {
                    $input['color'] = implode(',', $request->color);
                }
                if (empty($request->color)) {
                    $input['color'] = null;
                }
            }

            // Check Measure
            if ($request->measure_check == "") {
                $input['measure'] = null;
            }
        }

        // Check Seo
        if (empty($request->seo_check)) {
            $input['meta_tag'] = null;
            $input['meta_description'] = null;
        } else {
            if (!empty($request->meta_tag)) {
                $input['meta_tag'] = implode(',', $request->meta_tag);
            }
        }

        // Check License
        if ($data->type == "License") {

            if (!in_array(null, $request->license) && !in_array(null, $request->license_qty)) {
                $input['license'] = implode(',,', $request->license);
                $input['license_qty'] = implode(',', $request->license_qty);
            } else {
                if (in_array(null, $request->license) || in_array(null, $request->license_qty)) {
                    $input['license'] = null;
                    $input['license_qty'] = null;
                } else {
                    $license = explode(',,', $prod->license);
                    $license_qty = explode(',', $prod->license_qty);
                    $input['license'] = implode(',,', $license);
                    $input['license_qty'] = implode(',', $license_qty);
                }
            }

        }
        // Check Features
        if (!in_array(null, $request->features) && !in_array(null, $request->colors)) {
            $input['features'] = implode(',', str_replace(',', ' ', $request->features));
            $input['colors'] = implode(',', str_replace(',', ' ', $request->colors));
        } else {
            if (in_array(null, $request->features) || in_array(null, $request->colors)) {
                $input['features'] = null;
                $input['colors'] = null;
            } else {
                $features = explode(',', $data->features);
                $colors = explode(',', $data->colors);
                $input['features'] = implode(',', $features);
                $input['colors'] = implode(',', $colors);
            }
        }

        //Product Tags
        if (!empty($request->tags)) {
            $input['tags'] = implode(',', $request->tags);
        }
        if (empty($request->tags)) {
            $input['tags'] = null;
        }

        $pdfName = $data->pdf;

        if ($pdfFile = $request->file('pdf')) {
            $pdfName = uniqid() . '.' . $pdfFile->getClientOriginalExtension();
            $pdfFile->move('assets/files', $pdfName);
        }
        $input['pdf'] = $pdfName;

        $input['price'] = $input['price'] / $sign->value;
        $input['previous_price'] = $input['previous_price'] / $sign->value;

        // store filtering attributes for physical product
        $attrArr = [];
        if (!empty($request->category_id)) {
            $catAttrs = Attribute::where('attributable_id', $request->category_id)->where('attributable_type', 'App\Models\Category')->get();
            if (!empty($catAttrs)) {
                foreach ($catAttrs as $key => $catAttr) {
                    $in_name = $catAttr->input_name;
                    if ($request->has("$in_name")) {
                        $attrArr["$in_name"]["values"] = $request["$in_name"];
                        $attrArrCategoryPrices = $request["$in_name" . "_price"];
                        if (count($attrArrCategoryPrices) > 0) {
                            foreach ($attrArrCategoryPrices as $attrArrCategoryPrice) {
                                $attrArr["$in_name"]["prices"][] = ($attrArrCategoryPrice / $sign->value);
                            }
                        }
                        if ($catAttr->details_status) {
                            $attrArr["$in_name"]["details_status"] = 1;
                        } else {
                            $attrArr["$in_name"]["details_status"] = 0;
                        }
                    }
                }
            }
        }

        /*
        if (!empty($request->subcategory_id)) {
        $subAttrs = Attribute::where('attributable_id', $request->subcategory_id)->where('attributable_type', 'App\Models\Subcategory')->get();
        if (!empty($subAttrs)) {
        foreach ($subAttrs as $key => $subAttr) {
        $in_name = $subAttr->input_name;
        if ($request->has("$in_name")) {
        $attrArr["$in_name"]["values"] = $request["$in_name"];
        $attrArrSubCategoryPrices = $request["$in_name" . "_price"];
        if (count($attrArrSubCategoryPrices) > 0) {
        foreach ($attrArrSubCategoryPrices as $attrArrSubCategoryPrice) {
        $attrArr["$in_name"]["prices"][] = ($attrArrSubCategoryPrice / $sign->value);
        }
        }
        if ($subAttr->details_status) {
        $attrArr["$in_name"]["details_status"] = 1;
        } else {
        $attrArr["$in_name"]["details_status"] = 0;
        }
        }
        }
        }
        }
        if (!empty($request->childcategory_id)) {
        $childAttrs = Attribute::where('attributable_id', $request->childcategory_id)->where('attributable_type', 'App\Models\Childcategory')->get();
        if (!empty($childAttrs)) {
        foreach ($childAttrs as $key => $childAttr) {
        $in_name = $childAttr->input_name;
        if ($request->has("$in_name")) {
        $attrArr["$in_name"]["values"] = $request["$in_name"];
        $attrArrChildCategoryPrices = $request["$in_name" . "_price"];
        if (count($attrArrChildCategoryPrices) > 0) {
        foreach ($attrArrChildCategoryPrices as $attrArrChildCategoryPrice) {
        $attrArr["$in_name"]["prices"][] = ($attrArrChildCategoryPrice / $sign->value);
        }
        }
        if ($childAttr->details_status) {
        $attrArr["$in_name"]["details_status"] = 1;
        } else {
        $attrArr["$in_name"]["details_status"] = 0;
        }
        }
        }
        }
        }

         */

        if (empty($attrArr)) {
            $input['attributes'] = null;
        } else {
            $jsonAttr = json_encode($attrArr);
            $input['attributes'] = $jsonAttr;
        }

        $data->update($input);
        //-- Logic Section Ends

        $prod = Product::find($data->id);
        $productChildCat = ProductChildCategory::where("product_id", $prod->id)->get();

        if ($productChildCat) {
            foreach ($productChildCat as $key => $cat) {
                $cat->delete();
            }
        }

        $childCategory = [];

        foreach ($request->child_id as $key => $child) {
            array_push($childCategory, ["product_id" => $prod->id, "childcategory_id" => $child, "created_at" => now(), "updated_at" => now()]);
        }
        ProductChildCategory::insert($childCategory);

        // Set SLug
        $prod->slug = Str::slug($data->name, '-') . '-' . strtolower($data->sku);

        $prod->update();

        CrossSellingProduct::where('product_id', $data->id)->where('type', 'vendor')->delete();

        // Add cross selling products
        $vcsprods = $request->vcs_products;
        if (!empty($vcsprods)) {
            foreach ($vcsprods as $key => $vcsprod) {
                $prod = new CrossSellingProduct();
                $prod->product_id = $data->id;
                $prod->cross_selling_product_id = $vcsprod;
                $prod->type = 'vendor';
                $prod->save();
            }
        }

        CrossSellingProduct::where('product_id', $data->id)->where('type', 'admin')->delete();

        // Add cross selling products
        $acsprods = $request->acs_products;
        if (!empty($acsprods)) {
            foreach ($acsprods as $key => $acsprod) {
                $prod = new CrossSellingProduct();
                $prod->product_id = $data->id;
                $prod->cross_selling_product_id = $acsprod;
                $prod->type = 'admin';
                $prod->save();
            }
        }

        //--- Redirect Section
        $msg = 'Product Updated Successfully.<a href="' . route('admin-prod-index') . '">View Product Lists.</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function feature($id)
    {
        $data = Product::findOrFail($id);
        return view('admin.product.highlight', compact('data'));
    }

    //*** POST Request
    public function featuresubmit(Request $request, $id)
    {
        //-- Logic Section
        $data = Product::findOrFail($id);
        $input = $request->all();
        if ($request->featured == "") {
            $input['featured'] = 0;
        }
        if ($request->hot == "") {
            $input['hot'] = 0;
        }
        if ($request->best == "") {
            $input['best'] = 0;
        }
        if ($request->top == "") {
            $input['top'] = 0;
        }
        if ($request->latest == "") {
            $input['latest'] = 0;
        }
        if ($request->big == "") {
            $input['big'] = 0;
        }
        if ($request->trending == "") {
            $input['trending'] = 0;
        }
        if ($request->sale == "") {
            $input['sale'] = 0;
        }
        if ($request->is_discount == "") {
            $input['is_discount'] = 0;
            $input['discount_date'] = null;
        }

        $data->update($input);
        //-- Logic Section Ends

        //--- Redirect Section
        $msg = 'Highlight Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends

    }

    //*** GET Request
    public function destroy($id)
    {

        $data = Product::findOrFail($id);
        if ($data->galleries->count() > 0) {
            foreach ($data->galleries as $gal) {
                if (file_exists(public_path() . '/assets/images/galleries/' . $gal->photo)) {
                    unlink(public_path() . '/assets/images/galleries/' . $gal->photo);
                }
                $gal->delete();
            }

        }

        if ($data->reports->count() > 0) {
            foreach ($data->reports as $gal) {
                $gal->delete();
            }
        }

        if ($data->ratings->count() > 0) {
            foreach ($data->ratings as $gal) {
                $gal->delete();
            }
        }
        if ($data->wishlists->count() > 0) {
            foreach ($data->wishlists as $gal) {
                $gal->delete();
            }
        }
        if ($data->clicks->count() > 0) {
            foreach ($data->clicks as $gal) {
                $gal->delete();
            }
        }
        if ($data->comments->count() > 0) {
            foreach ($data->comments as $gal) {
                if ($gal->replies->count() > 0) {
                    foreach ($gal->replies as $key) {
                        $key->delete();
                    }
                }
                $gal->delete();
            }
        }

        if (!filter_var($data->photo, FILTER_VALIDATE_URL)) {
            if (file_exists(public_path() . '/assets/images/products/' . $data->photo)) {
                unlink(public_path() . '/assets/images/products/' . $data->photo);
            }
        }

        if (file_exists(public_path() . '/assets/images/thumbnails/' . $data->thumbnail) && $data->thumbnail != "") {
            unlink(public_path() . '/assets/images/thumbnails/' . $data->thumbnail);
        }

        if ($data->file != null) {
            if (file_exists(public_path() . '/assets/files/' . $data->file)) {
                unlink(public_path() . '/assets/files/' . $data->file);
            }
        }
        $data->delete();
        //--- Redirect Section
        $msg = 'Product Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends

// PRODUCT DELETE ENDS
    }
    public function getAttributes(Request $request)
    {
        $model = '';
        if ($request->type == 'category') {
            $model = 'App\Models\Category';
        } elseif ($request->type == 'subcategory') {
            $model = 'App\Models\Subcategory';
        } elseif ($request->type == 'childcategory') {
            $model = 'App\Models\Childcategory';
        }

        $attributes = Attribute::where('attributable_id', $request->id)->where('attributable_type', $model)->get();
        $attrOptions = [];
        foreach ($attributes as $key => $attribute) {
            $options = AttributeOption::where('attribute_id', $attribute->id)->get();
            $attrOptions[] = ['attribute' => $attribute, 'options' => $options];
        }
        return response()->json($attrOptions);
    }
}
