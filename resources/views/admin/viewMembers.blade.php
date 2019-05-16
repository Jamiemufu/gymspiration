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
                    {{$member->firstName}} {{$member->lastName}}
                </td>
                <td>
                    {{$member->email}}
                </td>
                <td class="membership">
                    {{$member->membership->type}}
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
</div>


@endsection
