@php use App\Group; @endphp
@extends ('admin.base')
@section ('admin.title', 'Groups')

@section ('admin.content')
    <h1 class="title is-4">Groups</h1>
    <h2 class="subtitle is-6">Add, rename, and delete item groups</h2>

    <div class="notification is-dark">
        <form action="{{ route('admin.groups.add') }}" method="POST">
            @csrf
            
            <div class="field">
                <label class="label">Add group</label>
                <p class="control">
                    <input type="text" name="group_name" class="input is-expanded" placeholder="Group name">
                </p>
            </div>

            @if (Group::all()->count() > 2)
                <div class="field">
                    <label class="label">Show after</label>
                    <p class="control">
                        <div class="select">
                            <select name="group_after">
                                @foreach (Group::all() as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </p>
                </div>
            @endif

            <div class="field">
                <button class="button is-primary" type="submit">Add</button>
            </div>
        </form>
    </div>

    @foreach (Group::all() as $group)
        <div class="notification {{ $group->getStatusColor() }}">
            <nav class="level">
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
        </div>
    @endforeach
@endsection