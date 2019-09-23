@php use App\Group; @endphp
@extends ('admin.base')
@section ('admin.title', 'Edit module')

@section ('admin.content')
    <h1 class="title is-4">Edit module</h1>
    <h2 class="subtitle is-6">Editing module {{ $module->name }}</h2>

    <form action="{{ route('admin.modules.edit') }}" method="POST">
        @csrf
        <input type="hidden" name="module_uuid" value="{{ $module->uuid }}">
        <div class="field">
            <div class="control">
                <input type="text" name="name" class="input" placeholder="Module name" value="{{ $module->name }}">
            </div>
        </div>
        <div class="field">
            <div class="control">
                <div class="b-checkbox is-primary">
                    <input id="ping-checkbox" class="styled" type="checkbox" {{ $module->ping ? 'checked' : '' }}>
                    <label for="ping-checkbox">Ping URL for updates?</label>
                </div>
            </div>
        </div>
        <div class="field">
            <div class="control">
                <input type="text" name="ping_url" class="input" placeholder="URL to ping for updates" value="{{ $module->ping_url }}">
            </div>
        </div>
        <div class="field">
            <button type="submit" class="button is-primary">Save module changes</button>
        </div>
    </form>
@endsection