@section("title")
    Dashboard
@endsection

@extends("user.layout.master")
@section("content")

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">
                <h2 class="mb-4 text-3xl lg:text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Upcoming
                    Bookings</h2>

                <div>
                    <a href="{{ route('index') }}"
                       class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none"
                       id="btn">
                        Book New Appointment
                    </a>
                </div>

            </div>
            <div class="grid gap-8 lg:grid-cols-2">
                @foreach($bookings as $booking)
                    @php
                        $date = DateTime::createFromFormat('Y-m-d H:i:s', "$booking->date $booking->time");
                     $date = Carbon\Carbon::instance($date);
                    @endphp
                    @if($date->isFuture())
                        <article
                            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-between items-center mb-5 text-gray-500">
                  <span
                      class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">

                  </span>
                                <span
                                    class="text-sm">After {{Carbon\Carbon::now()->diffInDays($date, false)}} days</span>
                            </div>
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a
                                    href="#">
                                    Booking on {{$date->format("D, d M Y H:i:s")}}
                                </a></h2>
                            <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                                For {{$booking->attendance}} Person
                            </p>

                        </article>
                    @endif
                @endforeach
            </div>


        </div>
    </section>

@endsection
