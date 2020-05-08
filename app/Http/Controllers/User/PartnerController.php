<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Partner;
use App\Join;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
    public function view()
    {
        $partner = Partner::with(['user', 'join'])->where('status', '0')->get()->take(10);
        return view('user/home', ['partner' => $partner]);
    }

    public function overview(Request $request)
    {
        $partner = (new Partner)->newQuery();
        $partner->with(['user', 'join'])->where('status', '0');

        //* -------------- Filter ------------------*//
        $arr_old = collect();
        if (!is_null($request->get('filter_tempat'))) {
            $partner->where('dest_name', 'LIKE', '%' . $request->get('filter_tempat') . '%');
            $arr_old->put('filter_tempat', $request->get('filter_tempat'));
        }
        if (!is_null($request->get('filter_kategori'))) {
            $partner->where('categories', 'LIKE', '%' . $request->get('filter_kategori') . '%');
            $arr_old->put('filter_kategori', $request->get('filter_kategori'));
        }
        if (!is_null($request->get('start_date'))) {
            $partner->where([
                ['start_date', '>=', $request->get('start_date')],
                ['end_date', '<=', $request->get('end_date')]
            ]);
            $arr_old->put('tanggal', date('d M Y', strtotime($request->start_date)) . ' - ' . date('d M Y', strtotime($request->end_date)));
        }
        if (!is_null($request->get('filter_jumlah'))) {
            switch ($request->get('filter_jumlah')) {
                case 1:
                    $partner->where('required_person', '<', '3');
                    $arr_old->put('filter_jumlah', 'Kurang dari 3 orang');
                    break;
                case 2:
                    $partner->whereBetween('required_person', ['3', '6']);
                    $arr_old->put('filter_jumlah', '3 sampai 6 orang');
                    break;
                case 3:
                    $partner->where('required_person', '>', '6');
                    $arr_old->put('filter_jumlah', 'Lebih dari 6 orang');
                    break;
            }
        }
        if (!is_null($request->get('filter_urutan'))) {
            $partner->orderBy($request->get('filter_urutan'), $request->get('filter_urutan_jenis') ?? "ASC");
            $based_on = ($request->get('filter_urutan') == "start_date" ? "Tanggal" : "Jumlah Orang");
            $jenis = ($request->get('filter_urutan_jenis') ?? "ASC" == "ASC" ? "(Menaik)" : "(Menurun)");
            $arr_old->put('filter_urutan', 'Berdasarkan ' . $based_on . ' ' . $jenis);
        }
        //* ----------------------------------------*//

        return view(
            'user/partner',
            [
                'partner' => $partner->get(),
                'old_key' => $arr_old
            ]
        );
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
        )->findOrFail($id);

        $joined = -1;
        if(Auth::check()){
            foreach($partner->join as $pj){
                if($pj->user_id == Auth::user()->id && $pj->status == 1){
                    $joined = 1;
                }else if($pj->user_id == Auth::user()->id && $pj->status == 0){
                    $joined = 0;
                }
            }
        }

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
                'isJoin' => $joined
            ]
        );
    }

    public function addPartner(Request $request)
    {
        $request->validate(
            [
                'dest_picture' => ['required', 'mimes:jpg,png,jpeg'],
                'categories' => ['required'],
                'dest_name' => ['required'],
                'dest_location' => ['required'],
                'start_date' => ['required'],
                'end_date' => ['required'],
                'gather_point' => ['required'],
                'required_person' => ['required', 'numeric'],
                'description' => ['required'],
                'agreement' => ['accepted'],
            ]
        );
        $file = $request->file('dest_picture');
        $file_name = $request->user()->id . "_" . $request->start_date ."_" . time() . "." . strtolower($file->getClientOriginalExtension());

        $partner = new Partner;
        $partner->user_id = $request->user()->id;
        $partner->dest_name = $request->dest_name;
        $partner->dest_picture = url('').'/storage/file/partner/'.$file_name;
        $partner->dest_location = $request->dest_location;
        $partner->start_date = $request->start_date;
        $partner->end_date = $request->end_date;
        $partner->gather_point = $request->gather_point;
        $partner->categories = $request->categories;
        $partner->required_person = $request->required_person;
        $partner->description = $request->description;

        $file->storeAs('file/partner/', $file_name, 'public');
        $partner->save();

        $join = new Join;
        $join->user_id = $request->user()->id;
        $join->partner_id = $partner->id;
        $join->status = 1;
        $join->save();

        return redirect('/partner/'.$partner->id);
    }
}
