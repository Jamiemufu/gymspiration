<!-- admin dashboard -->

@extends('layouts.app')

@section('content')

<div class="dash-container">

    <div class="logo">
        <img src="{{ asset('images/sidebar_logo.png') }}" alt="Gymspiration Logo">
        <h1>GYMSPIRATION</h1>
    </div>

    <div class="dash-title">
        <h1>Admin dashboard</h1>
        <p>Welcome to your dashboard, from here you can manage members or view reports by using the sidebar to the left.
            You can also see highlighted information below</p>
    </div>

    @if (session('status'))
            <div class="errors">
               {{ session('status') }}
            </div>
        @endif

    <div class="dash-tiles">

        <div class="dash-tile">
            <div class="dash-tile__title">
                <h5>Monthly Revenue</h5>
            </div>
            <div>
                <p>&pound;{{ array_sum($monthlyStats) }}</p>
            </div>
        </div>

        <div class="dash-tile">
            <div class="dash-tile__title">
                <h5>Monthly Members</h5>
            </div>
            <div>
                <p>{{ count($monthlyStats) }}</p>
            </div>
        </div>

        <div class="dash-tile">
            <div class="dash-tile__title">
                <h5>Annual Revenue</h5>
            </div>
            <div>
                <p>&pound;{{ array_sum($yearlyStats) }}</p>
            </div>
        </div>

        <div class="dash-tile">
            <div class="dash-tile__title">
                <h5>Yearly Members</h5>
            </div>
            <div>
                <p>{{ count($yearlyStats) }}</p>
            </div>
        </div>

        <div class="dash-tile members">
            <div class="dash-tile__title">
                <h5>Latest Member</h5>
            </div>
            <div>
                <p>{{ $member->firstName }} {{ $member->lastName }} </p>
            </div>
        </div>
    </div>

</div>


@endsection
