<x-app-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <section class="flex justify-around mx-5 px-0 py-6"> <!-- Added margin-x and padding-x -->
                    <div class="mt-12 mx-auto overflow-x-auto">

                        <div class="flex flex-col lg:flex-row justify-around">
                            <div class="mt-4">
                                <h1 class="font-bold text-blue-400">Username:</h1>
                                <p>{{$student->username}}</p>
                            </div>
                            <div class="mt-4">
                                <h1 class="font-bold text-blue-400">First Name:</h1>
                                <p>{{$student->firstname}}</p>
                            </div>
                            <div class="mt-4">
                                <h1 class="font-bold text-blue-400">Last Name:</h1>
                                <p>{{$student->lastname}}</p>
                            </div>
                            <div class="mt-4">
                                <h1 class="font-bold text-blue-400">Email:</h1>
                                <p>{{$student->email}}</p>
                            </div>
                            <div class="mt-4">
                                <h1 class="font-bold text-blue-400">Datebirth:</h1>
                                <p>{{$student->formatted_dob}}</p>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>