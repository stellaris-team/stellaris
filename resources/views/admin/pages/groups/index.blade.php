@php use App\Group; @endphp
@extends ('admin.base')
@section ('admin.title', 'Groups')

@section ('admin.content')
    <h1 class="title is-4">Groups</h1>
    <h2 class="subtitle is-6">Add, rename, and delete item groups</h2>

    <div class="notification is-dark">
        <div class="columns">
            <div class="column is-one-quarter">
                <h2 class="subtitle is-6">Add new group</h2>
            </div>
            <div class="column">
                <form action="{{ route('admin.groups.add') }}" method="POST">
                    @csrf
                    <div class="field has-addons">
                        <div class="control is-expanded">
                            <input type="text" name="group_name" class="input is-expanded" placeholder="Group name">
                        </div>
                        <div class="control">
                            <button class="button is-primary" type="submit">Add</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @foreach (Group::orderBy('order', 'desc')->get() as $group)
        <div class="notification {{ $group->getStatusColor() }}">
            <nav class="level">
                <div class="level-left">
                    <div class="level-item">{{ $group->name }}</div>
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
                    <div class="level-item">{{ $group->getStatusInfo() }}</div>
                    <div class="level-item">
                        <span class="icon"><i class="{{ faStyle() }} {{ $group->getStatusIcon() }} fa-2x"></i></span>
                    </div>
                </div>
            </nav>
        </div>
    @endforeach
@endsection