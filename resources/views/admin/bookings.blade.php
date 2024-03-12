@section("title")
    All Appointments
@endsection

@extends("admin.layout.master")
@section("content")

    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
            <div class="mx-auto max-w-screen-sm text-center lg:mb-16 mb-8">

                <p class="font-light text-gray-500 sm:text-xl dark:text-gray-400">Here are all
                    bookings</p>
            </div>
            <div class="grid gap-8 lg:grid-cols-2">
                @foreach($bookings as $booking)
                    @php
                        $date = DateTime::createFromFormat('Y-m-d H:i:s', "$booking->date $booking->time");
                     $date = Carbon\Carbon::instance($date);
                    @endphp

                        <article
                            class="p-6 bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex justify-between items-center mb-5 text-gray-500">
                  <span
                      class="bg-primary-100 text-primary-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded dark:bg-primary-200 dark:text-primary-800">

                  </span>
                                <span
                                    class="text-sm">  {{$date->diffForHumans()}}  </span>
                            </div>
                            <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white"><a
                                    href="#">
                                    Booking on {{$date->format("D, d M Y H:i:s")}}
                                </a></h2>
                            <p class="mb-5 font-light text-gray-500 dark:text-gray-400">
                                For {{$booking->attendance}} Person
                            </p>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center space-x-4">
                                    <img class="w-7 h-7 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/bonnie-green.png" alt="Bonnie Green avatar" />
                                    <span class="font-medium dark:text-white">
                        {{$booking->user->name}}
                      </span>
                                </div>
                                <a href="#" class="inline-flex items-center font-medium text-primary-600 dark:text-primary-500 ">
                                   Booked at {{$booking->created_at->format("D, d M Y H:i:s")}}
                                 </a>
                            </div>
                        </article>

                @endforeach
            </div>

        </div>
    </section>

@endsection
