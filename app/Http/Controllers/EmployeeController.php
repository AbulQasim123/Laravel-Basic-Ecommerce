<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use JetBrains\PhpStorm\Internal\ReturnTypeContract;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    public function Employee(){
        return view('employee');
    }

        // Create and save form to database table
    public function SaveEmployee(Request $request){
        $employee_obj = new Employee;

            // Setting values
        $employee_obj->name = $request->name;
        $employee_obj->email = $request->email;
        $employee_obj->phone = $request->phone;
        $employee_obj->gender= $request->gender;

            // Save data
        $employee_obj->Save();
            
            // set flash message
        session()->flash('success','Data has been submitted successfully');
        // $request->session()->flash('success','Data has been submitted successfully');

            // redirection 
        // return redirect()->to('employee');
        return redirect('employee');
    }


            // Selecting data form the database table
    public function GetEmlpoyee(){
        // $students = Student::all(); instead of get
        // $students = Student::where('id', 4)->get();
        // $students = Student::find(3);
        // $students = Student::find([4,6,9]);
        // $students = Student::first();
        $students = Employee::all();
        // echo "<pre>";
        //     foreach($students as $student){
        //         echo "<h2> Name = ".$student->name . ", Email = " .$student->email."</h2>";
        //     }
        // echo "</pre>";
        return view('employee', [
            "students" => $students
        ]);
    }
            // Delete data from the database
    public function DeleteEmployee($employee_id){
        $students = Employee::find($employee_id);
        $students->delete();
        session()->flash('success','Data deleted successfully.');
        return redirect()->to('employee');
    }

            // show update data route
    public function ShowEmployee($employee_id){
        $students = Employee::find($employee_id);
        return view('updateemployee',[
            "students" => $students
        ]);
    }
    public function UpdateEmployee(Request $request){
        // echo "<pre>";
        // print_r($request->all());
        // echo $request['student_id']; die;
        $students = Employee::find($request['student_id']);
        // echo "<pre>";
        // print_r($students);
        $students->name = $request['name'];
        $students->email = $request['email'];
        $students->phone = $request['phone'];
        $students->gender = $request['gender'];

        $students->save();

        session()->flash('success','Data Update successfully.');
        return redirect()->to('employee');
    }
            
        
            // Concept of mutators
    // public function AddMutators(){
    //     $students = new Employee;

    //     $students->name = "Rahul";
    //     $students->email = "rahul@gmail.com";
    //     $students->phone = "9585632541";
    //     $students->gender = "Male";
    //     if ($students->save()) {
    //         echo "Students has been Inserted";
    //     }
    // }


            // Query builder methods in laravel
    public function BuilderQuery(){
        // $students = DB::table('employees')->get();
        // $students = DB::table('employees')->where('id', 4)->select('id','name','email')->get();
        // $students = DB::table('employees')->select('id as emp_id','name as emp_name','email as emp_email')->find(5);
        // $students = DB::table('employees')->where("id", ">=",10)->select('id as emp_id','name as emp_name')->get();
        // echo "<pre>";
        // print_r($students);

                    // Select query AND OR Operator
            // mysql query 
        // "Select * from employees where id = 3 and name = 'abc' ";
        // $students = DB::table('employees')->where("id",3)->where('name','puja')->get();

            // mysql query
        // "Select * from employees where id = 2 and (name = 'abc' OR email = 'abc@gmail.com') ";
        // $students=  DB::table('employees')->where("id", 2)->where(function($query){
        //     $query->where("name","Abul")->orWhere("email","abul@gmail.com");
        // })->get();

            // mysql query
        // "Select * from employees where name = 'abc' OR (id = 3 AND email = 'abc@gmail.com') ";
        // $students= DB::table('employees')->where("name", "Shilpsa")->orWhere(function($query){
        //     $query->where("id",11)->where("email","shilpa@gmail.com");
        // })->get();
        
            // mysql query
        // "Select * from employees where id between 5 AND 10 ";
        // $students = DB::table('employees')->whereBetween("id", [5,10])->get();

            // mysql query
        // "Select * from employees where id IN (1,5,9,14) ";
        // $students = DB::table('employees')->whereIn("id", [1,5,9,14])->get();
        // echo "<pre>";
        // print_r($students);
            
            // joins, left join and right join
        // $students = DB::table("employees")->join("tbl_user","employees.id", "=", "tbl_user.employee_id")->get();

        // $students = DB::table("employees")->select("employees.id as employee_id","employees.name as employee_name","employees.email as employee_email","tbl_user.course as course_name","tbl_user.amount as course_amount")->join("tbl_user","employees.id", "=", "tbl_user.employee_id")->get();
                                // leftJoin
        // $students = DB::table("employees")->select("employees.id as employee_id","employees.name as employee_name","employees.email as employee_email","tbl_user.course as course_name","tbl_user.amount as course_amount")->leftJoin("tbl_user","employees.id", "=", "tbl_user.employee_id")->get();
                                // rightJoin
        // $students = DB::table("employees")->select("employees.id as employee_id","employees.name as employee_name","employees.email as employee_email","tbl_user.course as course_name","tbl_user.amount as course_amount")->rightJoin("tbl_user","employees.id", "=", "tbl_user.employee_id")->get();
        // echo "<pre>";
        // print_r($students);
                    // insert and update method
                // single row insertion
        // DB::table('employees')->insert([
        //     'name' => 'Tarun', 'email' => 'tarun@gmail.com','phone' => '9742541254','gender' => 'Male',
        // ]);
        // echo "Data has been Inserted";

        // $insert_id = DB::table('employees')->insertGetId([
        //     'name' => 'Tarun', 'email' => 'tarun@gmail.com','phone' => '9742541254','gender' => 'Male',
        // ]);
        // echo "Data has been Inserted with id = ". $insert_id;

            // multi rows insertion
        // DB::table('employees')->insert(
        //     [
        //         ['name' => 'Zaiba', 'email' => 'zaiba@gmail.com','phone' => '9795845260','gender' => 'Female',],
        //         ['name' => 'Depu', 'email' => 'depu@gmail.com','phone' => '9795842514','gender' => 'Male',],
        //         ['name' => 'Zaid', 'email' => 'zaid@gmail.com','phone' => '9742541254','gender' => 'Male',],
        //     ]
        // );
        // echo "Data has been Inserted";

            // update data
        // DB::table('employees')->where("id",19)->update([
        //     "name" => "Zainab",
        //     "email" => "zainab@gmail.com",
        //     "gender" => "Female"
        // ]);
        // echo "Data has been Updated";

            // Update, Delete & Truncate Methods
        // DB::table('employees')->updateOrInsert(
        //     ["id" => 18],
        //     ["name" => "Deepali","email" => "deepali@gmail.com", "gender"=>"Female"]
        // );
        // echo "Data updated successfully.";

            // Delete data
        // DB::table('employees')->where("id", 11)->delete();
        // echo "Data has been deleted";

            // Truncate table
        // DB::table('employees')->truncate();
        // echo "All data deleted successfully.";
    }

                // Eloquent Relationship in laravel 
            // One to One and Inserve
    public function Eloquent(){
        // return Student::all();
        
        // $data =  Employee::find(2)->student;
        $data =  Student::find(1)->employee;
        echo "<pre>";
            print_r($data);
        echo "</pre>";
        // return Employee::all();
        
    }
        // Route Model Binding
    public function Student(Student $student){
        echo "<pre>";
        echo $student;
        echo "</pre>";
    }


    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \App\Http\Requests\StoreEmployeeRequest  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(StoreEmployeeRequest $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Employee  $employee
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Employee $employee)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  \App\Models\Employee  $employee
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit(Employee $employee)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdateEmployeeRequest  $request
    //  * @param  \App\Models\Employee  $employee
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(UpdateEmployeeRequest $request, Employee $employee)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  \App\Models\Employee  $employee
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy(Employee $employee)
    // {
    //     //
    // }
}
