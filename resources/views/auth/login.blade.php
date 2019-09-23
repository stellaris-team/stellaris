@extends ('base.app')
@section ('page.title', 'Login')

@section ('page.content')

    <section class="hero is-dark is-bold is-fullheight">
        <div class="hero-body">
            <div class="container">
                <div class="column is-half">
                    <h1 class="title is-2">Login to {{ config('app.name') }}</h1>
                    <h2 class="subtitle is-4">Authentication is required to view this page</h2>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="field">
                            <div class="control has-icons-left">
                                <input type="text" name="login" class="input" placeholder="Username or email address">
                                <span class="icon is-pulled-left"><i class="{{ faStyle() }} fa-id-badge"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control has-icons-left">
                                <input type="password" name="password" class="input" placeholder="Password">
                                <span class="icon is-pulled-left"><i class="{{ faStyle() }} fa-lock"></i></span>
                            </div>
                        </div>
                        <div class="field">
                            <div class="control">
                                <button class="button is-info" type="submit">Login</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection