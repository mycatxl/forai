<!-- Footer Start -->
<footer class="hyper-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm">
                <div class="text-center footer-links d-none d-md-block">
                    {!! dujiaoka_config_get('footer') !!}
                </div>
            </div>
        </div>
    </div>
    <div class="back-to-top">
        <button class="btn btn-primary" id="back-to-top">
            <i class="dripicons-chevron-up"></i>
        </button>
    </div>
</footer>
<!-- end Footer -->

<style>
    /* 让 footer 背景透明，避免分割线 */
    .hyper-footer {
        background-color: transparent; /* 确保 footer 背景透明 */
        margin: 0; /* 去除 footer 上下的默认外边距 */
        padding: 0 0 20px 0; /* 去除顶部和左右的内边距，保留底部内边距 */
        border: none; /* 去除 footer 可能的边框 */
        box-shadow: none; /* 去除 footer 可能的阴影 */
    }

    /* 去除 back-to-top 按钮的额外间距 */
    .back-to-top {
        margin: 0;
    }
</style>
