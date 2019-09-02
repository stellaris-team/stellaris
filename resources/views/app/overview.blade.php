@extends ('base.app')
@section ('page.title', 'Overview')

@section ('page.content')

    <section class="hero is-dark is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title is-2">{{ config('app.name') }}</h1>
                <h2 class="subtitle is-4">Status Overview</h2>
            </div>
        </div>
        <div class="hero-foot">
            <div class="notification is-success">
                <div class="container">
                    <p>All systems operational!</p>
                </div>
            </div>
        </div>
    </section>

@endsection