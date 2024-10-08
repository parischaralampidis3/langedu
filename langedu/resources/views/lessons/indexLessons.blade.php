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
</style>
<x-app-layout>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <section class="flex justify-around mx-5 px-0 py-6"> <!-- Added margin-x and padding-x -->
                    <div class="mt-12 mx-auto overflow-x-auto">
                        <div>
                            <div class="flex justify-around items-center p-10">

                                <a class="green mt-10 ml-10 bg-green-600 text-white font-bold py-2 px-2 hover:underline"
                                    href="/dashboard">Go at
                                    the main
                                    page</a>
                            </div>




                            <br><br>
                            <div class="flex flex-row mt-5 justify-between">
                                <h1 class="text-xl mt-5  font-bold">Lessons List</h1>
                                <div class="flex flex-col">
                                    <a class="green text-white font-bold py-2 px-2 rounded"
                                        href="{{route('lessons.createLesson')}}">Create Lesson</a>
                                </div>
                                  <div class="flex flex-col">
                                    <a class="green text-white font-bold py-2 px-2 rounded"
                                        href="{{route('students.enrollStudent')}}">Enroll Student</a>
                                </div>

                               
                            </div>
                            <br /><br />

                            <div class="inline-block min-w-full shadow-md rounded-lg overflow-hidden">
                                <table class="min-w-full leading-normal">
                                    <thead>
                                        <tr>
                                            <th class="p-2 border-b border-slate-200 bg-slate-50">Title</th>
                                            <th class="p-2 border-b border-slate-200 bg-slate-50">Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($lessons as $lesson)
                                            <tr class="hover:bg-slate-50 border-b border-slate-200">
                                                <td class="p-4 py-5">{!! $lesson->title!!}</td>
                                                <td class="p-4 py-5">{!! $lesson->description !!}</td>
                                                <td class="p-4 py-5">
                                                    <div class="flex flex-column lg:flex-row">
                                                        <div class="mt-2">
                                                        <a class="sky text-white font-bold py-2 px-2 rounded"
                                                            href="{{route('lessons.showLesson', $lesson->id)}}">Show</a>
                                                        </div>
                                                        <div class="mt-2">
                                                        <a class="sky text-white ml-2  font-bold py-2 ml-3 px-2 rounded"
                                                            href="{{route('lessons.editLesson', $lesson->id)}}">Update</a>
                                                        </div>

                                                               <div>
                                                        <form action="{{route('lessons.destroyLesson', $lesson->id)}}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="red text-white font-bold ml-3 p-2  rounded">
                                                                Delete
                                                            </button>

                                                        </form>
                                                    </div>
                                                        <div>



                                                </td>
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