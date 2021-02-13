<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    {{-- Bootstrapの導入は以下でもOK --}}
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"> --}}
    <title>
        @yield('title')
    </title>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand navbar-dark bg-success text-white mb-5">
            <a class="navbar-brand" href="{{ route('index')}}">やんばるQiita</a>
            @guest
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">ログイン</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
                    </li>
                </ul>
            @endguest

            @auth
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">投稿する</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">マイページ</a>
                    </li>
                </ul>
            @endauth
        </nav>

        @yield('content')

        <footer class="fixed-bottom bg-success text-white">
            <div class="footer-copyright text-center py-3">
                © 2020 やんばるエキスパート
            </div>
        </footer>
    </div>
</body>
</html>