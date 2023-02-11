<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudentData;
use Illuminate\Support\Facades\Validator;
use App\Models\Student;
use App\Models\Device;
use Illuminate\Support\Facades\DB;
use App\Http\Traits\DataTrait;

class StudentController extends Controller
{
        // Create and submit form to server
    public function myForm(){
        return view('add-student');
    }
    public function SubmitStudent(Request $Request){
        if ($Request->isMethod("post")) {
                // Validate method()
            $Request->validate([
                'name' => 'required|min:4|max:10',
                'email' => 'required',
                'phone' => 'required|digits_between:9,11',
            ]);
            echo "<pre>";
                print_r($Request->all());
            echo "</pre>";
        }
    }
        // form Request class Validated method()
    public function AddStudent(StoreStudentData $req){
        $req->validated();
        echo "<pre>";
            print_r($req->all());
        echo "</pre>";
    }
    
        // form Validation using validator facade
    public function CreateStudent(Request $request){
        $validate = Validator::make($request->all(),
        [
            'name_2' => 'required|min:4|max:10',
            'email_2' => 'required',
            'phone_2' => 'required|digits_between:9,11',
        ],
        [
            'name_2.required' => 'Name is must need ?',
            'name_2.min' => 'Minimum value should atleast four chars!',
            'name_2.max' => 'Sorry! you are Exeeded 10 chars long',
            'email_2.required' => 'Email is Needed?',
            'phone_2.required' => 'Phone is Needed?',
            'phone_2.digits_between' => 'Phone number should be between 9 to 11',
        ])->validate();
        // if ($validate->fails()) {
        //     return redirect('add-student')->withErrors($validate)->withInput();
        // }
        echo "<pre>";
            print_r($request->all());
        echo "</pre>";
    }
            // Pagination in laravel 8
    public function Pagination(){
        $Products = DB::table('allproducts')->paginate(10);
        return view('pagination', compact('Products'));
        // return view('pagination',[
        //     'students' => $students,
        // ]);
        // foreach($students as $student){
        //     echo "<pre>";
        //     echo $student;
        // }
    }

        // Concept of trait in laravel 8

    use DataTrait;
    public function GetStudents(){
        $students = $this->getData(new Student());
        foreach ($students as $student) {
            echo "<pre>";
                echo $student;
            echo "</pre>";
        }
    }
    public function GetDevices(){
        $devices = $this->getData(new Device());
        foreach ($devices as $device) {
            echo "<pre>";
                echo $device;
            echo "</pre>";
        }
    }
}
