<!-- admin dashboard -->

@extends('layouts.app')

@section('content')

    <h1>ADMIN SECTION</h1>

    <h1>ADMIN AREA</h1>
    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Logout
        </a>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>

@endsection