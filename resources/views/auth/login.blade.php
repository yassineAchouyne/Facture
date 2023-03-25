@extends('layouts.app')

@section('button')
<a class="btn btn-primary " href="/register">S'inscrire</a>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('connexion') }}</div>
                @if ($errors->has('vemail'))
                <div class="alert alert-danger">{{ $errors->first('vemail') }}</div>
                @endif
                @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Adresse Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>Ces références ne correspondent pas à nos dossiers.</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de Passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('connexion') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link text-center w-100" href="{{ route('password.request') }}">
                                    {{ __('Mot de passe oublié?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="txt1 text-center p-t-54 p-b-20">
                            <span>
                                Ou inscrivez-vous en utilisant
                            </span>
                        </div>

                        <div class="flex-c-m">
                            <a href="{{ route('socialite.redirect', 'facebook') }}" class="login100-social-item bg1">
                                <i class="bi bi-facebook"></i>
                            </a>

                            <a href="#" class="login100-social-item bg2">
                                <i class="bi bi-linkedin"></i>
                            </a>

                            <a href="{{ route('socialite.redirect', 'google') }}" title="Connexion/Inscription avec Google" class="login100-social-item bg3">
                                <i class="bi bi-google"></i>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection