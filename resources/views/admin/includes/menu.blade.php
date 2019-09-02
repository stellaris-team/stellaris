<aside class="menu">
    <p class="menu-label">Administration</p>
    <ul class="menu-list">
        <li><a href="{{ route('admin.overview') }}" class="{{ Route::is('admin.overview') ? 'is-active' : '' }}">
            <span class="icon"><i class="fad fa-stream"></i></span>
            <span>Overview</span>
        </a></li>
    </ul>
    <p class="menu-label">Configuration</p>
    <ul class="menu-list">
        <li><a href="{{ route('admin.app_settings') }}" class="{{ Route::is('admin.app_settings') ? 'is-active' : '' }}">
            <span class="icon"><i class="fad fa-cogs"></i></span>
            <span>Application settings</span>
        </a></li>
        <li><a href="{{ route('admin.groups') }}" class="{{ Route::is('admin.groups') ? 'is-active' : '' }}">
            <span class="icon"><i class="fad fa-layer-group"></i></span>
            <span>Groups</span>
        </a></li>
        <li><a href="{{ route('admin.items') }}" class="{{ Route::is('admin.items') ? 'is-active' : '' }}">
            <span class="icon"><i class="fad fa-ellipsis-h"></i></span>
            <span>Items</span>
        </a></li>
    </ul>
    <p class="menu-label">Authentication</p>
    <ul class="menu-list">
        <li><a href="{{ route('admin.users') }}" class="{{ Route::is('admin.users') ? 'is-active' : '' }}">
            <span class="icon"><i class="fad fa-users"></i></span>
            <span>Users</span>
        </a></li>
    </ul>
</aside>