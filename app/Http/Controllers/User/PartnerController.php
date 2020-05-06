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

    public function overview()
    {
        $partner = Partner::with(['user'])->get();
        return view('user/partner', ['partner' => $partner]);
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