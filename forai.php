<html lang="en"><head>
    <meta charset="UTF-8">
    <title>快速开始</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="Description">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <link href="docsify/lib/themes/vue.css" rel="stylesheet">
    <link href="styles.css" rel="stylesheet">
<style>:root{--theme-color: #3F51B5;}</style><style>
.sidebar {
  padding-top: 0;
}

.search {
  margin-bottom: 20px;
  padding: 6px;
  border-bottom: 1px solid #eee;
}

.search .input-wrap {
  display: flex;
  align-items: center;
}

.search .results-panel {
  display: none;
}

.search .results-panel.show {
  display: block;
}

.search input {
  outline: none;
  border: none;
  width: 100%;
  padding: 0.6em 7px;
  font-size: inherit;
  border: 1px solid transparent;
}

.search input:focus {
  box-shadow: 0 0 5px var(--theme-color, #42b983);
  border: 1px solid var(--theme-color, #42b983);
}

.search input::-webkit-search-decoration,
.search input::-webkit-search-cancel-button,
.search input {
  -webkit-appearance: none;
  -moz-appearance: none;
  appearance: none;
}

.search input::-ms-clear {
  display: none;
  height: 0;
  width: 0;
}

.search .clear-button {
  cursor: pointer;
  width: 36px;
  text-align: right;
  display: none;
}

.search .clear-button.show {
  display: block;
}

.search .clear-button svg {
  transform: scale(.5);
}

.search h2 {
  font-size: 17px;
  margin: 10px 0;
}

.search a {
  text-decoration: none;
  color: inherit;
}

.search .matching-post {
  border-bottom: 1px solid #eee;
}

.search .matching-post:last-child {
  border-bottom: 0;
}

.search p {
  font-size: 14px;
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}

.search p.empty {
  text-align: center;
}

.app-name.hide, .sidebar-nav.hide {
  display: none;
}</style><style data-id="immersive-translate-input-injected-css">.immersive-translate-input {
  position: absolute;
  top: 0;
  right: 0;
  left: 0;
  bottom: 0;
  z-index: 2147483647;
  display: flex;
  justify-content: center;
  align-items: center;
}
.immersive-translate-attach-loading::after {
  content: " ";

  --loading-color: #f78fb6;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  display: block;
  margin: 12px auto;
  position: relative;
  color: white;
  left: -100px;
  box-sizing: border-box;
  animation: immersiveTranslateShadowRolling 1.5s linear infinite;

  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-2000%, -50%);
  z-index: 100;
}

.immersive-translate-loading-spinner {
  vertical-align: middle !important;
  width: 10px !important;
  height: 10px !important;
  display: inline-block !important;
  margin: 0 4px !important;
  border: 2px rgba(221, 244, 255, 0.6) solid !important;
  border-top: 2px rgba(0, 0, 0, 0.375) solid !important;
  border-left: 2px rgba(0, 0, 0, 0.375) solid !important;
  border-radius: 50% !important;
  padding: 0 !important;
  -webkit-animation: immersive-translate-loading-animation 0.6s infinite linear !important;
  animation: immersive-translate-loading-animation 0.6s infinite linear !important;
}

@-webkit-keyframes immersive-translate-loading-animation {
  from {
    -webkit-transform: rotate(0deg);
  }

  to {
    -webkit-transform: rotate(359deg);
  }
}

@keyframes immersive-translate-loading-animation {
  from {
    transform: rotate(0deg);
  }

  to {
    transform: rotate(359deg);
  }
}

.immersive-translate-input-loading {
  --loading-color: #f78fb6;
  width: 6px;
  height: 6px;
  border-radius: 50%;
  display: block;
  margin: 12px auto;
  position: relative;
  color: white;
  left: -100px;
  box-sizing: border-box;
  animation: immersiveTranslateShadowRolling 1.5s linear infinite;
}

@keyframes immersiveTranslateShadowRolling {
  0% {
    box-shadow: 0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0),
      0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
  }

  12% {
    box-shadow: 100px 0 var(--loading-color), 0px 0 rgba(255, 255, 255, 0),
      0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
  }

  25% {
    box-shadow: 110px 0 var(--loading-color), 100px 0 var(--loading-color),
      0px 0 rgba(255, 255, 255, 0), 0px 0 rgba(255, 255, 255, 0);
  }

  36% {
    box-shadow: 120px 0 var(--loading-color), 110px 0 var(--loading-color),
      100px 0 var(--loading-color), 0px 0 rgba(255, 255, 255, 0);
  }

  50% {
    box-shadow: 130px 0 var(--loading-color), 120px 0 var(--loading-color),
      110px 0 var(--loading-color), 100px 0 var(--loading-color);
  }

  62% {
    box-shadow: 200px 0 rgba(255, 255, 255, 0), 130px 0 var(--loading-color),
      120px 0 var(--loading-color), 110px 0 var(--loading-color);
  }

  75% {
    box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0),
      130px 0 var(--loading-color), 120px 0 var(--loading-color);
  }

  87% {
    box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0),
      200px 0 rgba(255, 255, 255, 0), 130px 0 var(--loading-color);
  }

  100% {
    box-shadow: 200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0),
      200px 0 rgba(255, 255, 255, 0), 200px 0 rgba(255, 255, 255, 0);
  }
}

.immersive-translate-toast {
  display: flex;
  position: fixed;
  z-index: 2147483647;
  left: 0;
  right: 0;
  top: 1%;
  width: fit-content;
  padding: 12px 20px;
  margin: auto;
  overflow: auto;
  background: #fef6f9;
  box-shadow: 0px 4px 10px 0px rgba(0, 10, 30, 0.06);
  font-size: 15px;
  border-radius: 8px;
  color: #333;
}

.immersive-translate-toast-content {
  display: flex;
  flex-direction: row;
  align-items: center;
}

.immersive-translate-toast-hidden {
  margin: 0 20px 0 72px;
  text-decoration: underline;
  cursor: pointer;
}

.immersive-translate-toast-close {
  color: #666666;
  font-size: 20px;
  font-weight: bold;
  padding: 0 10px;
  cursor: pointer;
}

@media screen and (max-width: 768px) {
  .immersive-translate-toast {
    top: 0;
    padding: 12px 0px 0 10px;
  }
  .immersive-translate-toast-content {
    flex-direction: column;
    text-align: center;
  }
  .immersive-translate-toast-hidden {
    margin: 10px auto;
  }
}

.immersive-translate-modal {
  display: none;
  position: fixed;
  z-index: 2147483647;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  overflow: auto;
  background-color: rgb(0, 0, 0);
  background-color: rgba(0, 0, 0, 0.4);
  font-size: 15px;
}

.immersive-translate-modal-content {
  background-color: #fefefe;
  margin: 10% auto;
  padding: 40px 24px 24px;
  border: 1px solid #888;
  border-radius: 10px;
  width: 80%;
  max-width: 270px;
  font-family: system-ui, -apple-system, "Segoe UI", "Roboto", "Ubuntu",
    "Cantarell", "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji",
    "Segoe UI Symbol", "Noto Color Emoji";
  position: relative;
}

@media screen and (max-width: 768px) {
  .immersive-translate-modal-content {
    margin: 50% auto !important;
  }
}

.immersive-translate-modal .immersive-translate-modal-content-in-input {
  max-width: 500px;
}
.immersive-translate-modal-content-in-input .immersive-translate-modal-body {
  text-align: left;
  max-height: unset;
}

