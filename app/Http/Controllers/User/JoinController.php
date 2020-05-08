<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Join;
use App\User;
use App\Partner;

class JoinController extends Controller
{
    public function join(Request $request, Partner $partner){
        //! Better with Authorization !//
        if($partner->status != 0){
            return redirect()->back();
        }

        $join = new Join;
        $join->user_id = $request->user()->id;
        $join->partner_id = $partner->id;
        $join->status = 0;
        $join->save();
        return redirect()->back();
    }

    public function accept(Request $request, Partner $partner, Join $join)
    {
        //! Better with Authorization !//
        if ($partner->user_id != $request->user()->id) {
            return redirect('/partner/manage');
        }

        $join->status = 1;
        $join->save();

        return redirect()->back();
    }

    public function reject(Request $request, Partner $partner, Join $join)
    {
        //! Better with Authorization !//
        if ($partner->user_id != $request->user()->id) {
            return redirect('/partner/manage');
        }

        $join->delete();

        return redirect()->back();
    }
}
