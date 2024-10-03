<style>
    .sky {
        background-color: rgb(6 182 212);
    }

    .green {
        background-color: rgb(34 197 94);
    }
</style>
<x-app-layout>
    <section class="container mx-auto py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-around items-center p-10">

                        <a class="green mt-10 bg-green-600 text-white font-bold py-2 px-2 hover:underline"
                            href="/dashboard">Go at
                            the main
                            page</a>
                    </div>
                    <br><br>
                    <div class="flex flex-column justify-center items-center">
                        <form method="POST" action="{{ route('students.update', $student->id) }}">

                            @csrf
                            @method('PUT')

                            <div class="flex flex-col">
                                <label class="font-bold">Title:</label>
                                <input class="rounded-md mt-5" type="text" name="title" id="title"
                                    value="{{ old('title', $lesson->title) }}">

                                @error('title')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="font-bold mt-5">Description:</label>
                                <input class="rounded-md mt-5" type="text" name="description" id="description"
                                    value="{{ old('description', $lesson->description) }}">
                                @error('description')

                                    <p>{{ $message }}</p>
                                @enderror
                            </div>

                       
                            <br><br>
                            <button
                                class="green mt-10 ml-10 bg-green-600 text-white font-bold py-2 px-2 hover:underline"
                                type="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>