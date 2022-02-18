@extends('layouts.master')
@section('title', 'D2R 交換論壇-註冊')
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
            <form method="POST" action="{{ route('registerform') }}">
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                <input type="hidden" name="form_token" value="{{ str_random(40) }}">
                <h1 class="h3 mb-3 fw-normal">註冊帳號</h1>

                <div class="form-floating">
                    <input class="form-control" name="username" id="floatingUsername" value="{{ old('account') }}" required>
                    <label for="floatingUsername">會員名稱</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" name="account" id="floatingAccout" value="{{ old('account') }}" required>
                    <label for="floatingAccout">帳號</label>
                </div>
                <div class="form-floating">
                    <input class="form-control" name="phone" id="floatingphone" value="{{ old('account') }}" required>
                    <label for="floatingphone">手機</label>
                    <a id="send" class="btn btn-secondary" href="javascript:void(0)">發送認證碼</a>
                </div>
                <div class="form-floating">
                    <input type="number" class="form-control" name="phone_code" id="floatingphone_code" oninput = "value=value.replace(/[^\d]/g,'')" maxlength="4" required>
                    <label for="floatingphone_code">手機認證碼</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password" id="floatingPassword" required>
                    <label for="floatingPassword">密碼</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control" name="password_confirmation" id="floatingPassword_confirmation" required>
                    <label for="floatingPassword_confirmation">密碼確認</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">送出</button>
            </form>

        </div>

    </section>
</main>

{{-- 表單 --}}
@endsection

@push('scripts')
<script src="{{ asset('js/register/register.js') }}"></script>
@endpush
