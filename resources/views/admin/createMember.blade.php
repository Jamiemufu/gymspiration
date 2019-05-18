@extends('layouts.app')
@section('content')
<div class="flex-container">
    <div class="form-container">
        <div class="create-member">
            <div class="logo">
                <img src="{{ asset('images/logo.png') }}" alt="Gymspiration Logo">
                <h1>Create New Member</h1>
            </div>
            {{-- error messages --}}
            @if ($errors->any())
                <div class="errors">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {{-- form --}}
            <form method="POST" action="{{ route('storeMember') }}">
                @csrf
                <div class="inputs">
                    <label for="firstName">Firstname: (*required)
                        <input type="text" name="firstName" required autofocus>
                    </label>
                </div>
                <div class="inputs">
                    <label for="lastName">Lastname: (*required)
                        <input type="text" name="lastName" required>
                    </label>
                </div>
                <div class="inputs">
                    <label for="email">Email:(*required)
                        <input type="email" name="email" required>
                    </label>
                </div>
                <div class="inputs">
                    <label for="phone">Phone Number:
                        <input type="number" name="phone">
                    </label>
                </div>
                <div class="inputs">
                    <label for="email">Email:(*required)
                        <input type="text" name="address_line_1" required>
                    </label>
                </div>
                <div class="inputs">
                    <label for="address_line_1">Address Line 1: (*required)
                        <input type="text" name="address_line_1" required>
                    </label>
                </div>
                <div class="inputs">
                    <label for="address_line_2">Address Line 2:
                        <input type="text" name="address_line_2">
                    </label>
                </div>
                <div class="inputs">
                    <label for="town">Town/City:(*required)
                        <input type="text" name="town" required>
                    </label>
                </div>
                <div class="inputs">
                    <label for="county">County:(*required)
                        <input type="text" name="county" required>
                    </label>
                </div>
                <div class="inputs">
                    <label for="postcode">Postcode:(*required)
                        <input type="text" name="postcode">
                    </label>
                </div>
                <div class="inputs">
                    <label for="DOB">Date of Birth:
                        <input type="date" name="DOB">
                    </label>
                </div>
                <div class="inputs">
                    <label for="membership_id">Select a membership type: (yearly/monthly)
                        <select name="membership_id" id="membership">
                            <option value="3" selected disabled hidden>Select</option>
                            <option value="1">Monthly £14.99</option>
                            <option value="2">Yearly £99.99</option>
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