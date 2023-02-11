<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    
    public function Site($id = null,$name=null){
        // echo "<h1>Welcome to my first method.</h1>";
        echo "<h3>Id & Name</h3>" . $id .' & '.$name;
        $my_name = "AbulQasim Ansari";
        $my_email = "abulqasimansari842@gmail.com";
        return view('first', compact('my_name','my_email')); // first.blade.php
    }

            // All ways are right for different different query type
    public function getUser(){
            // Fetch data from database
        $results = DB::select("select * from tbl_user");
        // $results = DB::select("select * from tbl_user where id = '1'");
        // $results = DB::select("select * from tbl_user where id = ?",[2]);
        echo "<pre>";
            print_r($results);
        echo "</pre>";
        // foreach($results as $result){
        //     echo $result->nakme."<br>";
        // }
    }
    public function addUser(){
            // Insert data into database
        $results= DB::insert("insert into `laravel8_course`.`tbl_user` (`name`,`email`,`phone`) values(?, ?, ?)", ['Puja','puja@gmail.com','5241635241']);
        // $results= DB::insert("insert into `laravel8_course`.`tbl_user` (`name`,`email`,`phone`) values('Puja','puja@gmail.com','8596254163')");
        echo "<pre>";
        print_r($results);
        echo "</pre>";
    }
    public function updateUser(){
            // update data in the database
        // $results = DB::update("update tbl_user set email = ? where id = ?",['Abul123@gmail.com',1]);
        $results = DB::update("update tbl_user set email = :email_address where id = :id",['email_address' => 'Abul@gmail.com', 'id' => 1]);

        echo "<pre>";
        print_r($results);
        echo "</pre>";
    }
    public function deleteUser(){
            // delete data from the database
        // $results = DB::delete("delete from tbl_user where id = ?",[3]);
        $results = DB::delete("delete from tbl_user where id = :id",['id' => 4]);
        echo "<pre>";
        print_r($results);
        echo "</pre>";
    }
}
