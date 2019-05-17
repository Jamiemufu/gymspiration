@extends('layouts.app')
@section('content')
<div class="flex-container">
    <div class="form-container">
        <div class="edit-member">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Gymspiration Logo">
                <h1>Edit Member</h1>
                <p>Please fill in any fields you would like to edit and update</p>
                <p>Leave fields blank if you don't want to update it</p>
            </div>
            @if ($errors->any())
                <div class="errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('updateMember',  $member->id) }}">
                @method('PATCH')
                @csrf
                <div class="inputs">
                    <label for="firstname">Firstname: (*required)
                        <input type="text" name="firstname" value="{{ $member->firstName }}" required autofocus>
                    </label>
                </div>
                <div class="inputs">
                    <label for="lastname">Lastname: (*required)
                        <input type="text" name="lastname" value="{{ $member->lastName }}" required>
                    </label>
                </div>
                <div class="inputs">
                    <label for="email">Email:(*required)
                        <input type="email" name="email" value="{{ $member->email }}" required>
                    </label>
                </div>
                <div class="inputs">
                    <label for="phone_number">Phone Number:
                        <input type="text" name="phone_number" value="{{ $member->phone }}">
                    </label>
                </div>
                <div class="inputs">
                    <label for="address_line_1">Address Line 1: (*required)
                        <input type="text" name="address_line_1" value="{{ $member->address_line_1 }}">
                    </label>
                </div>
                <div class="inputs">
                    <label for="address_line_2">Address Line 2:
                        <input type="text" name="address_line_2" value="{{ $member->address_line_2 }}">
                    </label>
                </div>
                <div class="inputs">
                    <label for="town">Town/City:(*required)
                        <input type="text" name="town" value="{{ $member->town }}" required>
                    </label>
                </div>
                <div class="inputs">
                    <label for="county">County:(*required)
                        <input type="text" name="county" value="{{ $member->county }}" required>
                    </label>
                </div>
                <div class="inputs">
                    <label for="postcode">Postcode:(*required)
                        <input type="text" name="postcode" value="{{ $member->postcode }}" required>
                    </label>
                </div>
                <div class="inputs">
                    <label for="dob">Date of Birth:
                        @if (is_null($member->DOB))
                            No data stored
                        @else
                            {{ $member->DOB }}
                        @endif
                        <input type="date" name="dob" value="{{ $member->DOB }}">
                    </label>
                </div>
                <div class="inputs">
                    <label for="membership">Select a membership type:
                        @if (isset($member->membership->type) && !empty(($member->membership->type)))
                            <strong><br>Current membership: {{ $member->membership->type }}</strong>
                        @else
                            <strong><br>No data stored</strong>
                        @endif
                        <select name="membership" id="membership">
                            <option value="3" selected disabled hidden>Select</option>
                            <option value="1">Monthly</option>
                            <option value="2">Yearly</option>
                            <option value="3">No Membership</option>
                        </select>
                    </label>
                </div>
                <div class="button">
                    <button type="submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection