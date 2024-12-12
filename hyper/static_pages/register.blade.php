@extends('hyper.layouts.default')
@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <div class="page-title-box">
             @if(dujiaoka_config_get('regmoney') != 0)
                  <div style="color: red;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hot" viewBox="0 0 16 16">
  <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a2 2 0 0 1-1-.268M1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1"/>
</svg>

            </svg>注册送礼金活动已开启，注册即送 {{ dujiaoka_config_get('regmoney') }} {{(dujiaoka_config_get('global_currency')) }}！</div>
                  @endif
        </div>
    </div>
</div>
<div class="mb-3"></div>
@if(dujiaoka_config_get('is_open_reg') == \App\Models\BaseModel::STATUS_OPEN)
<div class="row justify-content-center" style="height: 81vh; display: flex; justify-content: center; align-items: center;">
    <div class="col-lg-4">
        <div class="card card-body sticky" style="color: #000000; background: #A1EAFB; border-radius: 21px;">
            <form id="login" action="{{ url('register') }}" method="post">
                @csrf
                <div style="font-size: 36px; color: #000000; text-align: center; font-family: '楷体', sans-serif; margin-bottom: 10px;">
                    明智的选择
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="{{ __('hyper.register_email_input') }}" style="border-radius: 24px; padding: 10px; background-color: #f1f1f1; border: 2px solid #72baa7; color: #333;">
                </div>
             
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="{{ __('hyper.register_password_input') }}" style="border-radius: 24px; padding: 10px; background-color: #f1f1f1; border: 2px solid #72baa7; color: #333;">
                </div>
                <div class="form-group">
                    <input type="password" name="confirm_password" class="form-control" placeholder="{{ __('hyper.register_confirm_password_input') }}" style="border-radius: 24px; padding: 10px; background-color: #f1f1f1; border: 2px solid #72baa7; color: #333;">
                </div>
                 
                @if(dujiaoka_config_get('is_openreg_img_code') == \App\Models\Goods::STATUS_OPEN)
                    <div class="form-group">
                        <div class="d-flex align-items-center w-100" style="justify-content: center;">
                            <!-- Math question displayed inside a span, centered in the parent -->
                            <span id="math-question" class="mr-2" style="flex-shrink: 0; display: inline-flex; justify-content: center; align-items: center;">
                                {{ __('2 + 2 = ?') }} <!-- Example math question -->
                            </span>
                            <!-- Input field for the answer -->
                            <input type="text" name="math_answer" class="form-control" placeholder="输入结果" id="math-answer" style="flex-grow: 1; min-width: 0px; padding: 2px 5px; border-radius: 24px; padding: 10px; background-color: #f1f1f1; border: 2px solid #72baa7; color: #333;">
                            <!-- Refresh button -->
                            <button type="button" class="btn btn-secondary ml-2" id="refresh" style="flex-shrink: 0; border-radius: 8px; background: #d1c7b7; color: #130c0e">
                                <i class="mdi mdi-refresh mr-1"></i>
                                {{ __('换一个') }}
                            </button>
                        </div>
                    </div>
                @endif


                <div class="form-group">
                    <input type="text" name="invite_code" class="form-control" placeholder="{{ __('hyper.register_invite_code_input') }}" style="border-radius: 24px; padding: 10px; background-color: #f1f1f1; border: 2px solid #72baa7; color: #333;">
                </div>
                <div class="mt-4 text-center">
                    <button type="submit" class="btn btn-primary" id="submit" style="background-color: #72baa7; border-radius: 24px; color: #130c0e; border: none;">
                        <i class="mdi mdi-login mr-1"></i>
                        {{ __('hyper.register_submit') }}
                    </button>
                </div>
            </form id="login" action="{{ url('register') }}" method="post">
            <div class="mt-3 text-center">
                <a href="{{ url('login') }}">{{ __('hyper.to_login') }}</a>
            </div>
        </div>
    </div>
</div>
@else
  <div class="row justify-content-center">
        <div class="col-lg-4">
               <div class="alert alert-danger" role="alert">
        <i class="bi bi-exclamation-triangle-fill"></i> 
                {{ __('hyper.register_title') }}关闭维护中......<a href="/">返回首页</a>
            </div>
        </div>
    </div>
@endif
@stop
@section('js')
<script>
    if (getCookie('aff') != '') {
        $("input[name='invite_code']").val(getCookie('aff'));
    }
    function getQueryVariable(variable) {
        var query = window.location.search.substring(1);
        var vars = query.split("&");
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split("=");
            if (pair[0] == variable) {
                return pair[1];
            }
        }
        return "";
    }

      @if(dujiaoka_config_get('is_openreg_img_code') == \App\Models\Goods::STATUS_OPEN) 
    function generateMathQuestion() {
        var operator = Math.random() < 0.5 ? '+' : '-';
        var num1 = Math.floor(Math.random() * 100);
        var num2 = Math.floor(Math.random() * 100);

        $('#math-question').text(num1 + ' ' + operator + ' ' + num2 + ' =');

        $('#math-question').data('answer', operator === '+' ? num1 + num2 : num1 - num2);
    }

    generateMathQuestion();

    $('#refresh').click(function(){
        generateMathQuestion();
    });

    $('#submit').click(function(){
        var mathAnswer = $("input[name='math_answer']").val();
        if(mathAnswer == ''){
            $.NotificationApp.send("警告","答案不能为空","top-center","rgba(0,0,0,0.2)","info");
            return false;
        }

        // 验证
        var correctAnswer = $('#math-question').data('answer');
        if (parseFloat(mathAnswer) !== correctAnswer) {
            $.NotificationApp.send("警告","答案不正确","top-center","rgba(0,0,0,0.2)","info");
            return false;
        }

        // 随机
        generateMathQuestion();
    });
    @endif
    $('#submit').click(function(){
        var email = $("input[name='email']").val();
        if(email == ''){
            $.NotificationApp.send("{{ __('hyper.buy_warning') }}","{{ __('hyper.register_email_input') }}","top-center","rgba(0,0,0,0.2)","info");
            return false;
        }
        let reg = /^([a-zA-Z]|[0-9])(\w|\-)+@[a-zA-Z0-9]+\.([a-zA-Z]{2,4})$/;
        if (!reg.test(email)) {
            $.NotificationApp.send("{{ __('hyper.buy_warning') }}","{{ __('hyper.register_email_error') }}","top-center","rgba(0,0,0,0.2)","info");
            return false;
        }
        
        var password = $("input[name='password']").val();
        var confirm_password = $("input[name='confirm_password']").val();
        if(password == ''){
            $.NotificationApp.send("{{ __('hyper.buy_warning') }}","{{ __('hyper.register_password_input') }}","top-center","rgba(0,0,0,0.2)","info");
            return false;
        }
        if(confirm_password == ''){
            $.NotificationApp.send("{{ __('hyper.buy_warning') }}","{{ __('hyper.register_confirm_password_input') }}","top-center","rgba(0,0,0,0.2)","info");
            return false;
        }
        if (password != confirm_password){
            $.NotificationApp.send("{{ __('hyper.buy_warning') }}","{{ __('hyper.register_password_error') }}","top-center","rgba(0,0,0,0.2)","info");
            return false;
        }
    });
</script>
@stop