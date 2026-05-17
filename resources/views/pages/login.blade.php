@extends('templates.main')

@section('main')
    <div class="container">
        <h1 class="title">Login</h1>
        <form action="{{ route('login.action') }}" method="POST" class="form-join">
            @csrf
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
            <button type="submit" class="form-join__button">Login</button>
        </form>
    </div>
@endsection
