<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('page.title') | {{ config('app.name') }}</title>
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="https://kit.fontawesome.com/ec62ff0996.js"></script>
    </head>
    <body>
        @yield('page.content')

        <footer class="footer">
            <div class="container">
                <nav class="level">
                    <div class="level-left">
                        <div class="level-item">
                            <p>
                                <span class="icon"><i class="fad fa-meteor fa-2x"></i></span><br>
                                &copy; 2019 Stellaris; Stellaris created by <a href="https://dgtl.dev" target="_blank">Zack Devine</a> and all of its <a href="https://github.com/stellaris-team/stellaris" target="_blank">awesome contributors</a>.<br>
                                Stellaris is <a href="https://github.com/stellaris-team/stellaris" target="_blank">open-source software</a>! Check us out on GitHub and consider supporting us!
                            </p>
                        </div>
                    </div>
                    <div class="level-right">
                        <div class="level-item has-text-right">
                            <p>
                                Links<br>
                                <a href="#">JSON API</a><br>
                                <a href="{{ route('admin.overview') }}">Admin area</a>
                            </p>
                        </div>
                    </div>
                </nav>
            </div>
        </footer>
    </body>
</html>