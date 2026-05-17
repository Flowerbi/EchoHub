@extends('templates.main')

@section('main')
    <div class="container">
        <h1 class="title">Posts</h1>
        <div class="posts">
            @foreach($posts as $post)
                <div class="post">
                    @if($post->preview_image)
                        <img src="{{ $post->preview_image }}" alt="{{ $post->title }}" class="post__image">
                    @else
                        <img src="{{ asset('assets/images/standart_image_post.jpg') }}" alt="none image" class="post__image_standart">
                    @endif
                    <div class="post__content">
                        <div class="post__title">{{ (strlen($post->title) > 70) ? substr($post->title, 0, 80) . '...' : $post->title }}</div>
                        <div class="post__author">{{ $users->where('id', $post->author_id)->first()->name }}</div>
                        <p class="post__text">{{ (strlen($post->content) > 300) ? substr($post->content, 0, 300) . '...' : $post->content }}</p>
                        <a href="{{ route('post.page', $post->id) }}" class="post__button">Read more...</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
