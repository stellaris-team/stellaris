@php use App\Group; @endphp
@extends ('admin.base')
@section ('admin.title', 'Items')

@section ('admin.content')
    <h1 class="title is-4">Items</h1>
    <h2 class="subtitle is-6">Add, edit, and remove items to monitor</h2>

    @forelse (Group::all() as $group)
        <div class="notification is-dark">
            <nav class="level">
                <div class="level-left">
                    <div class="level-item">{{ $group->name }}</div>
                </div>
                <div class="level-right">
                    <div class="level-item">
                        <a href="{{ route('admin.items.add') }}" class="button is-small is-primary">Add item</a>
                    </div>
                </div>
            </nav>
        </div>
    @empty
        <p>There are no groups to add items to! Please visit the <a href="{{ route('admin.groups') }}">groups</a> page to add a group!</p>
    @endforelse
    
@endsection