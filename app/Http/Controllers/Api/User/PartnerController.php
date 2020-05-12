<?php

namespace App\Http\Controllers\Api\User;

use App\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PartnerController extends Controller
{
    public function overview(Request $request){
        $partner = (new Partner)->newQuery();

        if (!is_null($request->get('search'))) {
            $partner->where('dest_name', 'LIKE', '%' . $request->get('search') . '%');
        }

        $partner->with(['user', 'join'])->where('status', '0');
        $partner = $partner->paginate(20);
        foreach($partner as $p){
            $p->start_date = date('d M Y', strtotime($p->start_date));
            $p->end_date = date('d M Y', strtotime($p->end_date));
            $p->joined = $p->join->where('status', 1)->count();
        }
        return response()->json($partner, 200);
    }
}
