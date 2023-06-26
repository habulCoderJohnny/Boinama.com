<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Childcategory;
use App\Models\CsCategoryRelation;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class CsRelationController extends Controller
{
    //*** JSON Request
    public function datatables()
    {
        $datas = CsCategoryRelation::orderBy('id', 'desc')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->addColumn('main_type', function (CsCategoryRelation $data) {
                if ($data->category_type == 'App\Models\Category') {
                    return '<div>Category</div>';
                } elseif ($data->category_type == 'App\Models\Subcategory') {
                    return '<div>Subcategory</div>';
                } elseif ($data->category_type == 'App\Models\Childcategory') {
                    return '<div>Childcategory</div>';
                }

            })
            ->addColumn('main_category', function (CsCategoryRelation $data) {
                return '<strong>' . $data->category->name . '</strong>';
            })
            ->addColumn('related_type', function (CsCategoryRelation $data) {
                if ($data->cs_category_type == 'App\Models\Category') {
                    return '<div>Category</div>';
                } elseif ($data->cs_category_type == 'App\Models\Subcategory') {
                    return '<div>Subcategory</div>';
                } elseif ($data->cs_category_type == 'App\Models\Childcategory') {
                    return '<div>Childcategory</div>';
                }
            })
            ->addColumn('related_category', function (CsCategoryRelation $data) {
                return '<strong>' . $data->cs_category->name . '</strong>';
            })
            ->addColumn('action', function (CsCategoryRelation $data) {
                return '<div class="action-list"><a href="' . route('admin-csrelation-edit', $data->id) . '" class="edit"> <i class="fas fa-edit"></i>Edit</a><a href="javascript:;" data-href="' . route('admin-csrelation-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a></div>';
            })
            ->rawColumns(['main_type', 'main_category', 'related_type', 'related_category', 'action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.cs-relation.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.cs-relation.create');
    }

    //*** POST Request
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = [
            'category_id' => [
                'required',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->category_type == 'category') {
                        $count = CsCategoryRelation::where('category_id', $value)->where('category_type', 'App\Models\Category')->count();
                    } elseif ($request->category_type == 'subcategory') {
                        $count = CsCategoryRelation::where('category_id', $value)->where('category_type', 'App\Models\Subcategory')->count();
                    } elseif ($request->category_type == 'childcategory') {
                        $count = CsCategoryRelation::where('category_id', $value)->where('category_type', 'App\Models\Childcategory')->count();
                    }

                    if ($count > 0) {
                        $fail("The Main Category / Subcategory / Childcategory is already in a relationship.");
                    }
                },
            ],
            'category_type' => 'required',
            'cs_category_type' => 'required',
            'cs_category_id' => 'required',
            'search_type' => 'required',
        ];

        $customs = [
            'category_id.required' => 'Main Category is required.',
            'category_type.required' => 'Main Type is required.',
            'cs_category_id.required' => 'Related Category is required.',
            'cs_category_type.required' => 'Related Type is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $input = $request->all();
        if ($request->category_type == 'category') {
            $input['category_type'] = 'App\Models\Category';
        } elseif ($request->category_type == 'subcategory') {
            $input['category_type'] = 'App\Models\Subcategory';
        } elseif ($request->category_type == 'childcategory') {
            $input['category_type'] = 'App\Models\Childcategory';
        }

        if ($request->cs_category_type == 'category') {
            $input['cs_category_type'] = 'App\Models\Category';
        } elseif ($request->cs_category_type == 'subcategory') {
            $input['cs_category_type'] = 'App\Models\Subcategory';
        } elseif ($request->cs_category_type == 'childcategory') {
            $input['cs_category_type'] = 'App\Models\Childcategory';
        }

        CsCategoryRelation::create($input);
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data['csrelation'] = CsCategoryRelation::find($id);

        // return $data['csrelation'];

        if ($data['csrelation']->category_type == 'App\Models\Category') {
            $data['mainCategories'] = Category::where('status', 1)->get();
        } elseif ($data['csrelation']->category_type == 'App\Models\Subcategory') {
            $data['mainCategories'] = Subcategory::where('status', 1)->get();
        } elseif ($data['csrelation']->category_type == 'App\Models\Childcategory') {
            $data['mainCategories'] = Childcategory::where('status', 1)->get();
        }

        if ($data['csrelation']->cs_category_type == 'App\Models\Category') {
            $data['relatedCategories'] = Category::where('status', 1)->get();
        } elseif ($data['csrelation']->cs_category_type == 'App\Models\Subcategory') {
            $data['relatedCategories'] = Subcategory::where('status', 1)->get();
        } elseif ($data['csrelation']->cs_category_type == 'App\Models\Childcategory') {
            $data['relatedCategories'] = Childcategory::where('status', 1)->get();
        }

        return view('admin.cs-relation.edit', $data);
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        $csrelation = CsCategoryRelation::find($id);

        //--- Validation Section
        $rules = [
            'category_id' => [
                'required',
                function ($attribute, $value, $fail) use ($csrelation, $request) {
                    if ($request->category_type == 'category') {
                        $count = CsCategoryRelation::where('category_id', $value)->where('category_type', 'App\Models\Category')->count();
                    } elseif ($request->category_type == 'subcategory') {
                        $count = CsCategoryRelation::where('category_id', $value)->where('category_type', 'App\Models\Subcategory')->count();
                    } elseif ($request->category_type == 'childcategory') {
                        $count = CsCategoryRelation::where('category_id', $value)->where('category_type', 'App\Models\Childcategory')->count();
                    }

                    // $count = CsCategoryRelation::where('category_id', $value)->count();
                    if ($csrelation->category_id != $value && $count > 0) {
                        $fail("The Main Category / Subcategory / Childcategory is already in a relationship.");
                    }
                },
            ],
            'category_type' => 'required',
            'cs_category_type' => 'required',
            'cs_category_id' => 'required',
            'search_type' => 'required',
        ];

        $customs = [
            'category_id.required' => 'Main Category is required.',
            'category_type.required' => 'Main Type is required.',
            'cs_category_id.required' => 'Related Category is required.',
            'cs_category_type.required' => 'Related Type is required.',
        ];

        $validator = Validator::make($request->all(), $rules, $customs);

        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section

        $input = $request->all();
        if ($request->category_type == 'category') {
            $input['category_type'] = 'App\Models\Category';
        } elseif ($request->category_type == 'subcategory') {
            $input['category_type'] = 'App\Models\Subcategory';
        } elseif ($request->category_type == 'childcategory') {
            $input['category_type'] = 'App\Models\Childcategory';
        }

        if ($request->cs_category_type == 'category') {
            $input['cs_category_type'] = 'App\Models\Category';
        } elseif ($request->cs_category_type == 'subcategory') {
            $input['cs_category_type'] = 'App\Models\Subcategory';
        } elseif ($request->cs_category_type == 'childcategory') {
            $input['cs_category_type'] = 'App\Models\Childcategory';
        }

        $csrelation->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Updated Successfully.';

        return response()->json($msg);
        //--- Redirect Section Ends
    }

    public function types($type)
    {
        // return $type;
        if ($type == 'category') {
            $types = Category::where('status', 1)->get();
        }
        if ($type == 'subcategory') {
            $types = Subcategory::where('status', 1)->get();
        }
        if ($type == 'childcategory') {
            $types = Childcategory::where('status', 1)->get();
        }

        return $types;
    }

    public function destroy($id)
    {
        $data = CsCategoryRelation::findOrFail($id);
        $data->delete();

        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
