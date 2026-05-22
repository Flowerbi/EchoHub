@extends('templates.main')

@section('main')
    <div class="container">
        <div class="profile">
            <div class="profile__inner">
                <div class="profile__left">
                    @if($user->avatar_image)
                        <img class="profile__avatar" src="{{ $user->avatar_image }}" alt="avatar profile">
                    @else
                        <img class="profile__avatar_standart" src="{{ asset('assets/images/standart_avatar_user.webp') }}" alt="avatar profile">
                    @endif
                </div>
                <div class="profile__right">
                    <h1 class="profile__hello">Hello <span class="profile__hello_accent profile__accent">{{ $user->name }}</span>!</h1>
                    <p class="profile__status">Status: <span class="profile__accent">{{ $user->is_admin ? 'Админ' : 'Пользователь' }}</span></p>
                    <p class="profile__email">Email: <span class="profile__accent">{{ $user->email }}</span></p>
                    <p class="profile__count">Комментариев: <span class="profile__accent">{{ $comments->count() }}</span></p>
                    <a href="{{ route('profile.edit.page', $user->id) }}" class="profile__change">Edit profile</a>
                </div>
            </div>
        </div>
        @if(!$comments->isEmpty())
            <div class="comments__items">
                @foreach($comments as $comment)
                    <div class="comments__item item-comment">
                        <div class="item-comment__name-post">Пост "{{ $comment->title }}"</div>
                        <div class="item-comment__inner">
                            @if($user->avatar_image)
                                <img src="{{ $user->avatar_image }}" alt="default avatar user" class="item-comment__image">
                            @else
                                <img src="{{ asset('assets/images/standart_avatar_user.webp') }}" alt="default avatar user" class="item-comment__image">
                            @endif
                            <div class="item-comment__content">
                                <div class="item-comment__content_head">
                                    <div class="item-comment__name">{{ $user->name }}</div>
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
                                <a href="{{ route('post.page', $comment->post_id) }}" class="item-comment__gopost">Перейти к посту</a>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
