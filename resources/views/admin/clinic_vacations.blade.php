@section("title")
    Clinic Opening Timings
@endsection

@extends("admin.layout.master")
@section('content')
    <div class="container mx-auto my-8">
        <h1 class="text-2xl font-bold mb-4">Clinic Vacation</h1>

        <div class="grid grid-cols-2 md:grid-cols-2 gap-4">

            <div
                class="relative overflow-hidden bg-white shadow-md  col-span-1 p-8 border mt-3 dark:bg-gray-800 sm:rounded-lg">
                <h1 class="text-2xl font-bold mb-4">Add Clinic Vacation</h1>
                <form method="post" action="{{ route('clinic-vacations.store') }}" class="flex flex-col space-y-4">
                    @if($errors->any())
                        <div class="bg-red-100 text-red-500 p-2 rounded-md mb-4">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
            @if($clinicVacations->isEmpty())
                <p>No clinic vacations available.</p>
            @else
                <div class="w-full col-span-1">
                    <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
                        <div
                            class="relative overflow-hidden bg-white shadow-md  border mt-3 dark:bg-gray-800 sm:rounded-lg">

                            <div
                                class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                                <div class="flex items-center flex-1 space-x-4">

                                    <h5>
                                       Scheduled vacations
                                    </h5>
                                </div>

                            </div>
                            <div class="overflow-x-auto">
                                <ul class="px-8 mb-5">
                                    @foreach($clinicVacations as $clinicVacation)
                                        <li class="border-b-1 p-3  border border-gray-100 ">{{ $clinicVacation->start_date }} to {{ $clinicVacation->end_date }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>


                    @endif
                </div>

        </div>
@endsection
