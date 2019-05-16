<!-- admin dashboard -->

@extends('layouts.app')

@section('content')

<div class="dash-container">

    <div class="logo">
        <img src="{{ asset('images/sidebar_logo.png') }}" alt="Gymspiration Logo">
        <h1>View Members</h1>
    </div>

    @if (session('status'))
        <div class="errors">
            {{ session('status') }}
        </div>
    @endif
    
    <table>
        <tr>
            <th style="font-size: 12px;">Firstname</th>
            <th style="font-size: 12px;">Lastname</th>
            <th style="font-size: 12px;">Email</th>
            <th style="font-size: 12px;">Address 1</th>
            <th style="font-size: 12px;">Address 2</th>
            <th style="font-size: 12px;">Town/City</th>
            <th style="font-size: 12px;">County</th>
            <th style="font-size: 12px;">Postcode</th>
            <th style="font-size: 12px;">Phonenumber</th>
            <th style="font-size: 12px;">Date of Birth</th>
        </tr>
       
        @foreach ($members as $member)
        <tr>
            <td style="font-size: 10px">{{ $member->firstName }}</td>
            <td style="font-size: 10px">{{ $member->lastName }}</td>
            <td style="font-size: 10px">{{ $member->email }}</td>
            <td style="font-size: 10px">{{ $member->address_line_1 }}</td>
            <td style="font-size: 10px">{{ $member->address_line_2 }}</td>
            <td style="font-size: 10px">{{ $member->town }}</td>
            <td style="font-size: 10px">{{ $member->county }}</td>
            <td style="font-size: 10px">{{ $member->postcode }}</td>
            <td style="font-size: 10px">{{ $member->phone }}</td>
            <td style="font-size: 10px">{{ $member->DOB }}</td>
        </tr>
        @endforeach
       
    </table>
   

</div>


@endsection
