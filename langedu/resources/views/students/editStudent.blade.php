<x-app-layout>
    <section class="container mx-auto">
        <div class="flex justify-around items-center p-10">
            <h1 class="font-bold text-center mt-10 text-2xl ml-0">Update a student record </h1>
            <a class="mt-10 ml-10 bg-green-600 text-white font-bold py-2 px-2 hover:underline" href="dashboard">Go at
                the main
                page</a>
        </div>

        <div class="flex flex-column justify-center items-center">
            <form method="POST" action="{{ route('company.update', $company->id) }}">

                @csrf
                @method('PUT')

                <div class="flex flex-col">
                    <label class="font-bold">Company Name:</label>
                    <input class="rounded-md mt-5" type="text" name="name" id="name"
                        value="{{ old('name', $company->name) }}">

                    @error('name')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="font-bold mt-5">Company Address:</label>
                    <input class="rounded-md mt-5" type="text" name="address" id="address"
                        value="{{ old('address', $company->address) }}">
                    @error('address')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="font-bold mt-5">Company Email:</label>
                    <input class="rounded-md mt-5" type="text" name="email" id="email"
                        value="{{ old('email', $company->email) }}">
                    @error('email')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="font-bold mt-5">Company Website:</label>
                    <input class="rounded-md mt-5" type="text" name="website" id="website"
                        value="{{ old('website', $company->website) }}">
                    @error('website')
                        <p>{{ $message }}</p>
                    @enderror
                </div>

                <button class="mt-10 ml-10 bg-blue-600 text-white font-bold py-2 px-2 hover:underline"
                    type="submit">Submit</button>
            </form>
        </div>
    </section>
</x-app-layout>