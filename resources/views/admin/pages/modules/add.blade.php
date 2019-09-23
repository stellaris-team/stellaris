@php use App\Group; @endphp
@extends ('admin.base')
@section ('admin.title', 'Add module')

@section ('admin.content')
    <h1 class="title is-4">Add module</h1>
    <h2 class="subtitle is-6">Adding new module to {{ $group->name }}</h2>

    <form action="{{ route('admin.modules.add') }}" method="POST">
        @csrf
        <input type="hidden" name="group_uuid" value="{{ $group->uuid }}">
        <div class="field">
            <div class="control">
                <input type="text" name="name" class="input" placeholder="Module name">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <div class="b-checkbox is-primary">
                    <input id="ping-checkbox" class="styled" type="checkbox">
                    <label for="ping-checkbox">Ping URL for updates?</label>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input type="text" name="ping_url" class="input" placeholder="URL to ping for updates">
            </div>
        </div>
        <div class="field">
            <button type="submit" class="button is-primary">Add module</button>
        </div>
    </form>
@endsection