<?php

namespace App\Http\Controllers;

use App\Channel;
use App\Filters\ThreadFilter;
use App\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index(Channel $channel, ThreadFilter $filter)
  {
    $threads = $this->getThreads($channel, $filter);

    return view('threads.index', compact('threads'));
  }

  public function show(Channel $channel, Thread $thread)
  {
    $thread = $thread->loadMissing('replies');
    return view('threads.show', compact('thread'));
  }

  /**
   * @param Channel $channel
   * @param ThreadFilter $filter
   * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Database\Eloquent\Relations\HasMany
   */
  protected function getThreads(Channel $channel, ThreadFilter $filter)
  {
    $threads = Thread::latest()->filter($filter);

    if ($channel->exists) {
      $threads = $channel->threads();
    }

    $threads = $threads->get();
    return $threads;
  }
}