.immersive-translate-modal-title {
  text-align: center;
  font-size: 16px;
  font-weight: 700;
  color: #333333;
}

.immersive-translate-modal-body {
  text-align: center;
  font-size: 14px;
  font-weight: 400;
  color: #333333;
  word-break: break-all;
  margin-top: 24px;
}

@media screen and (max-width: 768px) {
  .immersive-translate-modal-body {
    max-height: 250px;
    overflow-y: auto;
  }
}

.immersive-translate-close {
  color: #666666;
  position: absolute;
  right: 16px;
  top: 16px;
  font-size: 20px;
  font-weight: bold;
}

.immersive-translate-close:hover,
.immersive-translate-close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
}

.immersive-translate-modal-footer {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  margin-top: 24px;
}

.immersive-translate-btn {
  width: fit-content;
  color: #fff;
  background-color: #ea4c89;
  border: none;
  font-size: 16px;
  margin: 0 8px;
  padding: 9px 30px;
  border-radius: 5px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.immersive-translate-btn:hover {
  background-color: #f082ac;
}
.immersive-translate-btn:disabled {
  opacity: 0.6;
  cursor: not-allowed;
}
.immersive-translate-btn:disabled:hover {
  background-color: #ea4c89;
}

.immersive-translate-cancel-btn {
  /* gray color */
  background-color: rgb(89, 107, 120);
}

.immersive-translate-cancel-btn:hover {
  background-color: hsl(205, 20%, 32%);
}

.immersive-translate-action-btn {
  background-color: transparent;
  color: #ea4c89;
  border: 1px solid #ea4c89;
}

.immersive-translate-btn svg {
  margin-right: 5px;
}

.immersive-translate-link {
  cursor: pointer;
  user-select: none;
  -webkit-user-drag: none;
  text-decoration: none;
  color: #007bff;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
}

.immersive-translate-primary-link {
  cursor: pointer;
  user-select: none;
  -webkit-user-drag: none;
  text-decoration: none;
  color: #ea4c89;
  -webkit-tap-highlight-color: rgba(0, 0, 0, 0.1);
}

.immersive-translate-modal input[type="radio"] {
  margin: 0 6px;
  cursor: pointer;
}

.immersive-translate-modal label {
  cursor: pointer;
}

.immersive-translate-close-action {
  position: absolute;
  top: 2px;
  right: 0px;
  cursor: pointer;
}

.imt-image-status {
  background-color: rgba(0, 0, 0, 0.5) !important;
  display: flex !important;
  flex-direction: column !important;
  align-items: center !important;
  justify-content: center !important;
  border-radius: 16px !important;
}
.imt-image-status img,
.imt-image-status svg,
.imt-img-loading {
  width: 28px !important;
  height: 28px !important;
  margin: 0 0 8px 0 !important;
  min-height: 28px !important;
  min-width: 28px !important;
  position: relative !important;
}
.imt-img-loading {
  background-image: url("data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADgAAAA4CAMAAACfWMssAAAAtFBMVEUAAAD////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////oK74hAAAAPHRSTlMABBMIDyQXHwyBfFdDMSw+OjXCb+5RG51IvV/k0rOqlGRM6KKMhdvNyZBz9MaupmxpWyj437iYd/yJVNZeuUC7AAACt0lEQVRIx53T2XKiUBCA4QYOiyCbiAsuuGBcYtxiYtT3f6/pbqoYHVFO5r+iivpo6DpAWYpqeoFfr9f90DsYAuRSWkFnPO50OgR9PwiCUFcl2GEcx+N/YBh6pvKaefHlUgZd1zVe0NbYcQjGBfzrPE8Xz8aF+71D8gG6DHFPpc4a7xFiCDuhaWgKgGIJQ3d5IMGDrpS4S5KgpIm+en9f6PlAhKby4JwEIxlYJV9h5k5nee9GoxHJ2IDSNB0dwdad1NAxDJ/uXDHYmebdk4PdbkS58CIVHdYSUHTYYRWOJblWSyu2lmy3KNFVJNBhxcuGW4YBVCbYGRZwIooipHsNqjM4FbgOQqQqSKQQU9V8xmi1QlgHqQQ6DDBvRUVCDirs+EzGDGOQTCATgtYTnbCVLgsVgRE0T1QE0qHCFAht2z6dLvJQs3Lo2FQoDxWNUiBhaP4eRgwNkI+dAjVOA/kUrIDwf3CG8NfNOE0eiFotSuo+rBiq8tD9oY4Qzc6YJw99hl1wzpQvD7ef2M8QgnOGJfJw+EltQc+oX2yn907QB22WZcvlUpd143dqQu+8pCJZuGE4xCuPXJqqcs5sNpsI93Rmzym1k4Npk+oD1SH3/a3LOK/JpUBpWfqNySxWzCfNCUITuDG5dtuphrUJ1myeIE9bIsPiKrfqTai5WZxbhtNphYx6GEIHihyGFTI69lje/rxajdh0s0msZ0zYxyPLhYCb1CyHm9Qsd2H37Y3lugVwL9kNh8Ot8cha6fUNQ8nuXi5z9/ExsAO4zQrb/ev1yrCB7lGyQzgYDGuxq1toDN/JGvN+HyWNHKB7zEoK+PX11e12G431erGYzwmytAWU56fkMHY5JJnDRR2eZji3AwtIcrEV8Cojat/BdQ7XOwGV1e1hDjGGjXbdArm8uJZtCH5MbcctVX8A1WpqumJHwckAAAAASUVORK5CYII=");
  background-size: 28px 28px;
  animation: image-loading-rotate 1s linear infinite !important;
}

.imt-image-status span {
  color: var(--bg-2, #fff) !important;
  font-size: 14px !important;
  line-height: 14px !important;
  font-weight: 500 !important;
  font-family: "PingFang SC", Arial, sans-serif !important;
}

@keyframes image-loading-rotate {
  from {
    transform: rotate(360deg);
  }
  to {
    transform: rotate(0deg);
  }
}
</style></head>
<body data-page="zh-cn/developer/plugin/started.md" class="ready sticky">
<a href="https://github.com/lizhipay/mcy-shop" target="_blank" class="github-corner" aria-label="View source on Github"><svg viewBox="0 0 250 250" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a><main><button class="sidebar-toggle" aria-label="Menu"><div class="sidebar-toggle-button"><span></span><span></span><span></span></div></button><aside class="sidebar"><div class="search"><div class="input-wrap">
      <input type="search" value="" aria-label="Search text" placeholder="输入关键词搜索">
      <div class="clear-button">
        <svg width="26" height="24">
          <circle cx="12" cy="12" r="11" fill="#ccc"></circle>
          <path stroke="white" stroke-width="2" d="M8.25,8.25,15.75,15.75"></path>
          <path stroke="white" stroke-width="2" d="M8.25,15.75,15.75,8.25"></path>
        </svg>
      </div>
    </div>
    <div class="results-panel"></div>
    </div><h1 class="app-name"><a class="app-name-link" data-nosearch="" href="/"><img alt="萌次元商城系统" src="/favicon.ico?v=1"></a></h1><div class="sidebar-nav"><ul><li><strong>入门</strong><ul><li><a href="#/README" title="介绍">介绍</a></li><li><a href="#/zh-cn/arch" title="架构">架构</a></li><li><a href="#/zh-cn/started/cli-install" title="CLI模式安装(推荐)">CLI模式安装(推荐)</a></li><li><a href="#/zh-cn/started/fpm-install" title="FPM模式安装">FPM模式安装</a></li></ul></li><li><strong>使用者</strong><ul><li>主站后台<ul><li><a href="#/zh-cn/user/main/main" title="MAIN">MAIN</a></li><li><a href="#/zh-cn/user/main/shop" title="SHOP">SHOP</a></li><li><a href="#/zh-cn/user/main/user" title="USER">USER</a></li><li><a href="#/zh-cn/user/main/repertory" title="REPERTORY">REPERTORY</a></li><li><a href="#/zh-cn/user/main/pay" title="PAY">PAY</a></li><li><a href="#/zh-cn/user/main/app" title="APP">APP</a></li><li><a href="#/zh-cn/user/main/config" title="CONFIG">CONFIG</a></li></ul></li><li>会员/分站后台<ul><li><a href="#/zh-cn/user/usr/shop" title="我要购物">我要购物</a></li><li><a href="#/zh-cn/user/usr/money" title="我的钱包">我的钱包</a></li><li><a href="#/zh-cn/user/usr/user" title="个人中心">个人中心</a></li></ul></li></ul></li><li><strong>开发者</strong><ul><li>插件<ul><li class=""><a href="#/zh-cn/developer/plugin/started" title="快速开始">快速开始</a><ul class="app-sub-sidebar"><li class="active"><a class="section-link" href="#/zh-cn/developer/plugin/started?id=%e5%bc%80%e5%8f%91%e5%89%8d%e8%a8%80" title="开发前言">开发前言</a></li><li class=""><a class="section-link" href="#/zh-cn/developer/plugin/started?id=%e5%bc%80%e5%8f%91%e8%80%85%e6%a8%a1%e5%bc%8f" title="开发者模式">开发者模式</a></li><li class=""><a class="section-link" href="#/zh-cn/developer/plugin/started?id=%e6%8f%92%e4%bb%b6%e9%85%8d%e7%bd%ae%e6%96%87%e4%bb%b6" title="插件配置文件">插件配置文件</a></li><li class=""><a class="section-link" href="#/zh-cn/developer/plugin/started?id=%e6%94%af%e4%bb%98%e6%8f%92%e4%bb%b6" title="支付插件">支付插件</a></li><li><a class="section-link" href="#/zh-cn/developer/plugin/started?id=%e8%b4%a7%e6%ba%90%e6%8f%92%e4%bb%b6%e5%8f%91%e8%b4%a7%e8%83%bd%e5%8a%9b" title="货源插件(发货能力)">货源插件(发货能力)</a></li><li><a class="section-link" href="#/zh-cn/developer/plugin/started?id=%e8%b4%a7%e6%ba%90%e6%8f%92%e4%bb%b6%e5%a4%96%e6%8e%a5%e8%b4%a7%e6%ba%90%e8%83%bd%e5%8a%9b" title="货源插件(外接货源能力)">货源插件(外接货源能力)</a></li><li><a class="section-link" href="#/zh-cn/developer/plugin/started?id=%e5%88%9b%e5%bb%ba%e6%95%b0%e6%8d%ae%e5%ba%93" title="创建数据库">创建数据库</a></li><li><a class="section-link" href="#/zh-cn/developer/plugin/started?id=websocket" title="WebSocket">WebSocket</a></li><li><a class="section-link" href="#/zh-cn/developer/plugin/started?id=process" title="Process">Process</a></li><li><a class="section-link" href="#/zh-cn/developer/plugin/started?id=%e5%91%bd%e4%bb%a4%e8%a1%8c" title="命令行">命令行</a></li><li><a class="section-link" href="#/zh-cn/developer/plugin/started?id=composer-%e4%be%9d%e8%b5%96" title="Composer 依赖">Composer 依赖</a></li></ul></li><li>HOOK<ul><li><a href="#/zh-cn/developer/plugin/hook/started" title="入门">入门</a></li><li><a href="#/zh-cn/developer/plugin/hook/system" title="系统位置">系统位置</a></li><li><a href="#/zh-cn/developer/plugin/hook/http-admin" title="管理端(HTTP)">管理端(HTTP)</a></li><li><a href="#/zh-cn/developer/plugin/hook/http-user" title="用户端(HTTP)">用户端(HTTP)</a></li><li><a href="#/zh-cn/developer/plugin/hook/page-admin" title="管理端(VIEW)">管理端(VIEW)</a></li><li><a href="#/zh-cn/developer/plugin/hook/page-user" title="用户端(VIEW)">用户端(VIEW)</a></li><li><a href="#/zh-cn/developer/plugin/hook/table-columns" title="表格列(全局通用)">表格列(全局通用)</a></li><li><a href="#/zh-cn/developer/plugin/hook/form" title="弹窗表单黑客">弹窗表单黑客</a></li><li><a href="#/zh-cn/developer/plugin/hook/language" title="国际化处理">国际化处理</a></li></ul></li></ul></li><li>类以及模型<ul><li><a href="#/zh-cn/developer/class/request" title="Request">Request</a></li><li><a href="#/zh-cn/developer/class/response" title="Response">Response</a></li><li><a href="#/zh-cn/developer/class/route" title="Route">Route</a></li><li><a href="#/zh-cn/developer/class/context" title="Context">Context</a></li></ul></li><li>JS-API<ul><li><a href="#/zh-cn/developer/js-api/popup" title="Popup">Popup</a></li></ul></li></ul></li></ul></div></aside><section class="content"><article class="markdown-section" id="main"><h2 id="开发前言"><a href="#/zh-cn/developer/plugin/started?id=%e5%bc%80%e5%8f%91%e5%89%8d%e8%a8%80" data-id="开发前言" class="anchor"><span>开发前言</span></a></h2><p>无论是<code>支付插件</code>、<code>系统插件</code>、<code>货源插件</code>、<code>网站主题</code>
，均通过插件进行开发，我们的插件系统能够使用的能力：<code>支付接口</code>、<code>页面HOOK</code>、<code>数据库支持</code>、<code>路由注册</code>、<code>国际化支持</code>、<code>菜单注册</code>、<code>注册常驻进程</code>、<code>WebSocket</code>
等。</p><h2 id="开发者模式"><a href="#/zh-cn/developer/plugin/started?id=%e5%bc%80%e5%8f%91%e8%80%85%e6%a8%a1%e5%bc%8f" data-id="开发者模式" class="anchor"><span>开发者模式</span></a></h2><blockquote>
<p>在使用开发者模式之前，请先卸载常驻服务，在程序根目录执行：<code>mcy service.uninstall</code>进行卸载服务。</p></blockquote>
<p>通过开发者模式启动程序：<code>./dev.sh start</code></p><h2 id="插件配置文件"><a href="#/zh-cn/developer/plugin/started?id=%e6%8f%92%e4%bb%b6%e9%85%8d%e7%bd%ae%e6%96%87%e4%bb%b6" data-id="插件配置文件" class="anchor"><span>插件配置文件</span></a></h2><blockquote>
<p>插件一般存在<code>/app/Plugin</code>目录下，插件文件夹命名必须是首字母大写驼峰形式</p></blockquote>
<p>下面是各个文件夹说明</p><ul><li><strong>Assets</strong>
：静态资源文件夹，比如你的CSS和JS，可以放到这个文件夹下面，当插件启动后，该目录就可以正常访问了，比如：<code>/app/Plugin/Trc20Usdt/Assets/Css/Pay.css</code></li><li><strong>Config</strong>：插件配置文件夹<ul><li><p><strong>Handle.php</strong>
：能力声明配置文件，该文件主要声明你的插件实现了那些能力，目前有：<code>支付接口</code>、<code>货源接口</code>、<code>数据库访问</code>、<code>WebSocket</code></p><pre v-pre="" data-lang="php"><code class="lang-php">  &lt;?php
  declare (strict_types=1);

  return [
      \Kernel\Plugin\Handle\Pay::class =&gt; \App\Plugin\Demo\Handle\Pay::class,  //声明实现了支付接口
      \Kernel\Plugin\Handle\Database::class =&gt; \App\Plugin\Demo\Handle\Database::class, //声明了你的插件需要使用数据库
      \Kernel\Plugin\Handle\Ship::class =&gt; \App\Plugin\Demo\Handle\Ship::class, //声明你的插件支持供货功能
  ];</code></pre></li><li><p><strong>Info.php</strong>：插件的声明信息，比如作者名称，插件名称</p><pre v-pre="" data-lang="php"><code class="lang-php">  &lt;?php
  declare(strict_types=1);
  
  use Kernel\Plugin\Const\Plugin;
  use Kernel\Language\Language;
  
  return [
      Plugin::NAME =&gt; Language::inst()-&gt;output("人工发货"), //插件名称
      Plugin::AUTHOR =&gt; '荔枝', //插件作者
      Plugin::DESCRIPTION =&gt; '手动选择订单发货、固定发货信息，适合一些必须人工完成的商品', //插件说明
      Plugin::VERSION =&gt; '1.0.0', //插件版本号
      Plugin::TYPE =&gt; Plugin::TYPE_SHIP, //插件类型：TYPE_SHIP（货源插件）、TYPE_PAY（支付插件）、TYPE_GENERAL（通用插件）、TYPE_THEME（模板主题）
      Plugin::ARCH =&gt; Plugin::ARCH_CLI | Plugin::ARCH_FPM
  ];</code></pre></li><li><p><strong>Route.php</strong>：注册路由/控制器</p><pre v-pre="" data-lang="php"><code class="lang-php">  &lt;?php
  declare (strict_types=1);
  
  return [
      [
          "name" =&gt; "付款页面", //路由名称
          "route" =&gt; "/checkout", //路由地址，如果你的插件叫：Trc20Usdt，那么最终URL就是：/plugin/trc20-usdt/order，我们会把驼峰转成"-"
          "class" =&gt; \App\Plugin\Trc20Usdt\Controller\Pay::class, //控制器类
          "action" =&gt; "checkout", //控制器中的方法名称
          "method" =&gt; "GET" //请求方法：POST、GET
      ],
      [
          "name" =&gt; "获取订单状态",
          "route" =&gt; "/state",
          "class" =&gt; \App\Plugin\Trc20Usdt\Controller\Pay::class,
          "action" =&gt; "state",
          "method" =&gt; "POST"
      ]
  ];</code></pre></li><li><p><strong>Menu.php</strong>：注册菜单文件</p><pre v-pre="" data-lang="php"><code class="lang-php">  &lt;?php
  declare (strict_types=1);
  
  use Kernel\Util\Route;
  
  return [
      [
          "name" =&gt; "人工发货", //菜单名称
          "type" =&gt; Route::TYPE_PAGE,
          "icon" =&gt; 'icon-rengongzhineng', //菜单icon
          "route" =&gt; "/plugin/hand-ship/order" //菜单页面地址
      ],
  ];</code></pre></li><li><p><strong>Submit.js</strong>：插件的设置功能配置文件，组件需要查看<a href="#/zh-cn/developer/js-api/popup">JSAPI-Popup</a>
，我们的配置文件只需要提供<code>tab</code>数组部分即可</p><pre v-pre="" data-lang="javascript"><code class="lang-javascript">  <span class="token punctuation">[</span>
      <span class="token punctuation">{</span>
          <span class="token literal-property property">name</span><span class="token operator">:</span> <span class="token string">"插件配置"</span><span class="token punctuation">,</span> <span class="token comment">//配置名称</span>
          <span class="token literal-property property">form</span><span class="token operator">:</span> <span class="token punctuation">[</span>
              <span class="token punctuation">{</span>
                  <span class="token literal-property property">title</span><span class="token operator">:</span> <span class="token string">"关键词"</span><span class="token punctuation">,</span> <span class="token comment">//组件名称</span>
                  <span class="token literal-property property">name</span><span class="token operator">:</span> <span class="token string">"keywords"</span><span class="token punctuation">,</span> <span class="token comment">//组件name，插件获取配置就要靠这个</span>
                  <span class="token literal-property property">type</span><span class="token operator">:</span> <span class="token string">"textarea"</span><span class="token punctuation">,</span>  <span class="token comment">//组件类型，详情查看JS-API中的：Popup</span>
                  <span class="token literal-property property">height</span><span class="token operator">:</span> <span class="token number">180</span><span class="token punctuation">,</span> <span class="token comment">//组件高度，部分组件类型支持</span>
                  <span class="token literal-property property">placeholder</span><span class="token operator">:</span> <span class="token string">"SQL关键词，一行一个"</span> <span class="token comment">//组件的默认提示文本</span>
              <span class="token punctuation">}</span>
          <span class="token punctuation">]</span>
      <span class="token punctuation">}</span>
  <span class="token punctuation">]</span></code></pre></li><li><p><strong>Handle.js</strong>：多配置文件，用法和<code>Submit.js</code>一模一样，唯独不同的是<code>Handle.js</code>是给货源插件和支付插件使用的，而<code>Submit.js</code>则是所有类型插件都可以使用</p></li><li><p><strong>Pay.php</strong>
：支付通道配置文件，主要是提供用户在添加支付接口的时候，选择的通道，在实现支付接口能力的时候，通过<code>$this-&gt;code</code>
，获取当前订单使用的支付通道。</p><pre v-pre="" data-lang="php"><code class="lang-php">&lt;?php
declare (strict_types=1);
return [
    'alipay' =&gt; '支付宝',
    'wxpay' =&gt; '微信',
    'qqpay' =&gt; 'QQ钱包'
];</code></pre></li></ul></li></ul><h2 id="支付插件"><a href="#/zh-cn/developer/plugin/started?id=%e6%94%af%e4%bb%98%e6%8f%92%e4%bb%b6" data-id="支付插件" class="anchor"><span>支付插件</span></a></h2><p>开发支付插件，我们需要继承<code>\Kernel\Plugin\Abstract\Pay</code>支付类，然后实现支付类的抽象方法，下面是一个完整的支付插件实现类：</p><pre v-pre="" data-lang="php"><code class="lang-php">&lt;?php
declare (strict_types=1);

namespace App\Plugin\Epay\Handle;

use Kernel\Context\Interface\Response;
use Kernel\Exception\JSONException;
use Kernel\Util\Http;

class Pay extends \Kernel\Plugin\Abstract\Pay
{


    /**
     * @return \Kernel\Plugin\Entity\Pay
     * @throws JSONException
     */
    public function create(): \Kernel\Plugin\Entity\Pay
    {
        if (!$this-&gt;config['url']) {
            throw new JSONException("请配置支付网关地址");
        }

        if (!$this-&gt;config['pid']) {
            throw new JSONException("请配置商户ID");
        }

        if (!$this-&gt;config['key']) {
            throw new JSONException("请配置商户密钥");
        }


        $param = [
            'pid' =&gt; $this-&gt;config['pid'],
            'name' =&gt; "商品购买-订单号:" . $this-&gt;order-&gt;trade_no,
            'type' =&gt; $this-&gt;code,
            'money' =&gt; $this-&gt;amount,
            'out_trade_no' =&gt; $this-&gt;order-&gt;trade_no,
            'notify_url' =&gt; $this-&gt;asyncUrl,
            'return_url' =&gt; $this-&gt;syncUrl,
            'sitename' =&gt; $this-&gt;order-&gt;trade_no,
            'clientip' =&gt; $this-&gt;clientIp
        ];

        $param['sign'] = self::generateSignature($param, $this-&gt;config['key']);
        $param['sign_type'] = "MD5";

        $pay = new \Kernel\Plugin\Entity\Pay();
        $pay-&gt;setTimeout(300);

        $url = trim($this-&gt;config['url'], "/");
        $types = [
            'alipay' =&gt; \Kernel\Plugin\Const\Pay::RENDER_COMMON_ALIPAY_VIEW,
            'wxpay' =&gt; \Kernel\Plugin\Const\Pay::RENDER_COMMON_WECHAT_VIEW,
            'qqpay' =&gt; \Kernel\Plugin\Const\Pay::RENDER_COMMON_QQ_VIEW
        ];

        if ($this-&gt;config['mapi'] == 1) {
            try {
                $response = Http::make()-&gt;post($url . "/mapi.php", [
                    "form_params" =&gt; $param
                ]);
                $json = json_decode($response-&gt;getBody()-&gt;getContents(), true);
                if ($json['code'] != 1) {
                    throw new JSONException((string)$json['msg']);
                }
                if (isset($json['qrcode'])) {
                    $pay-&gt;setPayUrl($json['qrcode']);
                    $pay-&gt;setRenderMode($types[$this-&gt;code]);
                    return $pay;
                } elseif (isset($json['payurl'])) {
                    $pay-&gt;setPayUrl($json['payurl']);
                    $pay-&gt;setRenderMode(\Kernel\Plugin\Const\Pay::RENDER_JUMP);
                    return $pay;
                }
            } catch (\Throwable $e) {
                $this-&gt;plugin-&gt;log("商户ID：{$this-&gt;config['pid']}，MAPI请求出错：" . $e-&gt;getMessage());
                throw new JSONException("支付接口出错，请查看插件日志");
            }
        }

        $pay-&gt;setPayUrl(trim($this-&gt;config['url'], "/") . "/submit.php");
        $pay-&gt;setRenderMode(\Kernel\Plugin\Const\Pay::RENDER_FORM_POST_SUBMIT);
        $pay-&gt;setOption($param);
        return $pay;
    }


    /**
     * @throws JSONException
     */
    public function async(): Response
    {
        $data = (array)(empty($this-&gt;request-&gt;post()) ? $this-&gt;request-&gt;get() : $this-&gt;request-&gt;post());

        if (!isset($data['sign']) || !$this-&gt;verification($data, (string)$this-&gt;config['key'])) {
            throw new JSONException("签名错误");
        }

        if ($this-&gt;code != $data['type']) {
            throw new JSONException("支付类型错误");
        }

        if ($this-&gt;order-&gt;trade_no != $data['out_trade_no']) {
            throw new JSONException("订单号错误");
        }

        if ($this-&gt;amount != $data['money']) {
            throw new JSONException("金额不正确");
        }

        if ($data['trade_status'] != "TRADE_SUCCESS") {
            throw new JSONException("订单未支付");
        }

        $this-&gt;successful();
        return $this-&gt;response-&gt;raw("success");
    }


    /**
     * @param array $data
     * @param string $key
     * @return bool
     */
    private function verification(array $data, string $key): bool
    {
        $sign = $data['sign'];
        unset($data['sign']);
        unset($data['sign_type']);
        $generateSignature = self::generateSignature($data, $key);
        if ($sign != $generateSignature) {
            return false;
        }
        return true;
    }

    /**
     * @param array $data
     * @param string $key
     * @return string
     */
    private static function generateSignature(array $data, string $key): string
    {
        ksort($data);
        $sign = '';
        foreach ($data as $k =&gt; $v) {
            $sign .= $k . '=' . $v . '&amp;';
        }
        $sign = trim($sign, '&amp;');

        return md5($sign . $key);
    }
}</code></pre><p>其中<code>create</code>是创建订单的时候会调用此方法，<code>async</code>是异步通知会调用的，上面代码你可以在你的插件根目录创建一个名为<code>Handle</code>
的文件夹，然后将上方代码保存到此文件夹下的<code>Pay.php</code>，并且在<code>Config/Handle.php</code>中声明该能力的实现。</p><h2 id="货源插件发货能力"><a href="#/zh-cn/developer/plugin/started?id=%e8%b4%a7%e6%ba%90%e6%8f%92%e4%bb%b6%e5%8f%91%e8%b4%a7%e8%83%bd%e5%8a%9b" data-id="货源插件发货能力" class="anchor"><span>货源插件(发货能力)</span></a></h2><p>开发货源插件，我们需要继承<code>\Kernel\Plugin\Abstract\Ship</code>货源发货能力类，然后实现货源发货相关的抽象方法，下面是一个完整的货源插件（对接异次元V3.0）实现：</p><pre v-pre="" data-lang="php"><code class="lang-php">&lt;?php
declare (strict_types=1);

namespace App\Plugin\MCYShopV3\Handle;

use App\Plugin\MCYShopV3\Util\Http;
use Kernel\Exception\HandleException;

class Ship extends \Kernel\Plugin\Abstract\Ship
{

    /**
     * @return string
     * @throws HandleException
     * @throws \Throwable
     */
    public function delivery(): string
    {
        $post = [
            "shared_code" =&gt; $this-&gt;options["code"],
            "num" =&gt; $this-&gt;order-&gt;quantity,
            "race" =&gt; $this-&gt;options["race"] ?? "",
            "request_no" =&gt; substr($this-&gt;order-&gt;trade_no, -19)
        ];
        $widgets = (array)json_decode((string)$this-&gt;order-&gt;widget, true) ?: [];

        foreach ($widgets as $key =&gt; $widget) {
            $post[$key] = $widget['value'];
        }

        $trade = Http::inst()-&gt;post($this-&gt;plugin, trim($this-&gt;config['url'], "/") . "/shared/commodity/trade", $this-&gt;config['pid'], $this-&gt;config['key'], $post);

        $this-&gt;order-&gt;status = 1;
        $this-&gt;order-&gt;save();
        return (string)$trade['secret'];
    }

    /**
     * @return int|string
     */
    public function stock(): int|string
    {
        try {
            $post = Http::inst()-&gt;post($this-&gt;plugin, trim($this-&gt;config['url'], "/") . "/shared/commodity/inventory", $this-&gt;config['pid'], $this-&gt;config['key'], [
                "sharedCode" =&gt; $this-&gt;options["code"],
                "race" =&gt; $this-&gt;options["race"] ?? ""
            ]);
            if (isset($post['delivery_way']) &amp;&amp; $post['delivery_way'] == 1) {
                return "在线发货";
            }
            return $post['count'] ?? 0;
        } catch (\Throwable $e) {
            $this-&gt;plugin-&gt;log("[{$this-&gt;item-&gt;name}({$this-&gt;sku-&gt;name})]" . $e-&gt;getMessage());
            return 0;
        }
    }

    /**
     * @param int $quantity
     * @return bool
     */
    public function hasEnoughStock(int $quantity = 1): bool
    {
        try {
            $a = Http::inst()-&gt;post($this-&gt;plugin, trim($this-&gt;config['url'], "/") . "/shared/commodity/inventoryState", $this-&gt;config['pid'], $this-&gt;config['key'], [
                "shared_code" =&gt; $this-&gt;options["code"],
                "race" =&gt; $this-&gt;options["race"] ?? "",
                "num" =&gt; $quantity
            ]);
            return true;
        } catch (\Throwable $e) {
            $this-&gt;plugin-&gt;log("[{$this-&gt;item-&gt;name}({$this-&gt;sku-&gt;name})]" . $e-&gt;getMessage());
            return false;
        }
    }
}</code></pre><p>上面代码你可以在你的插件根目录创建一个名为<code>Handle</code>的文件夹，然后将上方代码保存到此文件夹下的<code>Ship.php</code>
，并且在<code>Config/Handle.php</code>中声明该能力的实现。</p><h2 id="货源插件外接货源能力"><a href="#/zh-cn/developer/plugin/started?id=%e8%b4%a7%e6%ba%90%e6%8f%92%e4%bb%b6%e5%a4%96%e6%8e%a5%e8%b4%a7%e6%ba%90%e8%83%bd%e5%8a%9b" data-id="货源插件外接货源能力" class="anchor"><span>货源插件(外接货源能力)</span></a></h2><p>在开发货源插件时，我们有的货源插件是对接其他系统发货的，我们可能要将其系统中的商品拉取到我们程序中，那么你的插件只需要继承<code>\Kernel\Plugin\Abstract\ForeignShip</code>货源外接能力类，然后实现拉拉取数据的方法，下面是一个完整实现例子（拉取异次元V3.0）：</p><pre v-pre="" data-lang="php"><code class="lang-php">&lt;?php
declare (strict_types=1);

namespace App\Plugin\MCYShopV3\Handle;

use App\Plugin\MCYShopV3\Util\Http;
use App\Plugin\MCYShopV3\Util\Ini;
use Kernel\Exception\HandleException;
use Kernel\Plugin\Entity\Item;
use Kernel\Plugin\Entity\Sku;
use Kernel\Plugin\Entity\Widget;

class ForeignShip extends \Kernel\Plugin\Abstract\ForeignShip
{

    /**
     * @return Item[]
     * @throws HandleException
     */
    public function getItems(): array
    {
        $url = trim((string)$this-&gt;config['url'], "/");

        $list = Http::inst()-&gt;post($this-&gt;plugin, $url . "/shared/commodity/items", $this-&gt;config['pid'], $this-&gt;config['key']);

        if (count($list) == 0) {
            throw new HandleException("对方没有任何商品可以对接，请联系对方站长");
        }

        $items = [];

        foreach ($list as $category) {
            foreach ($category['children'] as $child) {
                $pictureUrl = $url . $child['cover'];
                $options = ["code" =&gt; $child['code']];
                $skus = [];
                //判断是否有config

                $config = Ini::toArray((string)$child['config']);
                if (count($config) &gt; 0 &amp;&amp; isset($config['category'])) {
                    foreach ($config['category'] as $name =&gt; $price) {
                        $options['race'] = $name;
                        $sku = new Sku($name, $pictureUrl, $price);
                        $sku-&gt;setCost($config['category_factory'][$name] ?? 0);
                        $sku-&gt;setOptions($options);

                        $child['minimum'] &gt; 0 &amp;&amp; $sku-&gt;setMarketControlMinNum((int)$child['minimum']);
                        $child['maximum'] &gt; 0 &amp;&amp; $sku-&gt;setMarketControlMaxNum((int)$child['maximum']);
                        $child['purchase_count'] &gt; 0 &amp;&amp; $sku-&gt;setMarketControlOnlyNum((int)$child['purchase_count']);

                        $skus[] = $sku;
                    }
                } else {
                    $sku = new Sku($child['name'], $pictureUrl, $child['price']);
                    $sku-&gt;setCost($child['factory_price']);
                    $sku-&gt;setOptions($options);

                    $child['minimum'] &gt; 0 &amp;&amp; $sku-&gt;setMarketControlMinNum((int)$child['minimum']);
                    $child['maximum'] &gt; 0 &amp;&amp; $sku-&gt;setMarketControlMaxNum((int)$child['maximum']);
                    $child['purchase_count'] &gt; 0 &amp;&amp; $sku-&gt;setMarketControlOnlyNum((int)$child['purchase_count']);

                    $skus[] = $sku;
                }

                $introduce = preg_replace_callback('/<span class="token tag"><span class="token tag"><span class="token punctuation">&lt;</span>img[^</span><span class="token punctuation">&gt;</span></span>]+src=["\']?([^"\'&gt;]+)["\']?[^&gt;]*&gt;/i', function ($matches) use ($url) {
                    print_r($matches);
                    $originalSrc = $matches[1];
                    if (preg_match('/^(http:\/\/|https:\/\/)/i', $originalSrc)) {
                        return $matches[0];
                    }
                    $newSrc = $url . "/" . ltrim($originalSrc, '/');
                    return str_replace($originalSrc, $newSrc, $matches[0]);
                }, (string)$child['description']);

                $item = new Item($category['name'], $child['name'], $introduce, $pictureUrl, $skus);

                $widgets = (array)json_decode(trim((string)$child['widget']), true);

                if (count($widgets) &gt; 0) {
                    $wts = [];
                    foreach ($widgets as $widget) {
                        $wget = new Widget($widget['type'], $widget['cn'], $widget['name'], $widget['placeholder']);
                        if ($widget['regex'] &amp;&amp; $widget['error']) {
                            $wget-&gt;setError($widget['error']);
                            $wget-&gt;setRegex($widget['regex']);
                        }

                        if ($widget['dict']) {
                            $wget-&gt;setData(str_replace(",", "\n", trim(trim($widget['dict']), ",")));
                        }

                        $wts[] = $wget;
                    }

                    $item-&gt;setWidgets($wts);
                }

                $items[] = $item;
            }
        }

        return $items;
    }
}</code></pre><p>在上面代码中，我们返回值只需要是元素类型为<code>Kernel\Plugin\Entity\Item</code>的数组，就会被我们系统自动接管你的拉取数据，并实现全自动接入功能，上面代码你可以在你的插件根目录创建一个名为<code>Handle</code>的文件夹，然后将上方代码保存到此文件夹下的<code>ForeignShip.php</code>
，并且在<code>Config/Handle.php</code>中声明该能力的实现。</p><h2 id="创建数据库"><a href="#/zh-cn/developer/plugin/started?id=%e5%88%9b%e5%bb%ba%e6%95%b0%e6%8d%ae%e5%ba%93" data-id="创建数据库" class="anchor"><span>创建数据库</span></a></h2><p>如果需要创建数据库，我们需要继承<code>\Kernel\Plugin\Abstract\Database</code>数据库类，然后实现相关的抽象方法，下面是一个完整的例子：</p><pre v-pre="" data-lang="php"><code class="lang-php">&lt;?php
declare (strict_types=1);

namespace App\Plugin\Trc20Usdt\Handle;

use Hyperf\Database\Schema\Blueprint;

class Database extends \Kernel\Plugin\Abstract\Database
{
 
    //当插件从应用商店被安装到本地的时候，会执行该方法
    public function install(): void
    {
        //创建表
        if (!$this-&gt;hasTable("trc20_usdt")) {
            $this-&gt;create("trc20_usdt", function (Blueprint $table) {
                $table-&gt;id();
                $table-&gt;char("trade_no", 64)-&gt;nullable(false)-&gt;unique("trade_no")-&gt;comment("订单号");
                $table-&gt;decimal("amount", 10, 2)-&gt;unsigned()-&gt;nullable(false)-&gt;comment("订单金额");
                $table-&gt;decimal("pay_amount", 10, 3)-&gt;unsigned()-&gt;nullable(false)-&gt;index("pay_amount")-&gt;comment("支付金額");
                $table-&gt;string("return_url")-&gt;nullable(true)-&gt;default(null)-&gt;comment("跳轉地址");
                $table-&gt;tinyInteger("status", false, true)-&gt;nullable(false)-&gt;default(0)-&gt;index("status")-&gt;comment("支付狀態: 1=成功, 0=未支付");
                $table-&gt;dateTime("create_time")-&gt;nullable(false)-&gt;index("create_time")-&gt;comment("創建時間");
                $table-&gt;dateTime("pay_time")-&gt;nullable(true)-&gt;default(null)-&gt;comment("支付時間");
                $table-&gt;string("hash", 128)-&gt;nullable(true)-&gt;default(null)-&gt;unique("hash")-&gt;comment("交易hash");
                $table-&gt;string("payee", 64)-&gt;nullable(false)-&gt;index("payee")-&gt;comment("收款人");
                $table-&gt;index(['pay_amount', 'status', 'create_time', 'hash', 'payee'], "listening_address_callback");
            });
        }

        //创建表
        if (!$this-&gt;hasTable("trc20_usdt_record")) {
            $this-&gt;create("trc20_usdt_record", function (Blueprint $table) {
                $table-&gt;id();
                $table-&gt;decimal("amount", 10, 3)-&gt;unsigned()-&gt;nullable(false)-&gt;comment("订单金额");
                $table-&gt;dateTime("create_time")-&gt;nullable(false)-&gt;index("create_time")-&gt;comment("創建時間");
                $table-&gt;string("hash", 128)-&gt;nullable(true)-&gt;default(null)-&gt;unique("hash")-&gt;comment("交易hash");
                $table-&gt;string("payee", 64)-&gt;nullable(false)-&gt;index("payee")-&gt;comment("收款人");
            });
        }
    }

    
    //当插件从本地卸载删除后，会执行此方法
    public function uninstall(): void
    {
        if ($this-&gt;hasTable("trc20_usdt")) {
            $this-&gt;drop("trc20_usdt");
        }

        if ($this-&gt;hasTable("trc20_usdt_record")) {
            $this-&gt;drop("trc20_usdt_record");
        }
    }
}</code></pre><p>上面代码你可以在你的插件根目录创建一个名为<code>Handle</code>的文件夹，然后将上方代码保存到此文件夹下的<code>Database.php</code>
，并且在<code>Config/Handle.php</code>中声明该能力的实现。</p><h2 id="websocket"><a href="#/zh-cn/developer/plugin/started?id=websocket" data-id="websocket" class="anchor"><span>WebSocket</span></a></h2><blockquote>
<p>注意，仅在<code>CLI架构</code>下，才支持<code>WebSocket</code>，我们的<code>WebSocket</code>非常好用，你的插件仅需要继承<code>\Kernel\Plugin\Abstract\WebSocket</code>
此类，实现其中的抽象方法，便可以完美的使用<code>WebSocket</code>能力。</p></blockquote>
<p>插件的WebSocket的地址一般为：<code>wss://网站地址/plugin/web-chat</code>，其中<code>web-chat</code>
就是插件的文件夹名称，一般文件夹名称应该为：<code>WebChat</code>，在转换成路由地址时，我们通常会将驼峰转换成"-"
分割的小写字母，<code>网站地址</code>就是当前访问网站的地址，我们在底层将HTTP协议和WebSocket兼容，所以无论是HTTP协议还是WebSocket协议，都是完美支持。</p><h5 id="下面是一个websocket实现类例子："><a href="#/zh-cn/developer/plugin/started?id=%e4%b8%8b%e9%9d%a2%e6%98%af%e4%b8%80%e4%b8%aawebsocket%e5%ae%9e%e7%8e%b0%e7%b1%bb%e4%be%8b%e5%ad%90%ef%bc%9a" data-id="下面是一个websocket实现类例子：" class="anchor"><span>下面是一个<code>WebSocket</code>实现类例子：</span></a></h5><pre v-pre="" data-lang="php"><code class="lang-php">&lt;?php
declare(strict_types=1);

namespace App\Plugin\Demo\Handle;

use Kernel\Context\Interface\Request;
use Swoole\WebSocket\Frame;

class WebSocket extends \Kernel\Plugin\Abstract\WebSocket
{

    //客户端发送消息会触发此方法
    public function message(Frame $frame): void
    {
        $this-&gt;push($frame-&gt;fd, "test");
    }


    //客户端第一次握手，连接成功后，会触发此方法，你可以在这里进行鉴权相关的操作
    public function open(Request $request, int $fd): void
    {
        //打印get参数
        var_dump($request-&gt;get());
    }

    //当客户端断开连接时，会触发该方法
    public function close(int $fd): void
    {
       
    }
}</code></pre><p>上面代码你可以在你的插件根目录创建一个名为<code>Handle</code>的文件夹，然后将上方代码保存到此文件夹下的<code>WebSocket.php</code>
，并且在<code>Config/Handle.php</code>中声明该能力的实现。</p><h5 id="在非websocket环境中，其他任意地方给用户发送消息"><a href="#/zh-cn/developer/plugin/started?id=%e5%9c%a8%e9%9d%9ewebsocket%e7%8e%af%e5%a2%83%e4%b8%ad%ef%bc%8c%e5%85%b6%e4%bb%96%e4%bb%bb%e6%84%8f%e5%9c%b0%e6%96%b9%e7%bb%99%e7%94%a8%e6%88%b7%e5%8f%91%e9%80%81%e6%b6%88%e6%81%af" data-id="在非websocket环境中，其他任意地方给用户发送消息" class="anchor"><span>在非<code>WebSocket</code>环境中，其他任意地方给用户发送消息</span></a></h5><pre v-pre="" data-lang="php"><code class="lang-php">//其中[1,2,3]代表客户端的标识，也就是客户连接时，触发`open`方法的`$fd`参数，每个客户端都是唯一的，你可以将此标识保存起来，方便在任意地方给某个或多个客户发送消息
\Kernel\Plugin\WebSocket::inst()-&gt;sendMessage([1,2,3], "test");</code></pre><h2 id="process"><a href="#/zh-cn/developer/plugin/started?id=process" data-id="process" class="anchor"><span>Process</span></a></h2><blockquote>
<p>随系统启停的常驻独立进程（被系统接管，如果你的进程出现异常，会自动维护你的进程并重启），仅在<code>CLI架构</code>下，才支持<code>Process</code>
，你的插件仅需要继承<code>\Kernel\Plugin\Abstract\Process</code></p></blockquote>
<h5 id="下面是一个process实现类例子："><a href="#/zh-cn/developer/plugin/started?id=%e4%b8%8b%e9%9d%a2%e6%98%af%e4%b8%80%e4%b8%aaprocess%e5%ae%9e%e7%8e%b0%e7%b1%bb%e4%be%8b%e5%ad%90%ef%bc%9a" data-id="下面是一个process实现类例子：" class="anchor"><span>下面是一个<code>Process</code>实现类例子：</span></a></h5><pre v-pre="" data-lang="php"><code class="lang-php">&lt;?php
declare (strict_types=1);

namespace App\Plugin\Watch\Process;

use Kernel\Annotation\Thread;
use Kernel\Plugin\Abstract\Process;
use Symfony\Component\Finder\Finder;

#[Thread(name: "watch")]
class Watch extends Process
{

    /**
     * @var array
     */
    protected array $watchTime = [];

    /**
     * @return void
     */
    public function handle(): void
    {
        $finder = Finder::create()
            -&gt;in([BASE_PATH . "app", BASE_PATH . "kernel", BASE_PATH . "config"])
            -&gt;depth("&lt; 10")
            -&gt;ignoreUnreadableDirs(true)
            -&gt;name(['*.php', '*.html'])
            -&gt;files();

        foreach ($finder as $item) {
            $this-&gt;watchTime[$item-&gt;getPathname()] = $item-&gt;getCTime();
        }

        while (true) {
            sleep(1);
            $this-&gt;monitor();
        }
    }

    /**
     * @return void
     */
    protected function monitor(): void
    {
        foreach ($this-&gt;watchTime as $pathname =&gt; $ct) {
            $this-&gt;watchTime[$pathname] = filectime($pathname);
            if ($ct != $this-&gt;watchTime[$pathname]) {
                $this-&gt;plugin-&gt;log("[{$pathname}]被修改.");
                $this-&gt;plugin-&gt;log("[RESTART]:正在进行重启..");
                \Kernel\Service\App::inst()-&gt;restart();
            }
        }
    }
}</code></pre><p>上面代码你可以在你的插件根目录创建一个名为<code>Process</code>的文件夹，然后将上方代码保存到此文件夹下的<code>Watch.php</code>，<code>Process</code>
无需声明能力，因为你的插件或有多个<code>Process</code>的实现，插件启动时，会自行扫描你的所有<code>Process</code>
文件夹中的进程，不过值得注意的是，只有实现类加上<code>Thread()</code>注解，才会真正被扫描。</p><h2 id="命令行"><a href="#/zh-cn/developer/plugin/started?id=%e5%91%bd%e4%bb%a4%e8%a1%8c" data-id="命令行" class="anchor"><span>命令行</span></a></h2><blockquote>
<p>插件支持注册命令到系统中，用户可以通过SSH执行命令来运行插件中的代码，你的插件仅需要继承<code>\Kernel\Plugin\Abstract\Command</code>
就可以获得该能力。</p></blockquote>
<h5 id="下面是一个command实现类例子："><a href="#/zh-cn/developer/plugin/started?id=%e4%b8%8b%e9%9d%a2%e6%98%af%e4%b8%80%e4%b8%aacommand%e5%ae%9e%e7%8e%b0%e7%b1%bb%e4%be%8b%e5%ad%90%ef%bc%9a" data-id="下面是一个command实现类例子：" class="anchor"><span>下面是一个<code>Command</code>实现类例子：</span></a></h5><pre v-pre="" data-lang="php"><code class="lang-php">&lt;?php
declare (strict_types=1);

namespace App\Plugin\TranslateRobot\Command;

use Kernel\Annotation\Inject;
use Kernel\Context\App;
use Kernel\Exception\RuntimeException;
use Kernel\Plugin\Abstract\Command;

class Translate extends Command
{
    /**
     * @return void
     * @throws RuntimeException
     */
    public function translate(string $param1 , string $param2): void
    {
        if (count($this-&gt;param) == 0) {
            throw new RuntimeException("请提供需要翻译的中文");
        }
        //可以通过 $this-&gt;param 来获取命令行传递进来的参数，也可以通过方法上填写参数（系统会自动将参数逐个注入）
    }
}</code></pre><p><code>Command</code>类实现后，需要在插件的<code>Config</code>目录下新建一个<code>Command.php</code>来进行注册命令行，下面是一个注册命令行的例子</p><pre v-pre="" data-lang="php"><code class="lang-php">&lt;?php
declare (strict_types=1);


return [
    "robot.translate" =&gt; [\App\Plugin\TranslateRobot\Command\Translate::class, "translate", "自动国际化", "提供1个或多个中文，使用空格隔开，复杂的可以使用双引号包裹，执行后将完成自动国际化"]
];</code></pre><p>上面这个注册例子，命令后面是一个数组，<code>下标0</code>是<code>Command</code>实现类，<code>下标1</code>是<code>Command</code>实现类中要执行的方法，<code>下标2</code>
是这个命令的名称，<code>下标3</code>是对这个命令提供使用教程，比如要传几个参数，参数的格式，尽量描述简单些</p><h2 id="composer-依赖"><a href="#/zh-cn/developer/plugin/started?id=composer-%e4%be%9d%e8%b5%96" data-id="composer-依赖" class="anchor"><span>Composer 依赖</span></a></h2><blockquote>
<p>你的插件如果依赖<code>Composer</code>某个软件包，可以在你的插件根目录下的<code>Config</code>目录中创建一个<code>Composer.php</code>文件来对你的依赖进行管理</p></blockquote>
<p>下面是一个<code>Composer.php</code>的例子：</p><pre v-pre="" data-lang="php"><code class="lang-php">&lt;?php
declare (strict_types=1);

//支持多个依赖，键包的名字，值为包的版本号，必须要指定具体版本号
return [
    "khanamiryan/qrcode-detector-decoder" =&gt; "2.0.2"
];</code></pre><p>将依赖包配置好，插件在启动的时候，会自动将依赖包下载到主程序<code>Composer</code>中，其过程无需关心。</p></article></section></main>
<script>
    function copyTextToClipboard(text, success = null, error = null) {
        if (navigator.clipboard) {
            navigator.clipboard.writeText(text).then(function () {
                typeof success === "function" && success();
            }).catch(function () {
                typeof error === "function" && error();
            });
        } else {
            var tempTextarea = document.createElement("textarea");
            tempTextarea.style.position = "absolute";
            tempTextarea.style.left = "-9999px";
            tempTextarea.value = text;
            document.body.appendChild(tempTextarea);
            tempTextarea.select();
            try {
                var successful = document.execCommand('copy');
                if (successful) {
                    typeof success === "function" && success();
                } else {
                    typeof error === "function" && error();
                }
            } catch (err) {
                typeof error === "function" && error();
            }
            document.body.removeChild(tempTextarea);
        }
    }

        window.download = function () {
        window.open(`/download.php`);
    };
    window.copyDownload = function () {
        copyTextToClipboard(window.location.origin + `/download.php`, function () {
            alert("复制成功");
        });
    };
        window.$docsify = {
        name: '萌次元商城系统',
        repo: 'lizhipay/mcy-shop',
        homepage: 'zh-cn/readme.md',
        loadSidebar: true,
        /* loadNavbar: true,*/
        fallbackLanguages: ['zh-cn'],
        mergeNavbar: true,
        themeColor: '#3F51B5',
        logo: 'favicon.ico?v=1',
        auto2top: true,
        subMaxLevel: 4,
        topMargin: 20,
        search: {
            depth: 6,
            noData: {
                '/zh-cn/': '没有找到结果!',
                '/': '没有找到结果!'
            },
            paths: 'auto',
            placeholder: {
                '/zh-cn/': '输入关键词搜索',
                '/': '输入关键词搜索'
            },
            pathNamespaces: ['/zh-cn']
        },
        alias: {
            '/.*/_sidebar.md': '/_sidebar.md'
        }
    }
</script>
<script src="docsify/lib/docsify.js"></script>
<script src="docsify/lib/plugins/search.min.js"></script>


<div class="progress" style="opacity: 0; width: 0%;"></div></body><div id="immersive-translate-popup" style="all: initial"></div></html>