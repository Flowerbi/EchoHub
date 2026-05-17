@extends('templates.main')

@section('main')
    <div class="container">
        <h1 class="title">Add post</h1>
        <form action="{{ route('post.add.action') }}" method="POST" enctype="multipart/form-data" class="form-join">
            @csrf
            <label class="form-join__line" for="title">
                <p class="form-join__description">Title</p>
                <input name="title" value="{{ old('title') }}" class="form-join__input @error('title') form-join__input_error @enderror" type="text" id="title">
                @error('name')
                    <div class="form-join__error">
                        {{ $message }}
                    </div>
                @enderror
            </label>
            <label class="form-join__line" for="content">
                <p class="form-join__description">Content</p>
                <textarea name="content" class="form-join__input form-join__textarea @error('content') form-join__input_error @enderror" id="content">{{ old('content') }}</textarea>
                @error('content')
                <div class="form-join__error">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <label class="form-join__line" for="preview">
                <p class="form-join__description">Choose Preview</p>
                <input name="preview" class="form-join__input @error('preview') form-join__input_error @enderror" type="file" id="preview">
                @error('preview')
                <div class="form-join__error">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <button type="submit" class="form-join__button">Add post</button>
        </form>
    </div>
@endsection
