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
        $partner = Partner::with(['user', 'join'])->where('status', '0')->orderBy('start_date', 'ASC')->get()->take(10);
        return view('user/home', ['partner' => $partner]);
    }

    public function overview(Request $request){
        $search = (is_null($request->search) ? "" : $request->search);
        return view('user/partner', ['search' => $search]);
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
        if (Auth::check()) {
            foreach ($partner->join as $pj) {
                if ($pj->user_id == Auth::user()->id && $pj->status == 1) {
                    $joined = 1;
                } else if ($pj->user_id == Auth::user()->id && $pj->status == 0) {
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
        $file_name = $request->user()->id . "_" . $request->start_date . "_" . time() . "." . strtolower($file->getClientOriginalExtension());

        $partner = new Partner;
        $partner->user_id = $request->user()->id;
        $partner->dest_name = $request->dest_name;
        $partner->dest_picture = url('') . '/storage/file/partner/' . $file_name;
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

        return redirect('/partner/' . $partner->id);
    }

    public function manage(Request $request)
    {
        $join = Join::with(['partner', 'user'])->where('user_id', $request->user()->id)->get();
        return view('user/partner_manage', [
            'join' => $join
        ]);
    }

    public function confirmation(Request $request, Partner $partner)
    {
        //! Better with Authorization !//
        if ($partner->user_id != $request->user()->id) {
            return redirect('/partner/manage');
        }

        $join = Join::with(['partner', 'user'])->where('partner_id', $partner->id)->get();
        return view('user/partner_manage_confirmation', [
            'join' => $join,
            'partner' => $partner
        ]);
    }

}
