@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verifikasi alamat email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Sebuah link baru telah dikirim ke email anda.') }}
                        </div>
                    @endif

                    {{ __('Sebelum memulai, silahkan cek email anda untuk verifikasi.') }}
                    {{ __('Jika belu, menerima emailnya ') }}, <a href="{{ route('verification.resend') }}">{{ __('klik disini untuk meminta link aktivasi kembali') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
