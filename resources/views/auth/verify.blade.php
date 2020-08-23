@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Zweryfikuj swój adres e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Link weryfikacyjny został wysłany na twój adres e-mail.
                        </div>
                    @endif

                    Sprawdź swoją skrzynkę. 
                    Jeśli nie otrzymałeś wiadomości
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">kliknij tutaj, aby wysłać ponownie.</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
