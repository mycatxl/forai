<head>
    <meta charset="utf-8" />
    @if (!empty($seo) && $seo['title'])
    <title>{{ isset($seo['title']) ? $seo['title'] : '' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Keywords" content="{{ isset($seo['keywords']) ? $seo['keywords'] : '' }}">
    <meta name="Description" content="{{ isset($seo['description']) ? $seo['description'] : '' }}">
    @else
    <title>{{ dujiaoka_config_get('title') }}</title>
    @endif

    @if(\request()->getScheme() == "https")
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    @endif
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="/assets/hyper/css/vendor/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css">
    <link href="/assets/hyper/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/hyper/css/app-creative.min.css" rel="stylesheet" type="text/css" id="light-style">
    <link href="/assets/hyper/css/hyper.css?v=045256" rel="stylesheet" type="text/css">
    <style>
        /* 设置背景图片 */
        body {
            background-image: url('/background.png');
            background-repeat: repeat;
            background-attachment: fixed;
            background-position: center center;
            background-size: auto;
            margin: 0; /* 移除 body 默认的边距 */
            padding: 0; /* 移除 body 默认的内边距 */
        }

        /* 让 header 背景透明，确保它在背景上方 */
        .header-navbar {
            background-color: transparent; /* 让 header 背景透明 */
            z-index: 10; /* 确保 header 在背景图上方 */
            margin: 0; /* 重置 margin，避免出现分割线 */
            padding: 0; /* 重置 padding，避免出现分割线 */
            border: none; /* 移除可能存在的边框 */
            box-shadow: none; /* 移除可能的阴影效果 */
        }
    </style>
</head>
