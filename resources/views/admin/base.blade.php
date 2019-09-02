@extends ('base.app')
@section ('page.title')
@yield('admin.title') | Admin Area
@endsection

@section ('page.content')

    <section class="hero is-dark is-bold">
        <div class="hero-head">
            @include ('admin.includes.nav')
        </div>
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-2">Administration Area</h1>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-2">
                    @include ('admin.includes.menu')
                </div>
                <div class="column is-offset-1">
                    <div class="content">
                        @yield ('admin.content')
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection