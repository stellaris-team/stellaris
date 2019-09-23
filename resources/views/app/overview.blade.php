@php use App\Group; use App\Module; @endphp
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

    @foreach (Group::orderBy('order', 'desc')->get() as $group)
        <section class="section">
            <div class="container">
                <div class="notification is-dark">
                    <nav class="level {{ $group->getStatusTextColor() }}">
                        <div class="level-left">
                            <div class="level-item">{{ $group->name }}</div>
                        </div>
                        <div class="level-right">
                            <div class="level-item">{{ $group->getStatusInfo() }}</div>
                            <div class="level-item">
                                <span class="icon"><i class="{{ faStyle() }} {{ $group->getStatusIcon() }} fa-2x"></i></span>
                            </div>
                        </div>
                    </nav>
                    @foreach (Module::where('group', $group->id)->orderBy('order', 'desc')->get() as $module)
                        <div class="notification {{ $module->getStatusColor() }}">
                            <nav class="level">
                                <div class="level-left">
                                    <div class="level-item">{{ $module->name }}</div>
                                </div>
                                <div class="level-right">
                                    <div class="level-item">{{ $module->getStatusInfo() }}</div>
                                    <div class="level-item">
                                        <span class="icon"><i class="{{ faStyle() }} {{ $module->getStatusIcon() }} fa-lg"></i></span>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endforeach

@endsection