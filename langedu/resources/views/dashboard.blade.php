<style>
    .sky {
        background-color: rgb(6 182 212);
    }

    .green {
        background-color: rgb(34 197 94);
    }

    .red {
        background-color: rgb(220 38 38);
    }

    .suspended {
        opacity: 0.5;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg: px-2">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}

                    <br><br>
                    <div>
                        <h1>This is a quick way to set an exercise lesson.</h1>
                    </div>

                    <h1 class="text-xl fw-bolder text-center">Students Section</h1>
                    <br>


                    <div class="flex flex-col items-center justify-center ">
                        <a class="green  text-white text-center font-bold py-2 px-2 rounded"
                            href="{{route('students.enrollStudent')}}">Enroll Student at Lesson</a>
                    </div>
                </div>

            </div>

        </div>

    </div>

</x-app-layout>