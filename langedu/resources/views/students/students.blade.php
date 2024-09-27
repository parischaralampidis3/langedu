<x-app-layout>
  
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <section class="flex justify-around mx-5 px-0 py-6"> <!-- Added margin-x and padding-x -->
                    <div class="mt-12 mx-auto overflow-x-auto">

                        <div class="flex flex-row justify-between">
                            <h1 class="text-xl font-bold">Students List</h1>
                            <div class="flex flex-col">
                                <a class="update bg-blue-500 text-white font-bold py-2 px-2 rounded"
                                    href="{{route('students.createStudent')}}">Create Company</a>
                            </div>
                        </div>
                        <br /><br />

                        <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                            <table class="min-w-full leading-normal">
                                <thead>
                                    <tr>
                                        <th class="p-2 border-b border-slate-200 bg-slate-50">Username</th>
                                        <th class="p-2 border-b border-slate-200 bg-slate-50">Name</th>
                                        <th class="p-2 border-b border-slate-200 bg-slate-50">Surname</th>
                                        <th class="p-2 border-b border-slate-200 bg-slate-50">Email</th>
                                        <th class="p-2 border-b border-slate-200 bg-slate-50">BirthDate</th>
                                        <th class="p-2 border-b border-slate-200 bg-slate-50">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($students as $student)
                                        <tr class="hover:bg-slate-50 border-b border-slate-200">
                                            <td class="p-4 py-5">{!! $student->username!!}</td>
                                            <td class="p-4 py-5">{!! $student->firstname !!}</td>
                                            <td class="p-4 py-5">{!! $student->lastname!!}</td>
                                            <td class="p-4 py-5">{!! $student->email!!}</td>
                                            <td class="p-4 py-5">{!! $student->formatted_dob!!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>