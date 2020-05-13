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

        if (!is_null($request->get('start_date'))) {
            $partner->where([
                ['start_date', '>=', $request->get('start_date')],
                ['end_date', '<=', $request->get('end_date')]
            ]);
        }
        if (!is_null($request->get('person'))) {
            switch ($request->get('person')) {
                case 1:
                    $partner->where('required_person', '<', '3');
                    break;
                case 2:
                    $partner->whereBetween('required_person', ['3', '6']);
                    break;
                case 3:
                    $partner->where('required_person', '>', '6');
                    break;
            }
        }
        if (!is_null($request->get('category'))) {
            $partner->where('categories', 'LIKE', '%' . $request->get('category') . '%');
        }
        if (!is_null($request->get('orderby'))) {
            $partner->orderBy($request->get('orderby'), "ASC");
        }else{
            $partner->inRandomOrder();
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
