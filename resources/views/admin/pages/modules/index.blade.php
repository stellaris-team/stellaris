@php use App\Group; use App\Module; @endphp
@extends ('admin.base')
@section ('admin.title', 'Modules')

@section ('admin.content')
    <h1 class="title is-4">Modules</h1>
    <h2 class="subtitle is-6">Add, edit, and remove modules to monitor</h2>

    @forelse (Group::orderBy('order', 'desc')->get() as $group)
        <div class="notification is-dark">
            <nav class="level">
                <div class="level-left">
                    <div class="level-item">{{ $group->name }}</div>
                </div>
                <div class="level-right">
                    <div class="level-item">
                        <a href="{{ url('admin/modules/add/' . $group->uuid) }}" class="button is-small is-primary">Add module</a>
                    </div>
                </div>
            </nav>
            @foreach (Module::where('group', $group->id)->orderBy('order', 'desc')->get() as $module)
                <div class="notification {{ $module->getStatusColor() }}">
                    <nav class="level">
                        <div class="level-left">
                            <div class="level-item">{{ $module->name }}</div>
                            <div class="level-item">
                                <a href="{{ url('admin/modules/edit/' . $module->uuid) }}" class="button is-small is-dark">
                                    <span class="icon">
                                        <i class="{{ faStyle() }} fa-cogs"></i>
                                    </span>
                                </a>
                            </div>
                            @if ($loop->count > 1)
                                @if (!$loop->first)
                                    <div class="level-item">
                                        <a href="#" class="button is-small is-dark">
                                            <span class="icon">
                                                <i class="{{ faStyle() }} fa-chevron-up"></i>
                                            </span>
                                        </a>
                                    </div>
                                @endif
        
                                @if (!$loop->last)
                                    <div class="level-item">
                                        <a href="#" class="button is-small is-dark">
                                            <span class="icon">
                                                <i class="{{ faStyle() }} fa-chevron-down"></i>
                                            </span>
                                        </a>
                                    </div>
                                @endif
                            @endif
                        </div>
                        <div class="level-right">
                            <div class="level-item">
                                <div class="level-item">{{ $module->getStatusInfo() }}</div>
                                <div class="level-item">
                                    <span class="icon"><i class="{{ faStyle() }} {{ $module->getStatusIcon() }} fa-lg"></i></span>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            @endforeach
        </div>
    @empty
        <p>There are no groups to add modules to! Please visit the <a href="{{ route('admin.groups') }}">groups</a> page to add a group!</p>
    @endforelse
    
@endsection