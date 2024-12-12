@extends('hyper.layouts.default')

@section('content')

<div class="row mt-3">
    <div class="col-sm" style="min-width: 291px;">
        <div class="card stats-card" style=" background: #A1EAFB; border-radius: 24px;">
            <div class="stats-detail">
                <span><i class="uil uil-envelope" style="font-size: 14px; vertical-align: left;"></i>注册邮箱</span>
                <div class="stats-member">
                    <h6 class="h6 mt-0" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 88px;" data-toggle="tooltip" data-placement="top" title="{{ Auth::user()->email }}">
                    {{ Auth::user()->email }}
                    </h6>
                </div>
                <div class="malus-invite-tips">
                    ID: {{ Auth::user()->id }}
                </div>
            </div>
            <button class="btn btn-sm btn-warning btn-pill"  style="font-size: 12px; color: #fff; background: #fdb933;" data-toggle="modal" data-target="#changePasswordModal" white-space: nowrap; overflow: hidden; text-overflow: ellipsis;>修改密码</button>
        </div>
    </div>
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm modal-dialog-centered">
            <div class="modal-content" style="border-radius: 24px; background: #A1EAFB;">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <button type="button" class="close" style="font-size: 24px; color: red; opacity: 1;" data-dismiss="modal" aria-hidden="true">
                            &times;
                        </button>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="change-password-form" action="{{ url('/user/change-password') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="password" class="form-control" style="border-radius: 24px; padding: 10px; background-color: #f1f1f1; border: 2px solid #72baa7; color: #333;" placeholder="当前密码" id="current-password" name="current_password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" style="border-radius: 24px; padding: 10px; background-color: #f1f1f1; border: 2px solid #72baa7; color: #333;" placeholder="新密码" id="new-password" name="new_password" required>
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" style="border-radius: 24px; padding: 10px; background-color: #f1f1f1; border: 2px solid #72baa7; color: #333;" placeholder="确认新密码" id="confirm-new-password" name="new_password_confirmation" required>
                        </div>
                        <button type="submit" class="btn btn-primary" style="background-color: #72baa7; border-radius: 24px; color: #130c0e; border: none; display: block; margin: 0 auto;">
                            提交更改
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm" style="min-width: 291px;">
        <div class="card stats-card" style=" background: #A1EAFB; border-radius: 24px;">
            <div class="stats-detail">
                <span><i class="uil uil-wallet" style="font-size: 16px; vertical-align: middle;"></i>账户余额</span>
                <div class="stats-member">
                    <h6 class="h6 mt-0">￥{{ Auth::user()->money }}</h6>
                </div>
            </div>
            <button class="btn btn-sm btn-primary btn-pill" data-toggle="modal" data-target="#rechargeModal" style="font-size: 12px; white-space: nowrap;">
                充值
            </button>
            <div class="malus-invite-tips">充值可得更多好礼哦</div>
        </div>
    </div>
    
    
    <div class="col-sm" style="min-width: 291px;">
        <div class="card stats-card" style=" background: #A1EAFB; border-radius: 24px;">
            <div class="stats-detail">
                <span><i class="uil uil-gift" style="font-size: 16px; vertical-align: middle;"></i>已邀请</span>
                <div class="stats-member">
                    <h6 class="h6 mt-0">{{ $invite_count }} 人</h6>
                </div>
            </div>
            <a href="{{ url('/user/invite') }}" class="btn btn-sm btn-outline-orange btn-pill" style="font-size: 12px; white-space: nowrap; background: #65c294; color: #fff;">
                代理中心
            </a>
            <div class="malus-invite-tips">邀请好友注册，购买还返现金</div>
        </div>
    </div>
    
    <div class="col-sm" style="min-width: 291px;">
        <div class="card stats-card" style=" background: #A1EAFB; border-radius: 24px;">
            <div class="stats-detail">
                <span><i class="uil uil-user-check" style="font-size: 16px; vertical-align: middle;"></i>代理等级</span>
                <div class="stats-member">
                    <h6 class="h6 mt-0">{{ Auth::user()->grade }}级代理</h6>
                </div>
            </div>
            <div class="malus-invite-tips">等级越高单价越低</div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col">
        <div class="text-center my-3"> <!-- 'my-3' 是为了添加一些垂直间距 -->
            <p style="color: red;">{!! dujiaoka_config_get('daili_text') !!}</p>
        </div>
    </div>
</div>


<div class="container">
    <div class="row">
        @foreach ($orders as $order)
            <div class="col-md-4 mb-4">
                <div class="card" style="background-color: #A1EAFB; border-radius: 16px;">
                    <div class="card-body">
                        <h5 class="card-title">订单号: {{ $order->order_sn }}</h5>
                        <p class="card-text" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">订单名称: {{ $order->title }}</p>
                        <p class="card-text">支付金额: ￥{{ $order->actual_price }}</p>
                        <p class="card-text">状态: 
                            @switch($order->status)
                                @case(\App\Models\Order::STATUS_WAIT_PAY)
                                    <span class="badge badge-primary" style="font-size: 14px; border-radius: 24px;">待支付</label>
                                    @break
                                
                                @case(\App\Models\Order::STATUS_PENDING) 
                                    <span class="badge badge-primary" style="font-size: 14px; border-radius: 24px;">待处理</label> 
                                    @break
                                
                                @case(\App\Models\Order::STATUS_PROCESSING) 
                                    <span class="badge badge-primary" style="font-size: 14px; border-radius: 24px;">处理中</label> 
                                    @break
                                    
                                @case(\App\Models\Order::STATUS_COMPLETED) 
                                    <span class="badge badge-primary" style="font-size: 14px; border-radius: 24px;">已完成</label> 
                                    @break
                                
                                @case(\App\Models\Order::STATUS_EXPIRED)
                                    <span class="badge badge-secondary" style="font-size: 14px; border-radius: 24px;">已过期</span>
                                @break
                                
                                @case(\App\Models\Order::STATUS_FAILURE)
                                    <span class="badge badge-danger" style="font-size: 14px; border-radius: 24px;">已失败</span>
                                @break
                            
                                @case(\App\Models\Order::STATUS_FAILURE)
                                    <span class="badge badge-dark" style="font-size: 14px; border-radius: 24px;">状态异常</span>
                                    @break
                                    
                            @endswitch
                        </p>
                        <p class="card-text">创建时间: {{ $order->created_at }}</p>
                        @if ($order->status === \App\Models\Order::STATUS_WAIT_PAY)
                            <button type="button" class="btn btn-warning" onclick="window.location.href='/bill/{{ $order->order_sn }}'" style=" border-radius: 24px;">重新结算</button>
                        @endif
                        <button type="button" class="btn btn-primary" onclick="window.location.href='/search-order-by-sn?order_sn={{ $order->order_sn }}'" style=" border-radius: 24px;">查看订单</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>


