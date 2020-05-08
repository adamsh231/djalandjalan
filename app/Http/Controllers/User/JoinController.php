<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Join;
use App\User;
use App\Partner;

class JoinController extends Controller
{
    public function join(Request $request, $partner){
        $join = new Join;
        $join->user_id = $request->user()->id;
        $join->partner_id = $partner;
        $join->status = 0;
        $join->save();
        return redirect()->back();
    }
}
