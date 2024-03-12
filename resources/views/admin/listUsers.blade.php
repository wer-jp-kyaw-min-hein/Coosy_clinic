@section("title")
    List of Users
@endsection

@extends("admin.layout.master")
@section("content")
    <div class="mb-5 flex justify-between items-center w-2/3">
        <div>
            <h5 class="leading-none text-[22px] font-bold text-gray-900 dark:text-white pb-2">User Accounts</h5>
            <p class="text-base font-normal text-[14px] text-gray-500 dark:text-gray-400">View & Manage Accounts
            </p>
        </div>
    </div>
    <section class=" py-3 sm:py-5">

        <div class="px-4 mx-auto max-w-screen-2xl lg:px-12">
            <div class="relative overflow-hidden bg-white shadow-md  border mt-3 dark:bg-gray-800 sm:rounded-lg">

                <div
                    class="flex flex-col px-4 py-3 space-y-3 lg:flex-row lg:items-center lg:justify-between lg:space-y-0 lg:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">

                        <h5>
                            Users
                        </h5>
                    </div>

                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>

                            <th scope="col" class="px-4 py-3">SR#</th>
                            <th scope="col" class="px-4 py-3">Name</th>
                            <th scope="col" class="px-4 py-3">Email</th>
                            <th scope="col" class="px-4 py-3">Registered At</th>
                            <th scope="col" class="px-4 py-3">Actions</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($users as $u)

                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">


                                <td class="px-4 py-2">
                                    {{$u->id}}
                                </td>

                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$u->name}}
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$u->email}}
                                </td>
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{$u->created_at->format("D, d M Y H:i:s")}}
                                </td>
                                <td class="px-4 py-2  text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="{{ route('admin.delete-user',$u->id) }}"
                                       class="w-full px-3 py-1  text-sm   text-center text-white bg-red-700 rounded-md hover:bg-red-800 focus:ring-4 focus:ring-red-300 sm:w-auto ">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="m-4 flex justify-end">
                    {{$users->links()}}</div>
            </div>
        </div>
    </section>
@endsection
