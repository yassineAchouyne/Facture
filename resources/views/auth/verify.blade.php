@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Vérifier votre adresse Email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse email.') }}
                        </div>
                    @endif

                    {{ __('Avant de poursuivre, veuillez consulter votre courriel pour obtenir un lien de vérification.') }}
                    {{ __('Si vous n’avez pas reçu le email') }}, <br>

                    <a href="/email/resend"  class="btn btn-link p-0 m-0 align-baseline">{{ __('cliquez ici pour en demander un autre') }}</a>.

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
