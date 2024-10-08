<style>
    .sky {
        background-color: rgb(6 182 212);
    }

    .green {
        background-color: rgb(34 197 94);
    }
</style>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-around items-center p-10">
                          
                            <a class="green mt-10 bg-green-600 text-white font-bold py-2 px-2 hover:underline"
                                href="dashboard">Go at
                                the main
                                page</a>
                        </div>
                        <br><br>

                      
                            <h1>Enroll Students</h1>
                            <div class="flex flex-col justify-center items-center mt-10">
                                <form method="POST" action="{{url('students.enrollStudents')}}">
                                    @csrf

                                         <div class="flex flex-col">
                                            <label class="font-bold" for="student_id">Student</label>
                                            <select id="student_id" name="student_id" class="w-full p-2 border rounded">
                                                <option value="">--Choose a student--</option>
                                                @foreach ($students as $student )
                                                        <option value="{{$student->id}}">{{$student->firstname}} - {{$student->lastname}}</option>
                                                @endforeach
                                            </select>
                                            @error('student_id')
                                                <p>{{$message}}</p>
                                            @enderror
                                            </div>

                                            <!--Lesson-->
                                            <div class="flex flex-col">
                                                <label class="font-bold" for="lesson_id">Lesson</label>
                                                <select id="lesson_id" name="lesson_id" class="w-full p-2 border rounded">
                                                    <option value="">--Choose a lesson--</option>
                                                    @foreach ($lessons as $lesson )
                                                        <option value="{{$lesson->id}}">{{$lesson->title}}</option>
                                                    @endforeach           
                                                </select>
                                                @error('lesson_id')
                                                    <p>{{$message}}</p>
                                                @enderror
                                            </div>
                                            <br><br>
                                            <button type="submit" class="green mt-10 ml-10 bg-green-600 text-white font-bold py-2 px-2 hover:underline">Enroll Student
                                            </button>
                                </form>
                            </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>