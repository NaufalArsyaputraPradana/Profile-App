<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    /**
     * Handle language switch
     *
     * @param string $lang
     * @return \Illuminate\Http\RedirectResponse
     */
    public function switchLang($lang)
    {
        // Available languages
        $availableLangs = ['en', 'id'];
        
        if (in_array($lang, $availableLangs)) {
            Session::put('applocale', $lang);
            App::setLocale($lang);
        }
        
        return redirect()->back();
    }
}