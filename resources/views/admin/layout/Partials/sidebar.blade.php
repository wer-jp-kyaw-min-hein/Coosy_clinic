<aside id="logo-sidebar"
       class="fixed top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-white border-r border-gray-200 sm:translate-x-0  "
       aria-label="Sidebar">
    <div class="h-full px-3 pb-4 overflow-y-auto bg-white  ">
        <ul class="space-y-2 font-medium">
            <li>
                <a href="{{route("admin.dashboard")}}"
                   class="flex items-center p-2 text-gray-900 rounded-lg   hover:bg-blue-800 hover:text-white @if(Route::is("admin.dashboard")) bg-blue-800 text-white @endif   group">
                    <svg
                        class="w-5 h-5  @if(Route::is("admin.dashboard")) bg-blue-800 text-white @endif   transition duration-75   group-hover:text-900 "
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"/>
                    </svg>


                    <span class="ms-3">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="{{route("admin.users")}}"
                   class="flex items-center p-2 text-gray-900 rounded-lg   hover:bg-blue-800 hover:text-white @if(Route::is("admin.users")) bg-blue-800 text-white @endif   group">
                    <svg
                        class="w-5 h-5  @if(Route::is("admin.users")) bg-blue-800 text-white @endif   transition duration-75   group-hover:text-900 "
                        data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"></path>
                    </svg>


                    <span class="ms-3">Users</span>
                </a>
            </li>

            <li>
                <a href="{{route("admin.bookings")}}"
                   class="flex items-center p-2 text-gray-900 rounded-lg   hover:bg-blue-800 hover:text-white @if(Route::is("admin.bookings")) bg-blue-800 text-white @endif   group">
                    <svg
                        class="w-5 h-5  @if(Route::is("admin.bookings")) bg-blue-800 text-white @endif   transition duration-75   group-hover:text-900 "
                        data-slot="icon" fill="none" stroke-width="1.5" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5m-9-6h.008v.008H12v-.008ZM12 15h.008v.008H12V15Zm0 2.25h.008v.008H12v-.008ZM9.75 15h.008v.008H9.75V15Zm0 2.25h.008v.008H9.75v-.008ZM7.5 15h.008v.008H7.5V15Zm0 2.25h.008v.008H7.5v-.008Zm6.75-4.5h.008v.008h-.008v-.008Zm0 2.25h.008v.008h-.008V15Zm0 2.25h.008v.008h-.008v-.008Zm2.25-4.5h.008v.008H16.5v-.008Zm0 2.25h.008v.008H16.5V15Z"></path>
                    </svg>


                    <span class="ms-3">Bookings</span>
                </a>
            </li>

            <li>
                <a href="{{route("clinic-vacations.index")}}"
                   class="flex items-center p-2 text-gray-900 rounded-lg   hover:bg-blue-800 hover:text-white @if(Route::is("clinic-vacations.*")) bg-blue-800 text-white @endif   group">
                    <svg
                        class="w-5 h-5  @if(Route::is("clinic-vacations.*")) bg-blue-800 text-white @endif   transition duration-75   group-hover:text-900 "
                        xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path
                            d="M4.172 4.179a2 2 0 0 0 -1.172 1.821v3.5a5.5 5.5 0 0 0 9.856 3.358m1.144 -2.858v-4a2 2 0 0 0 -2 -2h-1"/>
                        <path d="M8 15a6 6 0 0 0 10.714 3.712m1.216 -2.798c.046 -.3 .07 -.605 .07 -.914v-3"/>
                        <path d="M11 3v2"/>
                        <path d="M20 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"/>
                        <path d="M3 3l18 18"/>
                    </svg>


                    <span class="ms-3">Vacations</span>
                </a>
            </li>


            <li>
                <a href="{{route("admin.hours")}}"
                   class="flex items-center p-2 text-gray-900 rounded-lg   hover:bg-blue-800 hover:text-white @if(Route::is("admin.hours")) bg-blue-800 text-white @endif   group">
                    <svg
                        class="w-5 h-5  @if(Route::is("admin.hours")) bg-blue-800 text-white @endif   transition duration-75   group-hover:text-900 "
                        xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M6 4h-1a2 2 0 0 0 -2 2v3.5h0a5.5 5.5 0 0 0 11 0v-3.5a2 2 0 0 0 -2 -2h-1"/>
                        <path d="M8 15a6 6 0 1 0 12 0v-3"/>
                        <path d="M11 3v2"/>
                        <path d="M6 3v2"/>
                        <path d="M20 10m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"/>
                    </svg>


                    <span class="ms-3">Opening Hours</span>
                </a>
            </li>


        </ul>
    </div>
</aside>
