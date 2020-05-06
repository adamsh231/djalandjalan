<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Comment;
use App\Reply;

class CommentController extends Controller
{
    public function newComment(Request $request, $partner){
        $request->validate([
            'message' => ['required'],
        ]);

        $comment = new Comment;
        $comment->user_id = $request->user()->id;
        $comment->partner_id = $partner;
        $comment->message = $request->message;
        $comment->save();

        return redirect('/partner/'.$partner.'#tulisDiskusi');
    }

    public function newReply(Request $request, $partner, $comment){
        $request->validate([
            'message' => ['required'],
        ]);

        $reply = new Reply;
        $reply->user_id = $request->user()->id;
        $reply->comment_id = $comment;
        $reply->message = $request->message;
        $reply->save();

        return redirect('/partner/'.$partner.'#comment'.$comment);
    }
}
