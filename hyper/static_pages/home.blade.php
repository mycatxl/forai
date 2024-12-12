@extends('hyper.layouts.default')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <div class="app-search">
                    <div class="position-relative">
                        <input type="text" class="form-control" id="search" placeholder="{{ __('hyper.home_search_box') }}" style="background-color: transparent; border: 1px solid #007bff; border-radius: 12px;"/>
                        <span class="uil-search" style="color: RGB(224,189,0);"></span>
                    </div>
                </div>
            </div>
            <h4 class="page-title">
                <button type="button" class="btn btn-outline-primary ml-1" id="notice-open" style="border-radius: 12px;">
                    <i class="uil-comment-alt-notes me-1"></i>
                    店铺{{ __('hyper.notice_announcement') }}
                </button>
            </h4>
        </div>
    </div>
</div>

<div class="nav nav-list">
    <a href="#group-all" class="tab-link active" data-bs-toggle="tab" aria-expanded="false" role="tab" data-toggle="tab" style="background-color: transparent; border-radius: 12px;">
        <span class="tab-title">
        {{-- 全部 --}}
        {{ __('hyper.home_whole') }}
        </span>
        <!--<div class="img-checkmark" style="background-color: transparent;">-->
        <!--    <img src="/assets/hyper/images/check.png" style="border: none;">-->
        <!--</div>-->
    </a>
    @foreach($data as  $index => $group)
    <a href="#group-{{ $group['id'] }}" class="tab-link" data-bs-toggle="tab" aria-expanded="false" role="tab" data-toggle="tab" style="background-color: transparent; border-radius: 12px;">
        <span class="tab-title">
            {{ $group['gp_name'] }}
        </span>
        <!--下方是选中右下角有个勾的代码-->
        <!--<div class="img-checkmark" style="background-color: transparent;">-->
        <!--    <img src="/assets/hyper/images/check.png" style="border: none;">-->
        <!--</div>-->
    </a>
    @endforeach
</div>


<div class="tab-content">
    <div class="tab-pane active" id="group-all">
        <div class="hyper-wrapper">
            @foreach($data as $group)
                @foreach($group['goods'] as $goods)
                    @if($goods['in_stock'] > 0)
                        <a href="{{ url("/buy/{$goods['id']}") }}" class="home-card category" style="background-color: transparent;">
                    @else
                        <a href="javascript:void(0);" onclick="sell_out_tip()" class="home-card category ribbon-box" style="background-color: transparent;">
                            <div class="ribbon-two ribbon-two-danger">
                                <span>{{ __('hyper.home_out_of_stock') }}</span>
                            </div>
                    @endif
                        <img class="home-img" src="/assets/hyper/images/loading.gif" data-src="{{ picture_ulr($goods['picture']) }}" style="border-radius: 21px;">
                        <div class="flex" style="display: flex; justify-content: center; align-items: center;">
                            <span style="font-size: 21px; line-height: 1; display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px; margin-bottom: 5px; color: #000000;">
                                {{ $goods['gd_name'] }}
                            </span>
                            <div>
                                @if($goods['type'] == \App\Models\Goods::AUTOMATIC_DELIVERY)
                                    <span style="background-color: #45b97c; color: white; padding: 0.15rem 0.35rem; border-radius: 1rem; margin: 0; font-size: 0.675rem;">
                                        {{ __('goods.fields.automatic_delivery') }}
                                    </span>
                                @else
                                    <span style="background-color: #464547; color: white; padding: 0.15rem 0.35rem; border-radius: 1rem; margin: 0; font-size: 0.675rem;">
                                        {{ __('goods.fields.manual_processing') }}
                                    </span>
                                @endif
                                <span style="background-color: #fab27b; color: #000; padding: 0.15rem 0.35rem; border-radius: 1rem; margin: 0 0 0 0.5rem; font-size: 0.675rem;">
                                    {{ __('hyper.home_sales_volume') }}: {{ $goods['sales_volume'] }}
                                </span>
                            </div>
                            <div style="border-bottom: 2px solid #c99979; margin-top: 10px; width: 88%;"></div>
                            <div style="color: #000000; font-size:21px;">
                                <p>
                                    {{ (dujiaoka_config_get('global_currency')) }} <b>{{ $goods['actual_price'] }}</b>
                                    @if ($goods['open_rebate'] > 0 && $goods['rebate_rate'] > 0)
                                        <small class="rebate" style="color: #ed1941;">
                                            返利{{ $goods['rebate_rate'] }}%
                                        </small>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            @endforeach
        </div>
    </div>

    @foreach($data as $group)
        <div class="tab-pane" id="group-{{ $group['id'] }}">
            <div class="hyper-wrapper">
                @foreach($group['goods'] as $goods)
                    @if($goods['in_stock'] > 0)
                        <a href="{{ url("/buy/{$goods['id']}") }}" class="home-card category" style="background-color: transparent;">
                    @else
                        <a href="javascript:void(0);" onclick="sell_out_tip()" class="home-card category ribbon-box" style="background-color: transparent;">
                            <div class="ribbon-two ribbon-two-danger">
                                <span>{{ __('hyper.home_out_of_stock') }}</span>
                            </div>
                    @endif
                        <img class="home-img" src="/assets/hyper/images/loading.gif" data-src="{{ picture_ulr($goods['picture']) }}" style="border-radius: 21px;">
                        <div class="flex" style="display: flex; justify-content: center; align-items: center;">
                            <span style="font-size: 21px; line-height: 1; display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 200px; margin-bottom: 5px; color: #000000;">
                                {{ $goods['gd_name'] }}
                            </span>
                            <div>
                                @if($goods['type'] == \App\Models\Goods::AUTOMATIC_DELIVERY)
                                    <span style="background-color: #45b97c; color: white; padding: 0.15rem 0.35rem; border-radius: 1rem; margin: 0; font-size: 0.675rem;">
                                        {{ __('goods.fields.automatic_delivery') }}
                                    </span>
                                @else
                                    <span style="background-color: #464547; color: white; padding: 0.15rem 0.35rem; border-radius: 1rem; margin: 0; font-size: 0.675rem;">
                                        {{ __('goods.fields.manual_processing') }}
                                    </span>
                                @endif
                                <span style="background-color: #fab27b; color: #000; padding: 0.15rem 0.35rem; border-radius: 1rem; margin: 0 0 0 0.5rem; font-size: 0.675rem;">
                                    {{ __('hyper.home_sales_volume') }}: {{ $goods['sales_volume'] }}
                                </span>
                            </div>
                            <div style="border-bottom: 2px solid #c99979; margin-top: 10px; width: 88%;"></div>
                            <div style="color: #000000; font-size:21px;">
                                <p>
                                    {{ (dujiaoka_config_get('global_currency')) }} <b>{{ $goods['actual_price'] }}</b>
                                    @if ($goods['open_rebate'] > 0 && $goods['rebate_rate'] > 0)
                                        <small class="rebate" style="color: #ed1941;">
                                            返利{{ $goods['rebate_rate'] }}%
                                        </small>
                                    @endif
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

