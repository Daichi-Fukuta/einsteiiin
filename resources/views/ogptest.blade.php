<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta property="og:site_name" content="Mint"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="Mint"/>
    <meta property="og:description" content="自分の印象をフォロワーに簡単に聞けるサービス"/>
    <meta property="og:url" content="https://mint.jp.net"/>
    <meta property="og:image" content="https://res.cloudinary.com/dajbcpqeh/image/upload/l_text:Sawarabi%20Gothic_50_bold:これはOGPテキストです！,co_rgb:333,w_500,c_fit/c_scale,h_420/v1623414920/ogp_ibkw4a.png"/>
    <meta property="og:locale" content="ja_JP"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta name="twitter:title" content="Mint"/>
    <meta name="twitter:description" content="自分の印象をフォロワーに簡単に聞けるサービス"/>
    <meta name="twitter:image" content="https://res.cloudinary.com/dajbcpqeh/image/upload/l_text:Sawarabi%20Gothic_50_bold:これはOGPテキストです！,co_rgb:333,w_500,c_fit/c_scale,h_420/v1623414920/ogp_ibkw4a.png"/>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" integrity="sha384-ujbKXb9V3HdK7jcWL6kHL1c+2Lj4MR4Gkjl7UtwpSHg/ClpViddK9TI7yU53frPN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    @hasSection('title')
        <title>@yield('title') | {{ config('app.name') }}</title>
    @else
        <title>{{ config('app.name') }}</title>
    @endif
    <meta name="description" content="自分の印象をフォロワーに簡単に聞けるサービス">
</head>
<body>
    <h1>ogptest</h1>
</body>
</html>