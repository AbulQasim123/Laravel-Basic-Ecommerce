<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class MultiLanguage extends Controller
{
        // Localization in laravel 
    public function Localization()
    {
        return view('multilanguage');
    }

    public function ChangeLang(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return view('multilanguage');
    }
}
