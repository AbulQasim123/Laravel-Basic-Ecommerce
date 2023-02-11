<?php

namespace App\Models;

use GuzzleHttp\Psr7\Query;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class Device extends Model
{
    use HasFactory;
    // public $timestamps= false;
    public function getNameAttribute($value){
        return strtoupper($value);
    }
    public function getCreatedAtAttribute($value){
        return date('Y-m-d', strtotime($value));
    }
    public function getUpdatedAtAttribute($value){
        return date('d-m-Y  , h:i:s', strtotime($value));
    }

            // Model event in laravel
    public static function boot(){
        parent::boot();
        static::creating(function($value){
            Log::info("Creating Event ".$value);
        });
        static::created(function($value){
            Log::info("Created Event ".$value);
        });
        static::saving(function($value){
            Log::info("Saving Event ".$value);
        });
        static::saved(function($value){
            Log::info("Saved Event ".$value);
        });
        static::updating(function($value){
            Log::info("Updating Event ".$value);
        });
        static::updated(function($value){
            Log::info("Updated Event ".$value);
        });
        static::deleting(function($value){
            Log::info("Deleting Event ".$value);
        });
        static::deleted(function($value){
            Log::info("Deleted Event ".$value);
        });
    }

    /* Concept of Local scope of laravel model */
    public function scopewhereStatus($query, $arg){
        return $query->where("status" ,$arg);
    }
}
