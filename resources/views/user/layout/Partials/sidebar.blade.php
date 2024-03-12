<aside id="logo-sidebar"
       class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0  "
       aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white  ">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{route("user.dashboard")}}"
                   class="flex items-center p-2 text-gray-900 rounded-lg   hover:bg-blue-800 hover:text-white @if(Route::is("user.dashboard")) bg-blue-800 text-white @endif   group">
                    <svg
                        class="w-5 h-5  @if(Route::is("user.dashboard")) bg-blue-800 text-white @endif   transition duration-75   group-hover:text-900 "
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>


                    <span class="ms-3">Dashboard</span>
                </a>
            </li>


            <li>
                <a href="{{route("user.bookings")}}"
                   class="flex items-center p-2 text-gray-900 rounded-lg   hover:bg-blue-800 hover:text-white @if(Route::is("user.bookings")) bg-blue-800 text-white @endif   group">
                    <svg
                        class="w-5 h-5  @if(Route::is("user.bookings")) bg-blue-800 text-white @endif   transition duration-75   group-hover:text-900 "
                        data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"></path>
                    </svg>


                    <span class="ms-3">Bookings</span>
                </a>
            </li>


        </ul>
    </div>
</aside>
