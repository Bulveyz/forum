<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
  public function index(Channel $channel)
  {

    $threads = Thread::latest()->get();

    if ($channel->exists) {
       $threads = $channel->threads()->get();
    }

    return view('threads.index', compact('threads'));
  }

  public function show(Thread $thread)
  {
    return view('threads.show', compact('thread'));
  }
}
