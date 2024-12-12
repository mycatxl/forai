@extends('hyper.layouts.seo')

@section('head')
    <style>
        .btn-disabled {
            background-color: #ccc;
            color: #666;
        }
    </style>
@endsection

@section('content')
<div class="buy-grid">
    <div class="buy-shop hyper-sm-last">
        <div class="card card-body sticky" style="background-color: #fffef9; border-radius: 24px;">
            <form id="buy-form" action="{{ url('create-order') }}" method="post">
                @csrf
                <div class="form-group">
                    <h3>{{ $gd_name }}</h3>
                </div>
                <div class="form-group">
                    @if($type == \App\Models\Goods::AUTOMATIC_DELIVERY)
                        <span class="badge badge-outline-primary">{{ __('hyper.buy_automatic_delivery') }}</span>
                    @else
                        <span class="badge badge-outline-danger">{{ __('hyper.buy_charge') }}</span>
                    @endif
                    <span class="badge badge-outline-primary">{{ __('hyper.buy_in_stock') }}({{ $in_stock }})</span>
                    @if($buy_limit_num > 0)
                        <span class="badge badge-outline-dark">{{ __('hyper.buy_purchase_restrictions') }}({{ $buy_limit_num }})</span>
                    @endif
                    @if ($open_rebate > 0 && $rebate_rate > 0)
                        <span class="badge badge-outline-success">返利{{ $rebate_rate }}%</span>
                    @endif
                </div>
                @if(!empty($wholesale_price_cnf) && is_array($wholesale_price_cnf))
                    <div class="form-group">
                        <div class="alert alert-dark bg-white text-dark mb-0" role="alert">
                            @foreach($wholesale_price_cnf as $ws)
                                <span>{{ __('hyper.buy_purchase') }} {{ $ws['number'] }} {{ __('hyper.buy_the_above') }}，{{ $ws['price'] }} {{ dujiaoka_config_get('global_currency') }}/件。</span>
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <h3>
                        <span class="buy-price"> {{ dujiaoka_config_get('global_currency') }} {{ $actual_price }}</span>
                        <small><del> {{ dujiaoka_config_get('global_currency') }} {{ $retail_price }}</del></small>
                    </h3>
                </div>
                <div class="form-group">
                    @if(Auth::check())
                        <div class="buy-title">{{ __('hyper.buy_email') }}</div>
                        <input type="hidden" name="gid" value="{{ $id }}">
                        <input type="email" name="email" class="form-control" value="{{ Auth::user()->email }}" disabled>
                    @else
                        @if(dujiaoka_config_get('is_open_mail') == \App\Models\BaseModel::STATUS_OPEN)
                            <div class="buy-title">随意填写</div>
                            <input type="hidden" name="gid" value="{{ $id }}">
                            <input type="text" name="email" class="form-control" placeholder="随意填写">
                        @else
                            <div class="buy-title">{{ __('hyper.buy_email') }}</div>
                            <input type="hidden" name="gid" value="{{ $id }}">
                            <input type="email" name="email" class="form-control" placeholder="{{ __('hyper.buy_input_account') }}">
                        @endif
                    @endif
                </div>
                <div class="form-group">
                    <div class="buy-title">{{ __('hyper.buy_purchase_quantity') }}</div>
                    <div class="input-group">
                        <input data-toggle="touchspin" type="text" name="by_amount" value="1" data-bts-max="99999">
                    </div>
                </div>
                @if(dujiaoka_config_get('is_open_search_pwd') == \App\Models\Goods::STATUS_OPEN)
                    <div class="form-group">
                        <div class="buy-title">{{ __('hyper.buy_search_password') }}</div>
                        <input type="text" name="search_pwd" value="" class="form-control" placeholder="{{ __('hyper.buy_input_search_password') }}">
                    </div>
                @endif
                @if(isset($open_coupon))
                    <div class="form-group">
                        <div class="buy-title">{{ __('hyper.buy_promo_code') }}</div>
                        <input type="text" name="coupon_code" class="form-control" placeholder="{{ __('hyper.buy_input_promo_code') }}">
                    </div>
                @endif
                @if($type == \App\Models\Goods::MANUAL_PROCESSING && is_array($other_ipu))
                    @foreach($other_ipu as $ipu)
                        <div class="form-group">
                            <div class="buy-title">{{ $ipu['desc'] }}</div>
                            <input type="text" name="{{ $ipu['field'] }}" @if($ipu['rule'] !== false) required @endif class="form-control" placeholder="{{ $ipu['placeholder'] }}">
                        </div>
                    @endforeach
                @endif
                @if(dujiaoka_config_get('is_open_geetest') == \App\Models\Goods::STATUS_OPEN)
                    <div class="form-group">
                        <div class="buy-title">{{ __('hyper.buy_behavior_verification') }}</div>
                        <div id="geetest-captcha"></div>
                        <p id="wait-geetest-captcha" class="show">loading...</p>
                    </div>
                @endif
                @if(dujiaoka_config_get('is_open_img_code') == \App\Models\Goods::STATUS_OPEN)
                    <div class="form-group">
                        <div class="buy-title">{{ __('hyper.buy_verify_code') }}</div>
                        <div class="input-group">
                            <input type="text" name="img_verify_code" value="" class="form-control" placeholder="{{ __('hyper.buy_verify_code') }}">
                            <div class="input-group-append">
                                <div class="buy-captcha">
                                    <img class="captcha-img" src="{{ captcha_src('buy') . time() }}" onclick="refresh()" style="cursor: pointer;">
                                </div>
                            </div>
                        </div>
                        <script>
                            function refresh() {
                                $('img[class="captcha-img"]').attr('src', '{{ captcha_src('buy') }}'+Math.random());
                            }
                        </script>
                    </div>
                @endif
                @if($preselection >= 0 && !empty($selectable))
                    <div class="form-group">
                        @php $foundInfo = false; @endphp
                        <div class="buy">
                            @foreach($selectable as $carmi)
                                @if(!empty($carmi['info']))
                                    @if(!$foundInfo)
                                        <div>
                                            <label class="col-form-label">{{ __('dujiaoka.preselection') }} <b>{{ $preselection }} {{ dujiaoka_config_get('global_currency') }}<span class="buy-price"></b></span></label>
                                        </div>
                                        @php $foundInfo = true; @endphp
                                    @endif
                                    <div>
                                        <label>
                                            <input type="radio" name="carmi_id" value="{{ $carmi['id'] }}">
                                            {{ $carmi['info'] }}
                                        </label>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif
                <div class="form-group">
                    <div class="buy-title">{{ __('hyper.buy_payment_method') }}</div>
                    <div class="input-group">
                        <input type="hidden" name="payway" value="{{ Auth::check() ? 0 : $payways[0]['id'] ?? 0 }}">
                        @if(Auth::check())
                            <div class="pay-type active" data-type="balance" data-id="0" data-name="余额支付"></div>
                        @endif
                        <div class="pay-grid">
                            @foreach($payways as $key => $way)
                                <div class="btn pay-type @if($key == 0 && !Auth::check()) active @endif" data-type="{{ $way['pay_check'] }}" data-id="{{ $way['id'] }}" data-name="{{ $way['pay_name'] }}"></div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="mt-4 text-center">
                    <input type="hidden" name="aff" value="">
                    <button type="submit" class="btn btn-danger" id="submit">
                        <i class="mdi mdi-truck-fast mr-1"></i>{{ __('hyper.buy_order_now') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="card card-body buy-product" style="background-color: #fffef9; border-radius: 24px;">
        {!! $description !!}
    </div>
</div>
<div class="modal fade" id="buy_prompt" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-color: #fffef9; border-radius: 24px;">
            <div class="modal-header d-flex align-items-center ">
                <button type="button" class="close" style="font-size: 24px; color: red; opacity: 1;" data-dismiss="modal" aria-hidden="true">
                    &times;
                </button>
            </div>
            <div class="modal-body">
                {!! $buy_prompt !!}
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="img-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: none;">
        <img id="img-zoom" style="border-radius: 5px;">
    </div>
</div>
@endsection

@section('js')
    @parent
    <script>
        if (getCookie('aff') != '') {
            $("input[name='aff']").val(getCookie('aff'));
        }
        $('#submit').click(function(){
            if($("input[name='email']").val() == ''){
                $.NotificationApp.send("{{ __('hyper.buy_warning') }}","{{ __('hyper.buy_empty_mailbox') }}","top-center","rgba(0,0,0,0.2)","info");
                return false;
            }
            if($("input[name='by_amount']").val() == 0 ){
                $.NotificationApp.send("{{ __('hyper.buy_warning') }}","{{ __('hyper.buy_zero_quantity') }}","top-center","rgba(0,0,0,0.2)","info");
                return false;
            }
            if($("input[name='by_amount']").val() > {{ $in_stock }}){
                $.NotificationApp.send("{{ __('hyper.buy_warning') }}","{{ __('hyper.buy_exceeds_stock') }}","top-center","rgba(0,0,0,0.2)","info");
                return false;
            }
            @if($buy_limit_num > 0)
            if($("input[name='by_amount']").val() > {{ $buy_limit_num }}){
                $.NotificationApp.send("{{ __('hyper.buy_warning') }}","{{ __('hyper.buy_exceeds_limit') }}","top-center","rgba(0,0,0,0.2)","info");
                return false;
            }
            @endif
            @if(dujiaoka_config_get('is_open_search_pwd') == \App\Models\Goods::STATUS_OPEN)
            if($("input[name='search_pwd']").val() == 0){
                $.NotificationApp.send("{{ __('hyper.buy_warning') }}","{{ __('hyper.buy_empty_query_password') }}","top-center","rgba(0,0,0,0.2)","info");
                return false;
            }
            @endif
            @if(dujiaoka_config_get('is_open_img_code') == \App\Models\Goods::STATUS_OPEN)
            if($("input[name='img_verify_code']").val() == ''){
                $.NotificationApp.send("{{ __('hyper.buy_warning') }}","{{ __('hyper.buy_empty_captcha') }}","top-center","rgba(0,0,0,0.2)","info");
                return false;
            }
            @endif
        });

        document.addEventListener('DOMContentLoaded', function() {
            updateSubmitButtonState();
            const payTypes = document.querySelectorAll('.pay-type');
            payTypes.forEach(function(payType) {
                payType.addEventListener('click', function() {
                    handlePayTypeClick(this);
                    updateSubmitButtonState();
                });
            });

            const submitButton = document.getElementById('submit');
            submitButton.addEventListener('click', function(event) {
                const selectedPayType = document.querySelector('.pay-type.active');
                if (!selectedPayType) {
                    event.preventDefault();
                    alert('请选择支付方式后再提交订单');
                }
            });
        });

        function handlePayTypeClick(clickedPayType) {
            const payTypes = document.querySelectorAll('.pay-type');
            payTypes.forEach(function(payType) {
                payType.classList.remove('active');
            });
            clickedPayType.classList.add('active');
        }

        function updateSubmitButtonState() {
            const submitButton = document.getElementById('submit');
            const selectedPayType = document.querySelector('.pay-type.active');
            if (selectedPayType) {
                submitButton.disabled = false;
                submitButton.classList.remove('btn-disabled');
            } else {
                submitButton.disabled = true;
                submitButton.classList.add('btn-disabled');
            }
        }

        @if(!empty($buy_prompt))
            $('#buy_prompt').modal();
        @endif
        $(function() {
            $("#img-zoom").click(function(){
                $('#img-modal').modal("hide");
            });
            $("#img-dialog").click(function(){
                $('#img-modal').modal("hide");
            });
            $(".buy-product img").each(function(i){
                var src = $(this).attr("src");
                $(this).click(function () {
                    $("#img-zoom").attr("src", src);
                    var oImg = $(this);
                    var img = new Image();
                    img.src = $(oImg).attr("src");
                    var realWidth = img.width;
                    var realHeight = img.height;
                    var ww = $(window).width();
                    var hh = $(window).height();
                    $("#img-content").css({"top":0,"left":0,"height":"auto"});
                    $("#img-zoom").css({"height":"auto"});
                    $("#img-zoom").css({"margin-left":"auto"});
                    $("#img-zoom").css({"margin-right":"auto"});
                    if((realWidth+20)>ww){
                        $("#img-content").css({"width":"100%"});
                        $("#img-zoom").css({"width":"100%"});
                    }else{
                        $("#img-content").css({"width":realWidth+20, "height":realHeight+20});
                        $("#img-zoom").css({"width":realWidth, "height":realHeight});
                    }
                    if((hh-realHeight-40)>0){
                        $("#img-content").css({"top":(hh-realHeight-40)/2});
                    }
                    if((ww-realWidth-20)>0){
                        $("#img-content").css({"left":(ww-realWidth-20)/2});
                    }
                    $('#img-modal').modal();
                });
            });
        });
    </script>
    @if(dujiaoka_config_get('is_open_geetest') == \App\Models\Goods::STATUS_OPEN)
    <script src="https://static.geetest.com/static/tools/gt.js"></script>
    <script>
        var geetest = function(url) {
            var handlerEmbed = function(captchaObj) {
                $("#geetest-captcha").closest('form').submit(function(e) {
                    var validate = captchaObj.getValidate();
                    if (!validate) {
                        $.NotificationApp.send("{{ __('hyper.buy_warning') }}","{{ __('hyper.buy_correct_verification') }}","top-center","rgba(0,0,0,0.2)","info");
                        e.preventDefault();
                    }
                });
                captchaObj.appendTo("#geetest-captcha");
                captchaObj.onReady(function() {
                    $("#wait-geetest-captcha")[0].className = "d-none";
                });
                captchaObj.onSuccess(function () {$('#geetest-captcha').attr("placeholder",'{{ __('dujiaoka.success_behavior_verification') }}')});
                captchaObj.appendTo("#geetest-captcha");
            };
            $.ajax({
                url: url + "?t=" + (new Date()).getTime(),
                type: "get",
                dataType: "json",
                success: function(data) {
                    initGeetest({
                        width: '100%',
                        gt: data.gt,
                        challenge: data.challenge,
                        product: "popup",
                        offline: !data.success,
                        new_captcha: data.new_captcha,
                        lang: '{{ dujiaoka_config_get('language') ?? 'zh_CN' }}',
                        http: '{{ (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://" }}' + '://'
                    }, handlerEmbed);
                }
            });
        };
        (function() {
            geetest('{{ '/check-geetest' }}');
        })();
    </script>
    @endif
@endsection