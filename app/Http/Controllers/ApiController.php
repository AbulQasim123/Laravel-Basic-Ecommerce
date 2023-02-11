<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function index(){
        $api_posts = Http::get("https://jsonplaceholder.typicode.com/posts");
        
        // $data = json_decode($api_posts);
        // echo "<pre>";
        //     foreach($data as $row){
        //         $row = (array)$row;
        //         print_r($row);
        //     }
        // echo "</pre>";

            // Successfully saved in the database
        // foreach ($data as $row) {
        //     $data = array(
        //         'id' => $row->id,
        //         'user_id' => $row->userId,
        //         'title' => $row->title,
        //         'body' => $row->body,
        //     );
        //     DB::table('api_table')->insert($data);
        // }
        // dd('Data Stored');
        
        
        return view('apiview',[
            "apiposts"  => json_decode($api_posts),
        ]);
    }
}
