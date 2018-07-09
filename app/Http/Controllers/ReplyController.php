<?php

namespace App\Http\Controllers;

use App\Thread;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
  public function store(Thread $thread, Request $request)
  {
    $this->validate($request, [
        'body' => 'required'
    ]);

    $thread->addReply([
        'user_id' => auth()->id(),
        'body' => $request->body
    ]);

    return back();
  }
}
