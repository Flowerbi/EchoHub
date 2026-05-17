<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Http\Requests\Post\AddRequest;
use App\Http\Requests\Post\AddCommentRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;

class PostController extends Controller
{
    public function post_add(AddRequest $request)
    {
        $id_user = auth()->user()->id;

        if($request->hasFile('preview')){
            $pathToPreviewPost = '/storage/post_previews/' . $request->file('preview')->hashName();
            $request->file('preview')->store('post_previews');
        }

        Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author_id' => $id_user,
            'preview_image' => $pathToPreviewPost ?? null
        ]);

        return redirect()->route('home.page');
    }

    public function comment_add(Post $post, AddCommentRequest $request)
    {
        Comment::create([
            'comment' => $request->input('comment'),
            'author_id' => auth()->user()->id,
            'post_id' => $post->id
        ]);

        return redirect()->back();
    }

    public function comment_delete(Comment $comment)
    {
        $comment->forceDelete();

        return redirect()->back();
    }
}
