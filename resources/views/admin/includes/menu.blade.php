<aside class="menu">
    <p class="menu-label">Administration</p>
    <ul class="menu-list">
        <li><a href="{{ route('admin.overview') }}" class="{{ Route::is('admin.overview') ? 'is-active' : '' }}">
            <span class="icon"><i class="{{ faStyle() }} fa-desktop"></i></span>
            <span>Overview</span>
        </a></li>
    </ul>
    <p class="menu-label">Configuration</p>
    <ul class="menu-list">
        <li><a href="{{ route('admin.app') }}" class="{{ Route::is('admin.app') ? 'is-active' : '' }}">
            <span class="icon"><i class="{{ faStyle() }} fa-cogs"></i></span>
            <span>Application settings</span>
        </a></li>
        <li><a href="{{ route('admin.groups') }}" class="{{ Route::is('admin.groups') ? 'is-active' : '' }}">
            <span class="icon"><i class="{{ faStyle() }} fa-layer-group"></i></span>
            <span>Groups</span>
        </a></li>
        <li><a href="{{ route('admin.modules') }}" class="{{ Route::is('admin.modules') ? 'is-active' : '' }}">
            <span class="icon"><i class="{{ faStyle() }} fa-stream"></i></span>
            <span>Modules</span>
        </a></li>
    </ul>
    <p class="menu-label">Authentication</p>
    <ul class="menu-list">
        <li><a href="{{ route('admin.users') }}" class="{{ Route::is('admin.users') ? 'is-active' : '' }}">
            <span class="icon"><i class="{{ faStyle() }} fa-users"></i></span>
            <span>Users</span>
        </a></li>
    </ul>
</aside>