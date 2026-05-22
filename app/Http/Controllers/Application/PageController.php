<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Post;
use App\Models\Comment;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home', ['posts' => Post::all(), 'users' => User::all()]);
    }

    public function register()
    {
        return view('pages.register');
    }

    public function login()
    {
        return view('pages.login');
    }

    public function profile(User $profile)
    {
        $profile_comments = Comment::join('posts', 'comments.post_id', 'posts.id')
            ->where('comments.author_id', $profile->id)
            ->select([
                'comments.id',
                'comments.author_id',
                'comments.post_id',
                'comments.comment',
                'comments.created_at',
                'posts.title',
            ])
            ->get();

        return view('pages.profile', ['user' => $profile, 'comments' => $profile_comments]);
    }

    public function profile_edit(User $profile)
    {
        return view('pages.profile_edit', ['user' => $profile]);
    }

    public function post(Post $post)
    {
        $post_comments = Comment::join('users', 'users.id', '=', 'comments.author_id')
            ->where('comments.post_id', $post->id)
            ->select([
                'comments.id',
                'comments.author_id',
                'comments.post_id',
                'comments.comment',
                'comments.created_at',
                'users.name',
                'users.email',
                'users.password',
                'users.is_admin',
                'users.avatar_image'
            ])
            ->get();

        $author_post = User::whereId($post->author_id)->first();

        return view('pages.post', ['post' => $post, 'author_post' => $author_post, 'comments' => $post_comments]);
    }

    public function post_add()
    {
        return view('pages.add_post');
    }
}
