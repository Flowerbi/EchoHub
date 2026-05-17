@extends('templates.main')

@section('main')
    <div class="container">
        <h1 class="title">Register</h1>
        <form action="{{ route('register.action') }}" method="POST" enctype="multipart/form-data" class="form-join">
            @csrf
            <label class="form-join__line" for="name">
                <p class="form-join__description">Name</p>
                <input name="name" value="{{ old('name') }}" class="form-join__input @error('name') form-join__input_error @enderror" type="text" id="name">
                @error('name')
                    <div class="form-join__error">
                        {{ $message }}
                    </div>
                @enderror
            </label>
            <label class="form-join__line" for="email">
                <p class="form-join__description">Email</p>
                <input name="email" value="{{ old('email') }}" class="form-join__input @error('email') form-join__input_error @enderror" type="email" id="email">
                @error('email')
                <div class="form-join__error">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <label class="form-join__line" for="password">
                <p class="form-join__description">Password</p>
                <input name="password" class="form-join__input @error('password') form-join__input_error @enderror" type="password" id="password">
                @error('password')
                <div class="form-join__error">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <label class="form-join__line" for="password_confirmation">
                <p class="form-join__description">Password Confirmation</p>
                <input name="password_confirmation" class="form-join__input @error('password_confirmation') form-join__input_error @enderror" type="password" id="password_confirmation">
                @error('password_confirmation')
                <div class="form-join__error">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <label class="form-join__line" for="avatar">
                <p class="form-join__description">Choose Avatar</p>
                <input name="avatar" class="form-join__input @error('avatar') form-join__input_error @enderror" type="file" id="avatar">
                @error('avatar')
                <div class="form-join__error">
                    {{ $message }}
                </div>
                @enderror
            </label>
            <label class="form-join__line form-join__line_checkbox" for="admin">
                <p class="form-join__description">Make admin?</p>
                <input name="isAdmin" class="form-join__input form-join__input_checkbox" type="checkbox" id="admin">
            </label>
            <button type="submit" class="form-join__button">Create account</button>
        </form>
    </div>
@endsection
