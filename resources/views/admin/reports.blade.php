<!-- admin reports -->
@extends('layouts.app')
@section('content')
<div class="dash-container">
    <div class="reports">
        <div class="logo">
            <img src="{{ asset('images/sidebar_logo.png') }}" alt="Gymspiration Logo">
            <h1>GYMSPIRATION</h1>
        </div>
        <div class="dash-title">
            <h1>Reports</h1>
            <p>Here you can download csv's below</p>
        </div>
        {{-- flash message --}}
        @if (session('status'))
            <div class="errors">
                {{ session('status') }}
            </div>
        @endif
        <div class="dash-tiles">
            {{-- all members download --}}
            <div class="dash-tile">
                <div class="dash-tile__title">
                    <h5>All members</h5>
                </div>
                <div>
                    <i class="fas fa-file-export"></i>
                </div>
                <div>
                    <a href="{{ action('AdminController@exportAllMembers') }}">
                        <button>Download</button>
                    </a>
                </div>
            </div>
            {{-- monhtly members download --}}
            <div class="dash-tile">
                <div class="dash-tile__title">
                    <h5>Monthly Members</h5>
                </div>
                <form action="{{ action('AdminController@exportMonthlyMembers') }}" method="POST">
                    @csrf
                    <label for="month">Select Month:
                        <select name="month" id="month">
                            @for ($i = 1; $i <= 12; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </label>
                    <button>Download</button>
                </form>
            </div>
            {{-- monthly memberships download --}}
            <div class="dash-tile">
                <div class="dash-tile__title">
                    <h5>Monthly Memberships</h5>
                </div>
                <div>
                    <i class="fas fa-file-export"></i>
                </div>
                <div>
                    <a href="{{ action('AdminController@exportMonthType') }}">
                        <button>Download</button>
                    </a>
                </div>
            </div>
            {{-- yealy memberships download --}}
            <div class="dash-tile">
                <div class="dash-tile__title">
                    <h5>Yearly Memberships</h5>
                </div>
                <div>
                    <i class="fas fa-file-export"></i>
                </div>
                <div>
                    <a href="{{ action('AdminController@exportYearlyType') }}">
                        <button>Download</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection