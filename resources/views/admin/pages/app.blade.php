@php use App\User; @endphp
@extends ('admin.base')
@section ('admin.title', 'Application settings')

@section ('admin.content')
    <h1 class="title is-4">Application settings</h1>
    <h2 class="subtitle is-6">Configure the name of the application, icon settings, and more</h2>

    <form action="{{ route('admin.app.update') }}" method="POST">
        @csrf
        <div class="field">
            <label class="label">Application name</label>
            <div class="control">
                <input type="text" name="app_name" class="input" placeholder="Default: Stellaris" value="{{ config('app.name') }}">
                <p class="help">This shows at the top of the status page, as well as in the website title and navigation (admin area only).</p>
            </div>
        </div>

        <div class="field">
            <label class="label">Application URL</label>
            <div class="control">
                <input type="text" name="app_base_url" class="input" placeholder="stellaris.example.com" value="{{ config('app.base_url') }}">
                <p class="help">The base URL for this instance of Stellaris. Do not include http(s)://</p>
            </div>
        </div>

        <div class="field">
            <label class="label">FontAwesome Pro</label>
            <div class="control">
                <div class="b-checkbox is-primary">
                    <input type="checkbox" id="fa_pro_checkbox" name="fa_pro" class="styled" {{ config('app.fa.pro') ? "checked" : "" }} value="enabled">
                    <label for="fa_pro_checkbox">Enable FontAwesome Pro (requires Pro-enabled Kit)</label>
                </div>
            </div>
        </div>

        <div class="field">
            <label class="label">FontAwesome Kit ID</label>
            <div class="control">
                <input type="text" name="fa_kit_id" class="input" placeholder="Default: d3e0e1cdd7" value="{{ config('app.fa.kit_id') }}">
            </div>
            <p class="help">If you have a FontAwesome Pro subscription, then you can use Duotone icons instead of the default solid ones. Specify your FontAwesome Kit ID (the randomly generated filename in the script URL) to use. Default ID is <kbd>d3e0e1cdd7</kbd> to use the free (solid) icons.</p>
        </div>

        <div class="field">
            <button class="button is-primary" type="submit">Save changes</button>
        </div>
    </form>
@endsection