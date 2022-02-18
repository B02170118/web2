@extends('layouts.master')
@section('title', 'D2R 交換論壇-會員中心-基本資料')
@section('content')
{{-- 訊息 --}}
@if ($errors->any())
    @foreach ( $errors -> all() as $error)
    <div>{{$error}}</div>
    @endforeach
@endif
{{-- 訊息 --}}

{{-- 表單 --}}
<form method="POST" action="{{ route('user.edit') }}">
    @csrf
@if (!empty($userinfo))
    <input type="hidden" name="form_token" value="{{ str_random(40) }}">
    會員編號:
    <input type="text" value="{{ $userinfo['id'] }}" disabled><br>
    帳號:
    <input type="text" value="{{ $userinfo['account'] }}" disabled><br>
    用戶名:
    <input type="text" value="{{ $userinfo['username'] }}" disabled><br>
    手機:
    <input type="text" value="{{ $userinfo['phone'] }}" disabled><br>
    會員等級:
    <input type="text" value="{{ $userinfo['level'] }}" disabled><br>
    讚數:
    <input type="text" value="{{ $userinfo['good'] }}" disabled><br>
    倒讚數:
    <input type="text" value="{{ $userinfo['bad'] }}" disabled><a href='{{ route('user.userbad', ['id' => $user['id']]) }}'>查看</a><br>
    變更密碼:
    <input type="text" name="password" value="" required><br>
    變更密碼確認:
    <input type="text" name="password_confirmation" value="" required><br>
    <input type="submit" value="送出">
@endif
</form>
{{-- 表單 --}}

@endsection

@push('scripts')
<script>

</script>
@endpush
