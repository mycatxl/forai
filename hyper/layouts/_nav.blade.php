<div class="header-navbar">
    <div class="container header-flex">
        <!-- LOGO -->
        <a href="/" class="topnav-logo" style="float: none;">
            <img src="{{ picture_ulr(dujiaoka_config_get('img_logo')) }}" height="49">
            <div class="logo-title">{{ dujiaoka_config_get('text_logo') }}</div>
            <style>
                .logo-title {
                    font-size: 36px; /* 调整字体大小 */
                    font-weight: bold;
                    background: linear-gradient(45deg, #ff6347, #1e90ff, #32cd32, #ff1493);
                    background-size: 400% 400%;
                    color: transparent;
                    -webkit-background-clip: text; /* 使渐变色只应用到文字上 */
                    animation: gradient-animation 5s ease infinite; /* 动画效果 */
                }
            
                @keyframes gradient-animation {
                    0% {
                        background-position: 0% 50%;
                    }
                    50% {
                        background-position: 100% 50%;
                    }
                    100% {
                        background-position: 0% 50%;
                    }
                }
            </style>
        </a>
        
        <div class="header-right">
            
            @if(dujiaoka_config_get('is_open_wenzhang') == \App\Models\BaseModel::STATUS_OPEN)    
            <a class="btn btn-outline-primary" href="/article" style="border-radius: 12px;">
                站点文章
            </a>
            @endif
   
            <a class="btn btn-outline-primary" href="{{ url('order-search') }}" style="border-radius: 12px;">
                查询订单
            </a>
            @if(Auth::check())
            <button class="btn btn-outline-primary dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-expanded="false" style="border-radius: 12px;">
                <i class="uil uil-user-check"></i>
                账户设置
                <!--{{ Auth::user()->email }}-->
            </button>
            <div class="dropdown-menu " aria-labelledby="dropdownMenuButton" style="min-width: 0;">
                <a class="dropdown-item" href="{{ url('user') }}">个人中心</a>
                <a class="dropdown-item" href="{{ url('/user/invite') }}">代理中心</a>
                @if(Auth::user()->grade > 0)
                <a class="dropdown-item" href="{{ url('/user/wholesale') }}">商品批发</a>
                @endif
                <a class="dropdown-item" href="{{ url('logout') }}">退出登录</a>
            </div>
            @else
            <a class="btn btn-outline-primary" href="{{ url('login') }}" style="border-radius: 12px;">
                <i class="uil uil-user"></i>
                登录
            </a>
  
            @endif
          
        </div>
    </div>
</div>
