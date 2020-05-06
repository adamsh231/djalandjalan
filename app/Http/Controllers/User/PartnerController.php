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
        $arr_old = collect();
        $partner = (new Partner)->newQuery();
        $partner->with(['user', 'join']);
        if (!is_null($request->get('filter_tempat'))) {
            $partner->where('dest_name','LIKE', '%'.$request->get('filter_tempat').'%');
            $arr_old->put('filter_tempat', $request->get('filter_tempat'));
        }
        if (!is_null($request->get('start_date'))) {
            $partner->where([
                ['start_date','>=', $request->get('start_date')],
                ['end_date','<=', $request->get('end_date')]
            ]);
            $arr_old->put('tanggal', date('d M Y', strtotime($request->start_date)). ' - ' .date('d M Y', strtotime($request->end_date)));
        }
        if (!is_null($request->get('filter_jumlah'))) {
            switch($request->get('filter_jumlah')){
                case 1:
                    $partner->where('required_person','<', '3');
                    $arr_old->put('filter_jumlah', 'Kurang dari 3 orang');
                    break;
                case 2:
                    $partner->whereBetween('required_person',['3','6']);
                    $arr_old->put('filter_jumlah', '3 sampai 6 orang');
                    break;
                case 3:
                    $partner->where('required_person','>', '6');
                    $arr_old->put('filter_jumlah', 'Lebih dari 6 orang');
                    break;
            }
        }
        if (!is_null($request->get('filter_urutan'))) {
            $partner->orderBy($request->get('filter_urutan'), $request->get('filter_urutan_jenis'));
            $based_on = ($request->get('filter_urutan') == "start_date" ? "Tanggal" : "Jumlah Orang");
            $jenis = ($request->get('filter_urutan_jenis') == "ASC" ? "(A - Z)" : "(Z - A)");
            $arr_old->put('filter_urutan', 'Berdasarkan '.$based_on.' '. $jenis);
        }
        return view('user/partner',
        [
            'partner' => $partner->get(),
            'old_key' => $arr_old
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
