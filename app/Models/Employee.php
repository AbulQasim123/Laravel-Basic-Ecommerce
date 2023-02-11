<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Employee extends Model
{
    use HasFactory;
    // protected $table = "tbl_employees"; // Custom table name 
    // protected $primaryKey = 'emp_id';  // String data type
    // protected $keyType = 'string';    // Data type string value
    // public $incrementing = false;
    // public $timestamps = false;
    // const CREATED_AT = 'creation_date';
    // const UPDATED_AT = 'updated_date';

        // Concept of Accessors in Laravel
    public function getEmailAttribute($value){
        return Str::upper($value);
    }
    public function getNameAttribute($value){
        // return Str::camel($value);
        return Str::upper($value);
    }
    public function getCreatedAtAttribute($value){
        return date("Y-m-d h:i:s", strtotime($value));
    }

        // Concept of mutators
    public function setPhoneAttribute($value){
        $this->attributes['phone'] = "+91".$value;
    }

      // Eloquent Relationship in laravel 
            // One to One and Inserve
    // public function student(){
    //     return $this->hasMany(Student::class);
    // }
    protected $fillable = [
        "name",
        "email",
        "phone",
        "gender",
    ];
}
