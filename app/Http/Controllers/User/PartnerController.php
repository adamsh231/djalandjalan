<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Partner;
use App\Comment;

class PartnerController extends Controller
{
    public function view()
    {
        $partner = Partner::with(['user'])->get()->take(5);
        return view('user/home', ['partner' => $partner]);
    }

    public function overview(Request $request)
    {
        $partner = (new Partner)->newQuery();
        $partner->with(['user', 'join']);
        if (!is_null($request->get('start_date'))) {
            $partner->where([
                ['start_date','>=', $request->get('start_date')],
                ['end_date','<=', $request->get('end_date')]
            ]);
        }
        if (!is_null($request->get('filter_jumlah'))) {
            switch($request->get('filter_jumlah')){
                case 1:
                    $partner->where('required_person','<', '3');
                    break;
                case 2:
                    $partner->whereBetween('required_person',['3','6']);
                    break;
                case 3:
                    $partner->where('required_person','>', '6');
                    break;
            }
        }
        if (!is_null($request->get('filter_urutan'))) {
            $partner->orderBy($request->get('filter_urutan'), $request->get('filter_urutan_jenis'));
        }
        return view('user/partner',
        [
            'partner' => $partner->get(),
            'old_key' => $request
        ]);
    }

    public function partner($id)
    {
        $partner = Partner::with(
            [
                'user',
                'join' => function ($query) {
                    $query->with(['user'])->get();
                },
            ]
        )->find($id);
        $comment = Comment::with(
            [
                'reply' => function ($query) {
                    $query->with(['user'])->get();
                },
                'user'
            ]
        )->where('partner_id', $id)->get();
        return view(
            'user/thread',
            [
                'partner' => $partner,
                'comment' => $comment,
            ]
        );
    }
}
