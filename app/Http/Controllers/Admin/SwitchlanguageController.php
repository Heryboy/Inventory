<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Admin\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class SwitchlanguageController extends Controller {

    public function switchLang($lang){
        $languages = Language::Lists('id','code');
        if (array_key_exists($lang, $languages)) {
            Session::set('applocale', $lang);
            Session::set('applangId', $languages[$lang]);
        }
        // Session::flash('applocale',$lang);
        // Session::flash('applangId',$lang);
        return Redirect::back();
    }
}
