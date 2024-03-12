@extends('layouts.app')

@section('content')
    <div class="container mx-auto my-8">
        <h1 class="text-2xl font-bold mb-4">Add Clinic Vacation</h1>

        <form method="post" action="{{ route('clinic-vacations.store') }}" class="flex flex-col space-y-4">
            @csrf

            <div class="flex flex-col">
                <label for="start_date" class="text-sm">Start Date:</label>
                <input type="date" name="start_date" id="start_date" class="border p-2 rounded-md" required>
            </div>

            <div class="flex flex-col">
                <label for="end_date" class="text-sm">End Date:</label>
                <input type="date" name="end_date" id="end_date" class="border p-2 rounded-md" required>
            </div>

            <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Add Clinic Vacation</button>
        </form>
    </div>
@endsection
