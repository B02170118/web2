<?php
use Illuminate\Database\Eloquent\Collection;

/**
 * Variables from Controller
 * @see App\Http\Controllers\web\TradeController::index()
 * @var Collection $userInfo
 */

$userId = $userInfo->id??"";
?>
@extends('layouts.master')

@section('title', 'D2R 交換論壇')

@section('content')
{{-- 公告 --}}
@if (!empty($post))

{{ var_dump($post) }}

@endif
{{-- 公告 --}}



<main>
    <section class="py-5 text-center container">
        <div class="row py-5">
        <div class="col-md-8 mx-auto">
            {{-- 訊息 --}}
            @if ($errors->any())
            @foreach ( $errors -> all() as $error)
            <div>{{ print_r($error)}}</div>
            @endforeach
            @endif
            {{-- 訊息 --}}
            <h1 class="fw-light">
            ‎Diablo II: Resurrected 交換論壇
            </h1>
            <p class="lead text-muted">
            寫上一些警語以及問候.寫上一些警語以及問候.寫上一些警語以及問候.寫上一些警語以及問候.寫上一些警語以及問候.
            </p>
        </div>
        </div>
        <div class="row py-3">
        <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
            <button class="btn btn-outline-success" type="submit">
            Search
            </button>
        </form>
        </div>
    </section>

    {{-- 交易列表 --}}
    <section class="py-5 bg-light">
        <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @if (!empty($trade))
            @foreach ($trade as $row)
            <article class="col">
                <div class="card">
                    <div class="card-head">
                    <img src="{{ asset("{$row['image']}") }}" alt="">
                    </div>
                    <div class="card-body">
                    <p class="trade-id">No.<span>{{ sprintf("%07d",$row['id']) }}</span></p>
                    <div class="trade-type">
                        <p>
                            <span class="season-type">{{ $row['join_platform_type']['name'] }}</span>
                        </p>
                        <p>
                            <span class="season-type">{{ $row['join_alliance_type']['name'] }}</span>
                        </p>
                        <p>
                            <span class="goods_type">{{ $row['join_goods_type']['name'] }}</span>
                        @if ($row['join_goods_type']['name'] == '裝備')
                            <span class="equipment-type">{{ $search_options['equipment_type'][$row['join_equipment_type']['id']]['name'] }}</span>
                        @elseif ($row['join_goods_type']['name'] == '符石')
                            <span class="equipment-type">{{ $search_options['rune_type'][$row['join_rune_type']['id']]['name'] }}</span>
                        @elseif ($row['join_goods_type']['name'] == '寶石')
                            <span class="equipment-type">{{ $search_options['gem_type'][$row['join_gem_type']['id']]['name'] }}</span>
                        @elseif ($row['join_goods_type']['name'] == '護身符')
                            <span class="equipment-type">{{ $search_options['amulet_type'][$row['join_amulet_type']['id']]['name'] }}</span>
                        @endif
                        </p>
                    </div>
                    <h3 class="trade-name">{{ $row['name'] }}</h3>
                    <ul class="trade-item">
                    @foreach ($row['join_tradeitem'] as $row2)
                    <li>{{ $row2['name'] }} 數值: {{ $row2['value']??null }}</li>
                    @endforeach
                    </ul>
                    <p>by {{ $row['join_user']['username'] }}</p>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                        @if($userId!=$row['join_user']['id'])
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('chat.chatBox')."?chatWithId=".$row['join_user']['id'] . "&tradId=".$row['id'] }}" target="_blank">密語</a>
                        @else
                            <a class="btn btn-sm btn-outline-secondary" href="{{ route('trade.edit',['trade_id'=>$row['id']]) }}" target="_self">編輯</a>
                        @endif
                        </div>
                        <small class="text-muted">{{ gettrade_time_after(strtotime($row['updated_at'])) }}</small>
                    </div>
                    </div>
                </div>
            </article>
            @endforeach
        @else
            <div>無資料</div>
        @endif
        </div>
        </div>
    </section>
    {{-- 交易列表 --}}

</main>
@endsection

@push('scripts')
<script>

</script>
@endpush
