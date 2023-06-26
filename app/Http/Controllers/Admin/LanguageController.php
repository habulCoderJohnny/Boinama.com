<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class LanguageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    //*** JSON Request
    public function datatables()
    {
        $datas = Language::orderBy('id')->get();
        //--- Integrating This Collection Into Datatables
        return Datatables::of($datas)
            ->addColumn('action', function (Language $data) {
                $delete = $data->id == 1 ? '' : '<a href="javascript:;" data-href="' . route('admin-lang-delete', $data->id) . '" data-toggle="modal" data-target="#confirm-delete" class="delete"><i class="fas fa-trash-alt"></i></a>';
                $default = $data->is_default == 1 ? '<a><i class="fa fa-check"></i> Default</a>' : '<a class="status" data-href="' . route('admin-lang-st', ['id1' => $data->id, 'id2' => 1]) . '">Set Default</a>';
                return '<div class="action-list"><a href="' . route('admin-lang-edit', $data->id) . '"> <i class="fas fa-edit"></i>Edit</a>' . $delete . $default . '</div>';
            })
            ->rawColumns(['action'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {
        return view('admin.language.index');
    }

    //*** GET Request
    public function create()
    {
        return view('admin.language.create');
    }

    //*** POST Request
    public function store(Request $request)
    { //--- Logic Section
        $new = null;
        $input = $request->all();
        $data = new Language();
        $data->language = $input['language'];
        $name = time() . Str::random(8);
        $data->name = $name;
        $data->file = $name . '.json';
        $data->rtl = $input['rtl'];
        $data->save();
        unset($input['_token']);
        unset($input['language']);
        $keys = $request->keys;
        $values = $request->values;
        foreach (array_combine($keys, $values) as $key => $value) {
            $n = str_replace("_", " ", $key);
            $new[$n] = $value;
        }
        $mydata = json_encode($new);
        file_put_contents(resource_path() . '/lang/' . $data->file, $mydata);

        //--- Logic Section Ends
        cache()->forget('default_language');
        cache()->forget('languages');
        //--- Redirect Section
        $msg = 'New Data Added Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request
    public function edit($id)
    {
        $data = Language::findOrFail($id);
        $data_results = file_get_contents(resource_path() . '/lang/' . $data->file);
        $lang = json_decode($data_results);
        return view('admin.language.edit', compact('data', 'lang'));
    }

    //*** POST Request
    public function update(Request $request, $id)
    {
        //--- Logic Section
        $new = null;
        $input = $request->all();
        $data = Language::findOrFail($id);
        if (file_exists(resource_path() . '/lang/' . $data->file)) {
            unlink(resource_path() . '/lang/' . $data->file);
        }
        $data->language = $input['language'];
        $name = time() . Str::random(8);
        $data->name = $name;
        $data->file = $name . '.json';
        $data->rtl = $input['rtl'];
        $data->update();
        unset($input['_token']);
        unset($input['language']);
        $keys = $request->keys;
        $values = $request->values;
        foreach (array_combine($keys, $values) as $key => $value) {
            $n = str_replace("_", " ", $key);
            $new[$n] = $value;
        }
        $mydata = json_encode($new);
        file_put_contents(resource_path() . '/lang/' . $data->file, $mydata);
        //--- Logic Section Ends

        cache()->forget('default_language');
        cache()->forget('languages');
        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    public function status($id1, $id2)
    {
        $data = Language::findOrFail($id1);
        $data->is_default = $id2;
        $data->update();
        $data = Language::where('id', '!=', $id1)->update(['is_default' => 0]);
        cache()->forget('default_language');
        cache()->forget('languages');
        //--- Redirect Section
        $msg = 'Data Updated Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        if ($id == 1) {
            return "You don't have access to remove this language";
        }
        $data = Language::findOrFail($id);
        if ($data->is_default == 1) {
            return "You can not remove default language.";
        }

        if (file_exists(resource_path() . '/lang/' . $data->file)) {
            unlink(resource_path() . '/lang/' . $data->file);
        }
        $data->delete();
        Session::forget('language');
        cache()->forget('default_language');
        cache()->forget('languages');
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
