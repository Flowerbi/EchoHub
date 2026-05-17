@extends('templates.main')

@section('main')
    <div class="container">
        <div class="current-post">
            <div class="current-post__inner">
                <div class="current-post__left">
                    @if($post->preview_image)
                        <img class="current-post__avatar" src="{{ $post->preview_image }}" alt="avatar profile">
                    @else
                        <img class="current-post__avatar_standart" src="{{ asset('assets/images/standart_image_post.jpg') }}" alt="avatar profile">
                    @endif
                    <h1 class="current-post__title">{{ $post->title }}</h1>
                </div>
                <div class="current-post__right">
                    <p class="current-post__author">{{ $author_post->name }}</p>
                    <p class="current-post__time">{{ $post->created_at->format('Y-m-d') }}</p>
                    <p class="current-post__content">{{ $post->content }}</p>
                </div>
            </div>
        </div>
        <div class="comments">
            <h2 class="comments__title">Comments</h2>
            @if(!$comments->isEmpty())
                <div class="comments__items">
                @foreach($comments as $comment)
                        <div class="comments__item item-comment">
                            <div class="item-comment__inner">
                                @if($comment->avatar_image)
                                    <img src="{{ $comment->avatar_image }}" alt="default avatar user" class="item-comment__image">
                                @else
                                    <img src="{{ asset('assets/images/standart_avatar_user.webp') }}" alt="default avatar user" class="item-comment__image">
                                @endif
                                <div class="item-comment__content">
                                    <div class="item-comment__content_head">
                                        <div class="item-comment__name">{{ $comment->name }}</div>
                                        <span class="item-comment__status">{{ ($comment->is_admin) ? 'Admin' : null }}</span>
                                    </div>
                                    <span class="item-comment__time">{{ $comment->created_at->format('Y-m-d') }}</span>
                                    <p class="item-comment__text">{{ $comment->comment }}</p>
                                </div>
                            </div>
                            @if(auth()->id() === $comment->author_id)
                                <div class="item-comment__footer">
                                    <form action="{{ route('comment.delete.action', $comment->id) }}" method="POST" class="item-comment__form-delete">
                                        <button class="item-comment__delete">Удалить</button>
                                    </form>
                                </div>
                            @endif
                        </div>
                @endforeach
                </div>
            @endif
            @if(auth()->check())
                <h2 class="comments__subtitle">Add comment</h2>
                <form action="{{ route('comment.add.action', $post->id) }}" method="POST" class="comment-form">
                    @csrf
                    <label for="comment">
                        <textarea placeholder="Type comment..." name="comment" id="comment" class="comment-form__textarea @error('comment') comment-form__textarea_error @enderror">{{ old('comment') }}</textarea>
                        @error('comment')
                        <div class="comment-form_error">
                            {{ $message }}
                        </div>
                        @enderror
                    </label>
                    <button class="comment-form__button" type="submit">Submit comment</button>
                </form>
            @endif
        </div>
    </div>
@endsection
