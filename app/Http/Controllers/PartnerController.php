<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;

class PartnerController extends Controller
{
    public function view(){
        $partner = Partner::with(['user'])->get()->take(5);
        return view('user/home', ['partner' => $partner]);
    }

    public function overview(){
        $partner = Partner::with(['user'])->get()->take(12);
        return view('user/partner', ['partner' => $partner]);
    }
}
