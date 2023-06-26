<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class PaymentGatewayController extends Controller
{
    //*** JSON Request
    public function datatables()
    {
        $datas = PaymentGateway::latest('id')->get();
        //--- Integrating This Collection Into Datatables
        return DataTables::of($datas)
            ->editColumn('title', function (PaymentGateway $data) {
                if ($data->type == 'automatic') {
                    return $data->name;
                } else {
                    return $data->title;
                }
            })
            ->editColumn('details', function (PaymentGateway $data) {
                if ($data->type == 'automatic') {
                    return $data->getAutoDataText();
                } else {
                    if ($data->keyword == 'cod') {
                        return $data->subtitle;
                    } else {
                        $details = mb_strlen(strip_tags($data->details), 'utf-8') > 250 ? mb_substr(strip_tags($data->details), 0, 250, 'utf-8') . '...' : strip_tags($data->details);
                        return $details;
                    }

                }
            })
            ->addColumn('is_checkout', function (PaymentGateway $data) {
                $class = $data->is_checkout == 1 ? 'drop-success' : 'drop-danger';
                $activeSelected = $data->is_checkout == 1 ? 'selected' : '';
                $deactiveSelected = $data->is_checkout == 0 ? 'selected' : '';
                $activeText = __('Activated');
                $deactiveText = __('Deactivated');
                $activeLink = route('admin-payment-status', [$data->id, 1, 'is_checkout']);
                $deactiveLink = route('admin-payment-status', [$data->id, 0, 'is_checkout']);
                return "<div class='action-list'>
                                            <select class='process select droplinks {$class}'>
                                            <option data-val='1' value='{$activeLink}' {$activeSelected}>{$activeText}</option>
                                            <option data-val='0' value='{$deactiveLink}' {$deactiveSelected}>{$deactiveText}</option>
                                            </select>
                                         </div>";
            })
            ->editColumn('is_deposite', function (PaymentGateway $data) {
                $class = $data->is_deposite == 1 ? 'drop-success' : 'drop-danger';
                $activeSelected = $data->is_deposite == 1 ? 'selected' : '';
                $deactiveSelected = $data->is_deposite == 0 ? 'selected' : '';
                $activeText = __('Activated');
                $deactiveText = __('Deactivated');
                $activeLink = route('admin-payment-status', [$data->id, 1, 'is_deposite']);
                $deactiveLink = route('admin-payment-status', [$data->id, 0, 'is_deposite']);
                return "<div class='action-list'>
                                            <select class='process select droplinks {$class}'>
                                            <option data-val='1' value='{$activeLink}' {$activeSelected}>{$activeText}</option>
                                            <option data-val='0' value='{$deactiveLink}' {$deactiveSelected}>{$deactiveText}</option>
                                            </select>
                                         </div>";
            })

            ->addColumn('action', function (PaymentGateway $data) {
                $editLink = route('admin-payment-edit', $data->id);
                $deleteLink = route('admin-payment-delete', $data->id);

                $delete = $data->type == 'automatic' || $data->keyword != null ? "" : "<a href='javascript:;' data-href='{$deleteLink}' data-toggle='modal' data-target='#confirm-delete' class='delete'>
                                <i class='fas fa-trash-alt'></i>
                                </a>";
                $editText = __('Edit');
                return "<div class='action-list'>
                                            <a data-href='{$editLink}' class='edit' data-toggle='modal' data-target='#modal1'>
                                            <i class='fas fa-edit'></i>{$editText}
                                            </a>
                                            {$delete}
                                        </div>";
            })
            ->rawColumns(['is_checkout', 'action', 'is_deposite'])
            ->toJson(); //--- Returning Json Data To Client Side
    }

    //*** GET Request
    public function index()
    {

        return view('admin.payment.index');
    }

    //*** GET Request
    public function edit($id)
    {
        $data = PaymentGateway::findOrFail($id);
        return view('admin.payment.edit', compact('data'));
    }

    private function setEnv($key, $value, $prev)
    {
        file_put_contents(app()->environmentFilePath(), str_replace(
            $key . '=' . $prev,
            $key . '=' . $value,
            file_get_contents(app()->environmentFilePath())
        ));
    }
    public function create()
    {
        return view('admin.payment.create');
    }
    public function store(Request $request)
    {
        //--- Validation Section
        $rules = ['title' => 'unique:payment_gateways'];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        }
        //--- Validation Section Ends

        //--- Logic Section
        $data = new PaymentGateway();
        $input = $request->all();
        $data->fill($input)->save();
        //--- Logic Section Ends

        //--- Redirect Section
        $msg = 'New Data Added Successfully.' . '<a href="' . route("admin-payment-index") . '">View Payment Lists</a>';
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** POST Request
    public function update(Request $request, $id)
    {

        $data = PaymentGateway::findOrFail($id);
        $prev = '';
        if ($data->type == "automatic") {

            //--- Validation Section
            $rules = ['name' => 'unique:payment_gateways,name,' . $id];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
            //--- Validation Section Ends

            //--- Logic Section

            $input = $request->all();

            $info_data = $input['pkey'];

            if ($data->keyword == 'mollie') {
                $paydata = $data->convertAutoData();
                $prev = $paydata['key'];
            }

            if (array_key_exists("sandbox_check", $info_data)) {
                $info_data['sandbox_check'] = 1;
            } else {
                if (strpos($data->information, 'sandbox_check') !== false) {
                    $info_data['sandbox_check'] = 0;
                    $text = $info_data['text'];
                    unset($info_data['text']);
                    $info_data['text'] = $text;
                }
            }
            $input['information'] = json_encode($info_data);
            $data->update($input);

            if ($data->keyword == 'mollie') {
                $paydata = $data->convertAutoData();
                $this->setEnv('MOLLIE_KEY', $paydata['key'], $prev);

            }
            //--- Logic Section Ends
        } else {
            //--- Validation Section
            $rules = ['title' => 'unique:payment_gateways,title,' . $id];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
            }
            //--- Validation Section Ends
            //--- Logic Section
            $input = $request->all();
            $data->update($input);
            //--- Logic Section Ends

        }
        //--- Redirect Section
        $msg = __('Data Updated Successfully.');
        return response()->json($msg);
        //--- Redirect Section Ends
    }

    //*** GET Request Status
    public function status($id1, $id2, $id3)
    {
        $data = PaymentGateway::findOrFail($id1);
        $data->$id3 = $id2;
        $data->update();
        //--- Redirect Section
        $msg = __('Status Updated Successfully.');
        return response()->json($msg);

        //--- Redirect Section Ends
    }

    //*** GET Request Delete
    public function destroy($id)
    {
        $data = PaymentGateway::findOrFail($id);
        $data->delete();
        //--- Redirect Section
        $msg = 'Data Deleted Successfully.';
        return response()->json($msg);
        //--- Redirect Section Ends
    }
}
