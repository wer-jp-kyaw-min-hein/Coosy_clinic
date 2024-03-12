<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>Booking Form</title>
</head>
<body>


<div class="flex items-center justify-center p-12">
    <div class="mx-auto w-full max-w-[550px]">
        @if(session('success'))
            <div class="bg-green-100 text-green-500 p-2 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('appointments.store') }}">
            @csrf
            @if(!auth()->check())
                <div class="-mx-3 flex flex-wrap">

                    <!-- First Name -->
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="fname" class="mb-3 block text-base font-medium text-[#07074D]">
                                First Name
                            </label>
                            <input type="text" name="fname" id="fname" placeholder="First Name"
                                   class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>

                            @error('fname')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Last Name -->
                    <div class="w-full px-3 sm:w-1/2">
                        <div class="mb-5">
                            <label for="lName" class="mb-3 block text-base font-medium text-[#07074D]">
                                Last Name
                            </label>
                            <input type="text" name="lName" id="lName" placeholder="Last Name"
                                   class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>

                            @error('lName')
                            <p class="text-red-500 text-sm">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>


                <!-- Email -->
                <div class="mb-5">
                    <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                        Email
                    </label>
                    <input type="email" name="email" id="email" placeholder="Email Address"
                           class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>

                    @error('email')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div class="mb-5">
                    <label for="password" class="mb-3 block text-base font-medium text-[#07074D]">
                        Password
                    </label>
                    <input type="password" name="password" id="password" placeholder="Password"
                           class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>

                    @error('password')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="mb-5">
                    <label for="password_confirmation" class="mb-3 block text-base font-medium text-[#07074D]">
                        Confirm Password
                    </label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                           placeholder="Confirm Password"
                           class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>

                    @error('password_confirmation')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
            @endif
            <!-- Guest Count -->
            <div class="mb-5">
                <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">
                    How many guests are you bringing?
                </label>
                <input type="number" name="guest" id="guest" placeholder="5" min="0" value="1"
                       class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>

                @error('guest')
                <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div class="-mx-3 flex flex-wrap">
                <!-- Date -->
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="date" class="mb-3 block text-base font-medium text-[#07074D]">
                            Select Date:
                        </label>

                        <select name="date" id="date"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                                required>
                            @foreach($availableDates as $date)
                                <option
                                    value="{{ $date }}">{{ \Carbon\Carbon::parse($date)->format('l, F j, Y') }}</option>
                            @endforeach
                        </select>

                        @error('date')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Time -->
                <div class="w-full px-3 sm:w-1/2">
                    <div class="mb-5">
                        <label for="time" class="mb-3 block text-base font-medium text-[#07074D]">
                            Time
                        </label>
                        <select name="time" id="time"
                                class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                        </select>

                        @error('time')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
            </div>

                <div class="">
                    <button
                        class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
                        id="btn" disabled>
                        Book Appointment
                    </button>
                </div>

            @if(auth()->check())
            <div class="mt-3">
                <a href="{{ route('user.dashboard') }}"
                   class="hover:underline text-bold"
                   id="btn">
                    Back To Dashboard
                </a>
            </div>
            @endif
        </form>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    // Handle AJAX requests for available times
    $(document).ready(function () {
        $('#date').on('change', function () {
            var selectedDate = $(this).val();

            $.ajax({
                url: '/appointments/available-times',
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "selectedDate": selectedDate,
                },
                success: function (data) {
                    // Update the available times dropdown
                    $('#time').html(data);
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });


        $('#time').on('change', function () {
            var selectedDate = $('#date').val();
            var selectedTime = $(this).val();

            $.ajax({
                url: '/appointments/check-availability',
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "selectedDate": selectedDate,
                    "selectedTime": selectedTime,
                },
                success: function (data) {
                    if (data.available) {
                        console.log('Time is available.');

                        $("#btn").removeAttr("disabled");

                        $("#btn").text("Book Appointment");
                    } else {
                        console.log('Time is already booked.');
                        $("#btn").attr("disabled", "true");
                        $("#btn").text("Time is already booked.");
                    }
                },
                error: function (xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        });

        function updateAvailableTimes(availableTimes) {
            var timeSelect = $('#time');
            timeSelect.empty(); // Clear existing options

            if (availableTimes.length > 0) {
                $.each(availableTimes, function (index, time) {
                    timeSelect.append('<option value="' + time + '">' + time + '</option>');
                });
            } else {
                timeSelect.append('<option value="">No available times</option>');
            }
        }

    });
</script>

</body>
</html>
