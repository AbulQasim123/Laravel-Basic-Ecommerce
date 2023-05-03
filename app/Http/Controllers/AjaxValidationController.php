<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Validation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AjaxValidationController extends Controller
{
    public function AjaxForm(){
        return view('ajax-form');
    }
    public function SubmitForm(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);
        if ($validator->passes()) {
            $data = new Validation();
            $data->name = $request->name;
            $data->email = $request->email;
            $data->phone = $request->phone;
            $data->save();
            return response()->json(['message' => 'Added new record','class_name' => 'alert-success']);
        }else{
            return response()->json(['message' => $validator->errors()->all(),'class_name' => 'alert-danger']);
        }   
    }

        /* PDF generate using DOM PDF */
    public function GeneratePdf(){
        $data = [
            "title" => "About me",
            "aboutme" => "This is AboulQasim Ansari, that's all about me.",
        ];
        $pdf = PDF::loadView('my-pdf-file',$data);
        return $pdf->download('aboutme.pdf');
    }

        /* Barcode Generator in Laravel 8 Tutorial */
    public function Barcode(){
        return view('barcode');
    }
}
