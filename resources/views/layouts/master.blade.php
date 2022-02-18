<!DOCTYPE html>
<html lang="zh-TW">
<head>

    {{--  meta,css,seo  --}}
    @include('layouts.head')

    {{--  title  --}}
    <title>@yield('title')</title>
</head>
<body>
    @include('layouts.header')

    {{--  選單  --}}
    @include('layouts.menu')

    {{--  body  --}}
    @yield('content')

    {{--  footer  --}}
    @include('layouts.footer')

    {{--  通用js  --}}
    @include('layouts.script')

    {{--  每頁個別的js  --}}
    @stack('scripts')
</body>
</html>
