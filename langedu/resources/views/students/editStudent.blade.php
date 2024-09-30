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
                                <label class="font-bold">Userame:</label>
                                <input class="rounded-md mt-5" type="text" name="username" id="username"
                                    value="{{ old('username', $student->username) }}">

                                @error('username')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="font-bold mt-5">First name:</label>
                                <input class="rounded-md mt-5" type="text" name="firstname" id="firstname"
                                    value="{{ old('firstname', $student->firstname) }}">
                                @error('firstname')

                                    <p>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="font-bold mt-5">Last name:</label>
                                <input class="rounded-md mt-5" type="text" name="lastname" id="lastname"
                                    value="{{ old('lastname', $student->lastname) }}">
                                @error('lastname')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="font-bold mt-5">Email:</label>
                                <input class="rounded-md mt-5" type="email" name="email" id="email"
                                    value="{{ old('email', $student->email) }}">
                                @error('email')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col">
                                <label class="font-bold mt-5">Birthdate:</label>
                                <input class="rounded-md mt-5" type="date" name="dob" id="dob"
                                    value="{{ old('dob', $student->dob) }}">
                                @error('dob')
                                    <p>{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="flex flex-col">
                                <label for="suspended">Suspend Student</label>
                                <input type="checkbox" id="suspended" name="suspended" value="1" {{$student -> suspended ? 'checked' : ''}} />
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