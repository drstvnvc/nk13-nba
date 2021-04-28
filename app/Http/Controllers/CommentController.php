<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\Team;
use Illuminate\Http\Request;

class CommentController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function store(Team $team, CreateCommentRequest $request)
  {
    $data = $request->validated();
    $comment = new Comment($data);
    $comment->team()->associate($team);
    $comment->user()->associate(auth()->user());
    $comment->save();
    
    return back();
  }
}
