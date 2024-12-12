@extends('hyper.layouts.default')
@section('content')
@if(dujiaoka_config_get('is_open_login') == \App\Models\BaseModel::STATUS_OPEN)
    <div style="height: 81vh; display: flex; justify-content: center; align-items: center;">
        <div class="col-lg-4 col-md-6 col-sm-8 mx-auto" >
            <div class="card card-body sticky" style="color: #000000; background: #A1EAFB; border-radius: 21px;">
                <form id="login" action="{{ url('login') }}" method="post">
                    @csrf
                    <div style="font-size: 36px; color: #000000; text-align: center; font-family: '楷体', sans-serif; margin-bottom: 10px;">
                        欢 迎 回 家
                    </div>
                    <!-- Existing email and password fields -->
                    <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="{{ __('hyper.login_email_input') }}" style="border-radius: 24px; padding: 10px; background-color: #f1f1f1; border: 2px solid #72baa7; color: #333;">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="{{ __('hyper.login_password_input') }}" style="border-radius: 24px; padding: 10px; background-color: #f1f1f1; border: 2px solid #72baa7; color: #333;">
                    </div>
                    
                    <!-- Math question field -->
                    @if(dujiaoka_config_get('is_openlogin_img_code') == \App\Models\Goods::STATUS_OPEN)
                    <div class="form-group">
                        <div class="buy-title">{{ __('数学题必填') }} </div>
                        <label id="math-question"></label>
                        <input type="text" name="math_answer" class="form-control" placeholder="输入结果">
                    </div>
         
                    <!-- Refresh button -->
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" id="refresh">
                            <i class="mdi mdi-refresh mr-1"></i>
                            {{ __('换一个') }}
                        </button>
                    </div>
                    @endif
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-primary" id="submit" style="background-color: #72baa7; border-radius: 24px; color: #130c0e; border: none;">
                            <i class="mdi mdi-login mr-1"></i>
                            {{ __('hyper.login_submit') }}
                        </button>
                    </div>
                </form>
                <div class="mt-3 text-center">
                    {{ __('hyper.to_tip') }}<a href="{{ url('register') }}">{{ __('hyper.to_register') }}</a>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="alert alert-warning">
                {{ __('hyper.login_title') }}关闭维护中......<a href="/">返回首页</a>
            </div>
        </div>
    </div>
@endif
@stop
@section('js')
<script>
    @if(dujiaoka_config_get('is_openlogin_img_code') == \App\Models\Goods::STATUS_OPEN) 
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
        if(password == ''){
            $.NotificationApp.send("{{ __('hyper.buy_warning') }}","{{ __('hyper.register_password_input') }}","top-center","rgba(0,0,0,0.2)","info");
            return false;
        }
    });
</script>
@stop
