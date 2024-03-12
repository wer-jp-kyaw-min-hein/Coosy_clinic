@section("title")
    Clinic Opening Timings
@endsection

@extends("admin.layout.master")
@section('content')
    <div class="container mx-auto my-8">
        <h1 class="text-2xl font-bold mb-4">Opening Hours</h1>

        <div class="grid grid-cols-2 md:grid-cols-2 gap-4">

            <div class="relative overflow-hidden bg-white shadow-md  col-span-1 p-8 border mt-3 dark:bg-gray-800 sm:rounded-lg">
                <h2 class="text-lg font-semibold mb-2">Add New Opening Hour</h2>
                <form method="post" action="{{ route('opening-hours.store') }}" class="flex flex-col space-y-4">
                    @csrf
                    <div class="flex flex-col">
                        <label for="day" class="text-sm">Day:</label>
                        <select name="day" id="day" class="border p-2 rounded-md">
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wednesday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                            <option value="saturday">Saturday</option>
                            <option value="sunday">Sunday</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="start_time" class="text-sm">Start Time:</label>
                        <input type="time" name="start_time" id="start_time" class="border p-2 rounded-md" required>
                    </div>

                    <div class="flex flex-col">
                        <label for="end_time" class="text-sm">End Time:</label>
                        <input type="time" name="end_time" id="end_time" class="border p-2 rounded-md" required>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Add Opening Hour</button>
                </form>
            </div>
            @if($openingHours->isEmpty())
                <p>No opening hours available.</p>
            @else
                <div class="w-full col-span-1">
                    <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
                        <div
                            class="relative overflow-hidden bg-white shadow-md  border mt-3 dark:bg-gray-800 sm:rounded-lg">

                            <div
                                class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                                <div class="flex items-center flex-1 space-x-4">

                                    <h5>
                                        Opening & Closing Timings
                                    </h5>
                                </div>

                            </div>
                            <div class="overflow-x-auto">
                                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                    <thead
                                        class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                    <tr class="text-left">
                                        <th class="px-4 py-2">Day</th>
                                        <th class="px-4 py-2">Start Time</th>
                                        <th class="px-4 py-2">End Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($openingHours as $openingHour)
                                        <tr>
                                            <td class="px-4 py-2">{{ ucfirst($openingHour->day) }}</td>
                                            <td class="px-4 py-2">{{ $openingHour->start_time }}</td>
                                            <td class="px-4 py-2">{{ $openingHour->end_time }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    @endif
                </div>

        </div>
@endsection
