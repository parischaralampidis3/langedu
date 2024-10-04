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
                    <div class="flex flex-column justify-center items-center mt-10">
                        <form method="POST" action="{{url('/createLesson')}}">
                            @csrf
                            <div class="flex flex-col">
                                <label class="font-bold" for="title">Title</label>
                                <input class="roun ded-md mt-5" type="text" name="title" id="title"
                                    value="{{old('title')}}" required />
                                @error('title')
                                    <p>{{$message}}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="font-bold" for="script">Description</label>
                                <input class="rounded-md mt-5" type="text" name="description" id="description"
                                    value="{{old('description')}}" required />
                                @error('description')
                                    <p>{{$message}}</p>
                                @enderror
                            </div>

                            <br><br>
                            <button 
                                class=" green mt-10 ml-10 bg-green-600 text-white font-bold py-2 px-2 hover:underline"
                                type="submit">Submit</button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>