@if(dujiaoka_config_get('is_open_wenzhang') == \App\Models\BaseModel::STATUS_OPEN)    
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header" style="background: #f6f5ec; border: none; padding: 0; text-align: center;">
                <a href="/article" style="text-decoration: none; font-size: 28px; font-weight: bold; color: #555555;">
                    近期资讯
                </a>
            </div>
            <div class="card-body p-0" style="background: #f6f5ec;">
                <table class="table table-centered mb-0">
                    <thead></thead>
                    <tbody>
                        @foreach ($articles->shuffle()->take(6) as $article)
                        <tr>
                            <td style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 150px;">
                                <a href="article/{{ !empty($article['link']) ? $article['link'] : $article['id'] }}" class="text-body">
                                    <span style=" color: #000000;">{{ $article['title'] }}</span>
                                </a>
                            </td>
                            <td class="article-updated-at" style="text-align: right; color: #000000;">{{ $article['updated_at'] }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endif

<div class="modal fade" id="notice-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 12px; background: #fffef9;">
            <div class="modal-header d-flex align-items-center ">
                <button type="button" class="close" style="font-size: 24px; color: red; opacity: 1;" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                {!! dujiaoka_config_get('notice') !!}
            </div>
        </div>
    </div>
</div>

@stop 

@section('js')

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const currentTime = new Date().getTime();
        const lastPopupTime = localStorage.getItem('notice_last_popup_time');
        
        if (!lastPopupTime || (currentTime - lastPopupTime) > 24 * 60 * 60 * 1000) {
            $('#notice-open').click();
            localStorage.setItem('notice_last_popup_time', currentTime);
        }
    });

    $('#notice-open').click(function() {
        $('#notice-modal').modal();
    });

    $("#search").on("input", function(e) {
        var txt = $("#search").val();
        if ($.trim(txt) != "") {
            $(".category").hide().filter(":contains('" + txt + "')").show();
        } else {
            $(".category").show();
        }
    });

    function sell_out_tip() {
        $.NotificationApp.send("{{ __('hyper.home_tip') }}", "{{ __('hyper.home_sell_out_tip') }}", "top-center", "rgba(0,0,0,0.2)", "info");
    }
</script>

@stop
