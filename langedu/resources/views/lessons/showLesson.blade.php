<style>
    .sky {
        background-color: rgb(6 182 212);
    }

    .green {
        background-color: rgb(34 197 94);
    }
</style>
<x-app-layout>

    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
        <div class="py-12">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-around items-center">

                    <a class="green mt-10 mx-auto  p-5 text-white font-bold py-2 pt-3 px-2 hover:underline"
                        href="/dashboard">Go at
                        the main
                        page</a>
                </div>
                <section class="flex justify-around mx-5 px-0 py-6"> <!-- Added margin-x and padding-x -->

                    <div class="mt-12 mx-auto overflow-x-auto">

                        <div class="flex flex-col lg:flex-row justify-around">
                            <div class="mt-4">
                                <h1 class="font-bold text-blue-400">Title:</h1>
                                <p>{{$lesson->title}}</p>
                            </div>
                           <div class="mt-4">
                                <h1 class="font-bold text-blue-400">Description:</h1>
                                <p>{{$lesson->description}}</p>
                        </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>