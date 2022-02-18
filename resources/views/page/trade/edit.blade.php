@extends('layouts.master')

@section('title', 'D2R 交換論壇-編輯道具')

@section('content')

{{-- 訊息 --}}
@if ($errors->any())
    @foreach ( $errors -> all() as $error)
        <div>{{ $error }}</div>
    @endforeach
@endif
{{-- 訊息 --}}

{{-- 表單 --}}
@if (!empty($trade))

<form method="POST" action="{{ route('trade.editform') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="form_token" value="{{ str_random(40) }}"><br>
    <input type="hidden" name="trade_id" value="{{ $trade['id'] }}"><br>
    <input type="hidden" name="user_id" value="{{ $trade['user_id'] }}"><br>
    物品名稱:<input name="goods_name" value="{{ $trade['name'] }}" required><br>

    {{-- 平台 --}}
    平台:<select name="platform_type" id="platform_type" required>
    @foreach ($search_options['platform_type'] as $row)
        @if ($row['id'] == $trade['platform_type_id'])
        <option value="{{ $trade['platform_type_id'] }}" selected>{{ $row['name'] }}</option>
        @else
        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
        @endif
    @endforeach
    </select><br>
    {{-- 平台 --}}

    {{-- 聯盟類型 --}}
    聯盟:<select name="alliance_type" id="alliance_type" required>
    @foreach ($search_options['alliance_type'] as $row)
        @if ($row['id'] == $trade['alliance_type_id'])
        <option value="{{ $trade['alliance_type_id'] }}" selected>{{ $row['name'] }}</option>
        @else
        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
        @endif
    @endforeach
    </select><br>
    {{-- 聯盟類型 --}}

    {{-- 物品類型 --}}
    物品類型:<select name="goods_type" id="goods_type" required>
    @foreach ($search_options['goods_type'] as $row)
        @if ($row['id'] == $trade['goods_type_id'])
        <option value="{{ $trade['goods_type_id'] }}" selected>{{ $row['name'] }}</option>
        @else
        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
        @endif
    @endforeach
    </select><br>
    {{-- 物品類型 --}}

    {{-- 護身符類型 --}}
    @if (!empty($trade['amulet_type_id']))
    護身符類型:<select name="amulet_type" id="amulet_type" required>
    @else
    護身符類型:<select name="amulet_type" id="amulet_type" style="display:none">
    @endif
    @foreach ($search_options['goods_type'] as $row)
        @if ($row['id'] == $trade['goods_type_id'])
        <option value="{{ $trade['goods_type_id'] }}" selected>{{ $row['name'] }}</option>
        @else
        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
        @endif
    @endforeach
    </select><br>
    {{-- 護身符類型 --}}

    {{-- 裝備類型 --}}
    @if (!empty($trade['amulet_type_id']))
    裝備類型:<select name="equipment_type" id="equipment_type" required>
    @else
    裝備類型:<select name="equipment_type" id="equipment_type" style="display:none">
    @endif
    @foreach ($search_options['equipment_type'] as $row)
        @if ($row['id'] == $trade['equipment_type_id'])
        <option value="{{ $trade['equipment_type_id'] }}" selected>{{ $row['name'] }}</option>
        @else
        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
        @endif
    @endforeach
    </select><br>
    {{-- 裝備類型 --}}

    {{-- 寶石類型 --}}
    @if (!empty($trade['amulet_type_id']))
    寶石類型:<select name="gem_type" id="gem_type" required>
    @else
    寶石類型:<select name="gem_type" id="gem_type" style="display:none">
    @endif
    @foreach ($search_options['gem_type'] as $row)
        @if ($row['id'] == $trade['gem_type_id'])
        <option value="{{ $trade['gem_type_id'] }}" selected>{{ $row['name'] }}</option>
        @else
        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
        @endif
    @endforeach
    </select><br>
    {{-- 寶石類型 --}}

    {{-- 符石類型 --}}
    @if (!empty($trade['rune_type_id']))
    符石類型:<select name="rune_type" id="rune_type" required>
    @else
    符石類型:<select name="rune_type" id="rune_type" style="display:none">
    @endif
    @foreach ($search_options['rune_type'] as $row)
        @if ($row['id'] == $trade['rune_type_id'])
        <option value="{{ $trade['rune_type_id'] }}" selected>{{ $row['name'] }}</option>
        @else
        <option value="{{ $row['id'] }}">{{ $row['name'] }}</option>
        @endif
    @endforeach
    </select><br>
    {{-- 符石類型 --}}

    {{-- 裝備屬性 --}}
    @foreach ($trade['join_tradeitem'] as $row)
    屬性:
    <input name="goods_item" value="{{ $row['name'] }}" required>
    數值:
    <input name="goods_item_value" value="{{ $row['value'] }}" required><br>
    @endforeach
    {{-- 裝備屬性 --}}

    定價:<input name="buyname" value="{{ $trade['buyname'] }}" required>
    <input name="price" value="{{ $trade['price'] }}" required><br>
    備註:<input name="remark" value="{{ $trade['remark'] }}" required><br>
    圖片:<input type="file" name="image" required><br>
    <img src="{{ asset($trade['image']) }}" alt=""><br>
    <button class="" type="submit">送出</button>
</form>

@endif
{{-- 表單 --}}

@endsection

@push('scripts')
@endpush

