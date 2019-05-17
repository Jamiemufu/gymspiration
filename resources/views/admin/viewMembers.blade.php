<!-- admin dashboard -->
@extends('layouts.app')
@section('content')
<div class="dash-container">
    <div class="logo">
        <img src="{{ asset('images/sidebar_logo.png') }}" alt="Gymspiration Logo">
        <h1>Members</h1>
    </div>
    @if (session('status'))
        <div class="errors">
            {{ session('status') }}
        </div>
        @endif
    <div class="search">
        <form action="{{ route('search') }}" method="POST">
            @csrf
            <label for="search">Search Members
                <input type="text" name="search" required>
            </label>
            <button>Search</button>
        </form>
    </div>
    
    @if (isset($members))
        @if($members->isEmpty())
            <div class="errors">
                No Results Found
            </div>
        @else
            <div class="members">
                <table>
                    <tr>
                        <th>Name:</th>
                        <th>Email:</th>
                        <th>Membership:</th>
                        <th></th>
                        <th></th>
                    </tr>
                    @foreach ($members as $member)
                    <tr>
                        <td class="name">
                            {{ $member->firstName }} {{ $member->lastName }}
                        </td>
                        <td>
                            {{ $member->email }}
                        </td>
                        <td class="membership">
                            @if(isset($member->membership->type))
                                {{ $member->membership->type }}
                            @else
                                No membership
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('editMember', ['id' => $member->id]) }}">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{ action('MemberController@destroy', $member->id) }}">
                                @method('DELETE')
                                @csrf
                                <button onclick="return confirm('Are you sure you want to delete this user?');">
                                <i class="fas fa-minus-circle"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
        @endif
    @endif
</div>
@endsection