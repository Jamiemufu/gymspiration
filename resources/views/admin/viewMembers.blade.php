<!-- admin dashboard -->
@extends('layouts.app')
@section('content')
<div class="dash-container">
    <div class="logo">
        <img src="{{ asset('images/sidebar_logo.png') }}" alt="Gymspiration Logo">
        <h1>Members</h1>
    </div>
    {{-- error messages --}}
    @if (session('status'))
        <div class="errors">
            {{ session('status') }}
        </div>
    @endif
    {{-- search bar --}}
    <div class="search">
        <form action="{{ route('search') }}" method="POST">
            @csrf
            <label for="search">Search Members
                <input type="text" name="search" required>
            </label>
            <button>Search</button>
        </form>
    </div>
    {{-- check if members is set and if emtpy display errors --}}
    @if (isset($members))
        @if($members->isEmpty())
            <div class="errors">
                No Results Found
            </div>
        @else
            {{-- desktop only view --}}
            <div class="members desktop">
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
                        {{-- check if membership isset --}}
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
                            {{-- form with delete spoof --}}
                            <form method="POST" action="{{ action('MemberController@destroy', $member->id) }}">
                                @method('DELETE')
                                @csrf
                                {{-- confirm alert --}}
                                <button onclick="return confirm('Are you sure you want to delete this user?');">
                                <i class="fas fa-minus-circle"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            {{-- mobile only view --}}
            <div class="members mobile">
                 @foreach ($members as $member)
                    <table>
                        <tr><td><span>Name:</span> {{ $member->firstName }} {{ $member->lastName }}</td></tr>
                        <tr><td><span>Email:</span> {{ $member->email }} </td></tr>
                        <tr>
                            <td>
                                <span>Membership:</span>
                                @if (isset($member->membership->type))
                                    {{ $member->membership->type }}
                                @else
                                    No membership
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="edit">
                                <a href="{{ route('editMember', ['id' => $member->id]) }}">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td class="delete">
                                {{-- form with delete spoof --}}
                                <form method="POST" action="{{ action('MemberController@destroy', $member->id) }}">
                                    @method('DELETE')
                                    @csrf
                                    <button onclick="return confirm('Are you sure you want to delete this user?');">
                                        <i class="fas fa-minus-circle"></i> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    </table>
                    <hr>
                 @endforeach
            </div>
        </div>
        @endif
    @endif
</div>
@endsection