<style>
    /* 使卡片内容居中 */
    .vip-center {
        text-align: center;
    }

    /* 让表格单元格的内容居中 */
    .table th, .table td {
        text-align: center;
    }

    /* 使表格容器居中 */
    .table-responsive {
        display: flex;
        justify-content: center;
    }

    /* 让按钮居中 */
    .card-body .btn-link {
        display: block;
        margin: 0 auto;
    }
</style>



<div class="modal fade" id="rechargeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content" style=" background: #A1EAFB; border-radius: 24px;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">余额充值</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <button type="button" class="close" style="font-size: 24px; color: red; opacity: 1;" data-dismiss="modal" aria-hidden="true">
                        &times;
                    </button>
                </button>
            </div>
            <div class="modal-body">
                <form id="buy-form" action="{{ url('/user/recharge-money') }}" method="post">
                    @csrf
                    <div class="form-group buy-group">
                        <div class="buy-title" style="border-radius: 24px; padding: 10px; background-color: #f1f1f1; border: 2px solid #72baa7; color: #333;">充值金额</div>
                        <div class="choose-tag">
                            @if($recharge_promotion)
                            @foreach($recharge_promotion as $key => $item)
                            <div class="tag" data-key="{{ $key }}" data-amount="{{ $item['amount'] }}">
                                充￥{{ $item['amount'] }}<div class="discount-tag">送￥{{ $item['value'] }}</div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                       <input type="number" name="amount" min="1" class="form-control" style="border-radius: 24px; padding: 10px; background-color: #f1f1f1; border: 2px solid #72baa7; color: #333;" placeholder="请输入需要充值的金额" autocomplete="off">

                    </div>
                    <div class="form-group buy-group">
                        {{-- 支付方式 --}}
                        <input type="hidden" name="payway" lay-verify="payway"
                               value="{{ $payways[0]['id'] ?? 0 }}">
                        <div class="buy-title">{{ __('hyper.buy_payment_method') }}:</div>
                        @foreach($payways as $key => $way)
                        <div class="pay-type @if($key == 0) active @endif"
                             data-type="{{ $way['pay_check'] }}" data-id="{{ $way['id'] }}"
                             data-name="{{ $way['pay_name'] }}">
                        </div>
                        @endforeach
                    </div>
                    <div class="mt-4 text-center">
                        <button type="submit" class="btn btn-danger" id="submit" style="border-radius: 24px;">
                            <i class="mdi mdi-truck-fast mr-1"></i>
                            点击充值
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@stop
@section('js')

<script>
document.addEventListener('DOMContentLoaded', function() {
    @if(session('success'))
        // 显示成功消息
        $.NotificationApp.send("Success", "{{ session('success') }}", "top-right", "rgba(0,0,0,0.2)", "success");
    @endif

    @if($errors->any())
        // 显示第一个错误消息
        var firstError = "{{ $errors->all()[0] }}"; // 仅示例，可能需要适当调整
        $.NotificationApp.send("Error", firstError, "top-right", "rgba(0,0,0,0.2)", "error");
    @endif
});
</script>


<script>
   $('.tag').each(function () {
        let t = $(this), key = t.data('key');
    }).click(function () {
        $('.tag').removeClass('active');
        $(this).toggleClass("active");
        $('input[name=amount]').val($(this).data('amount'));
    });
</script>

<script>
$(document).ready(function() {
    // 检查初始支付方式
    updateSubmitButtonState();

    // 支付方式点击事件
    $('.pay-type').click(function() {
        $('.pay-type').removeClass('active'); // 移除所有支付方式的active类
        $(this).addClass('active'); // 当前点击的支付方式添加active类
        $('input[name="payway"]').val($(this).data('id')); // 更新隐藏输入字段的值为当前支付方式的ID
        
        updateSubmitButtonState(); // 更新提交按钮的状态
    });

    // 更新提交按钮的状态
    function updateSubmitButtonState() {
        if ($('input[name="payway"]').val() == 0 || $('input[name="payway"]').val() == "") {
            $('#submit').prop('disabled', true).addClass('btn-disabled'); // 禁用充值按钮
        } else {
            $('#submit').prop('disabled', false).removeClass('btn-disabled'); // 启用充值按钮
        }
    }

    // 充值按钮点击事件
    $('#submit').click(function() {
        if ($("input[name='amount']").val() <= 0) {
            $.NotificationApp.send("警告！", "请输入正确的金额~", "top-center", "rgba(0,0,0,0.2)", "info");
            return false; // 阻止表单提交
        }
    });
});
</script>

<script>
    $(document).ready(function () {
        $('[data-toggle="tooltip"]').tooltip(); // 启动tooltip
    });
</script>

@stop
