@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-8">
        <h1 class="text-2xl font-bold mb-4">Clinic Vacations</h1>

        @if($clinicVacations->isEmpty())
            <p>No clinic vacations available.</p>
        @else
            <ul>
                @foreach($clinicVacations as $clinicVacation)
                    <li>{{ $clinicVacation->start_date }} to {{ $clinicVacation->end_date }}</li>
                @endforeach
            </ul>
        @endif

        <a href="{{ route('clinic-vacations.create') }}" class="bg-blue-500 text-white p-2 rounded-md">Add Clinic Vacation</a>
    </div>
@endsection
