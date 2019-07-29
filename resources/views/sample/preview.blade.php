<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{csrf_token()}}">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="{{ asset('css/print.css') }}" rel="stylesheet">
        
        <!-- Styles -->

        <style>
        @font-face {
            font-family: acgyosyo;
            src: url('/fonts/acgyosyo.ttf');
        }
        @font-face {
            font-family: ackaisyo;
            src: url('/fonts/ackaisyo.ttf');
        }
        body {
            font-family: acgyosyo, 白舟行書教漢;
        }
        section {
            -ms-writing-mode: tb-rl;
            writing-mode: vertical-rl;
            background-image: url('/images/background/1.jpg') !important;
            background-position:top bottom !important;
            background-repeat: no-repeat !important;
            background-size:cover !important;
        }
        h1 {
            text-align: center;
            font-size: 1.8rem;
        }
        h2 {
            font-size: 1.1rem;
        }
        p {
            font-size: 1.1rem;
        }
        </style>
    </head>
    <body class="A4 landscape">
        <section class="sheet">
            <div class="flex w-full">
                <div class="flex-1 mx-auto pt-5 pb-3">
                    <h1 class="ml-10">お品書き</h1>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">先付け</h2>
                        <div class="flex-auto">
                            <p>胡麻豆腐</p>
                            <p>練曇丹</p>
                        </div>
                    </div>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">前菜</h2>
                        <div class="flex-auto">
                            <p>五種盛り合わせ</p>
                        </div>
                    </div>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">お椀</h2>
                        <div class="flex-auto">
                            <p>茶碗蒸し</p>
                        </div>
                    </div>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">お造り</h2>
                        <div class="flex-auto">
                            <p>鯛、鮪、間八、サーモン</p>
                        </div>
                    </div>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">焼物</h2>
                        <div class="flex-auto">
                            <p>伊勢海老の丸焼き</p>
                        </div>
                    </div>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">食事</h2>
                        <div class="flex-auto">
                            <p>鮎雑炊、浅漬、梅肉</p>
                        </div>
                    </div>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">デザート</h2>
                        <div class="flex-auto">
                            <p>バニラアイスクリーム</p>
                        </div>
                    </div>
                    <div class="mr-20">
                        <p class="mt-20 flex-auto">
                            令和元年八月一日
                        </p>
                    </div>
                    <div class="mr-12">
                        <p class="mt-24 flex-auto">
                            熱海ふふ　夢音
                        </p>
                        <p class="mt-32 flex-auto">
                            調理長　　○○ ○○
                        </p>
                    </div>
                </div>
                <div class="flex-1 mx-auto pt-5 pb-3">
                    <h1 class="ml-10">お品書き</h1>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">先付け</h2>
                        <div class="flex-auto">
                            <p>胡麻豆腐</p>
                            <p>練曇丹</p>
                        </div>
                    </div>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">前菜</h2>
                        <div class="flex-auto">
                            <p>五種盛り合わせ</p>
                        </div>
                    </div>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">お椀</h2>
                        <div class="flex-auto">
                            <p>茶碗蒸し</p>
                        </div>
                    </div>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">お造り</h2>
                        <div class="flex-auto">
                            <p>鯛、鮪、間八、サーモン</p>
                        </div>
                    </div>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">焼物</h2>
                        <div class="flex-auto">
                            <p>伊勢海老の丸焼き</p>
                        </div>
                    </div>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">食事</h2>
                        <div class="flex-auto">
                            <p>鮎雑炊、浅漬、梅肉</p>
                        </div>
                    </div>
                    <div class="flex mx-5">
                        <h2 class="whitespace-no-wrap h-20">デザート</h2>
                        <div class="flex-auto">
                            <p>バニラアイスクリーム</p>
                        </div>
                    </div>
                    <div class="mr-20">
                        <p class="mt-20 flex-auto">
                            令和元年八月一日
                        </p>
                    </div>
                    <div class="mr-12">
                        <p class="mt-24 flex-auto">
                            熱海ふふ　夢音
                        </p>
                        <p class="mt-32 flex-auto">
                            調理長　　○○ ○○
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </body>
</html>
