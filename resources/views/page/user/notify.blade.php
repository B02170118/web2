@extends('layouts.master')
@section('title', 'D2R 交換論壇-會員中心-通知')
@section('content')

@if (!empty($notify))
    @foreach ($notify as $row)
    <p>{{ $row['msg'] }}</p><br>
    @endforeach
@endif
</form>
{{-- 表單 --}}

@endsection

@push('scripts')
<script>

</script>
@endpush
