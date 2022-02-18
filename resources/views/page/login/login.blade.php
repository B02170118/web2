@extends('layouts.master')
@section('title', 'D2R 交換論壇-登入')
@section('content')
<link rel="stylesheet" href="{{ asset('css/login.min.css') }}" />
{{-- 訊息 --}}
@if ($errors->any())
    @foreach ( $errors -> all() as $error)
    <div>{{$error}}</div>
    @endforeach
@endif
{{-- 訊息 --}}

{{-- 表單 --}}
<main>
    <section class="login-section">
        <div class="form-signin">
            <form method="POST" action="{{ route('loginform') }}">
                @csrf
                <input type="hidden" name="form_token" value="{{ str_random(40) }}">
                <h1 class="h3 mb-3 fw-normal">會員登入</h1>
                <div class="form-floating">
                    <input class="form-control" name="account" id="floatingAccout" value="{{ old('account') }}" required>
                    <label for="floatingAccout">帳號</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" value="" required>
                    <label for="floatingPassword">密碼</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" name="captcha" id="floatingCaptcha" required>
                    <label for="floatingCaptcha">驗證碼</label>
                    <img src="{{captcha_src()}}" style="cursor: pointer" onclick="this.src='{{captcha_src()}}'+Math.random()">
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">送出</button>
            </form>
        </div>
    </section>
</main>
{{-- 表單 --}}
@endsection

@push('scripts')
<script>

</script>
@endpush
