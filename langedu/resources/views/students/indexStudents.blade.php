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
                                <h1 class="text-xl mt-5  font-bold">Students List</h1>
                                <div class="flex flex-row">
                                    <div>
                                    <a class="green text-white font-bold py-2 px-2 rounded"
                                        href="{{route('students.createStudent')}}">Create Students</a>
                                     </div>
                                     <br><br>
                                     <div style="margin-left:20px;">
                                         <a class="sky text-white font-bold py-2 px-2 rounded"
                                        href="{{route('students.archiveStudent')}}">Archive Students</a>
                                    </div>
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
                                       
                                                        <tr class="hover:bg-slate-50 border-b border-slate-200  {{ $student->is_suspended ? 'suspended' : '' }}">
                                                            <td class="p-4 py-5">{!! $student->username!!}</td>
                                                            <td class="p-4 py-5">{!! $student->firstname !!}</td>
                                                            <td class="p-4 py-5">{!! $student->lastname!!}</td>
                                                            <td class="p-4 py-5">{!! $student->email!!}</td>
                                                            <td class="p-4 py-5">{!! $student->formatted_dob!!}</td>
                                                            <td class="p-4  flex">
                                                                <div class="mt-2">
                                                                    <a class="sky text-white font-bold py-2 px-2 rounded"
                                                                        href="{{route('students.showStudent', $student->id)}}">Show</a>
                                                                </div>
                                                                <div class="mt-2">
                                                                    <a class="sky text-white ml-2  font-bold py-2 ml-3 px-2 rounded"
                                                                        href="{{route('students.editStudent', $student->id)}}">Update</a>
                                                                </div>
                                                                <div>
                                                                    <form action="{{route('students.delete', $student->id)}}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <button class="red text-white font-bold ml-3 p-2  rounded">
                                                                            Delete
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </td>
                                                            </form>
                                            </div>
                                            </td>
                                                <td>
                                            
                                                    <div class="mt-2">
                                                        <form action="{{route('students.toggleSuspend',$student->id)}}" method="POST">
                                                            @csrf
                                                            @method('PUT')
                                                            
                                                        <label for="is_suspended"></label>
                                                        <input type="hidden" name="is_suspended" value="0">
                                                        <div class="flex items-center">
                                                        <input class="mt-10" type="checkbox" id="is_suspended" name="is_suspended" value="1"
                                                             onchange="this.form.submit()" {{ $student->is_suspended ? 'checked' : '' }} />
                                                             
                                                          <p style="padding:20px;">{{ $student->is_suspended ? 'suspended user' : 'not suspend user' }}</p>
                                                          </div>
                                                        </form>

                                                       
                                                    </div> 
                                                  
                                                </td>

                                            </tr>
                                            
                                        @endforeach
                                    
                            </tbody>
                            </table>
                        </div>   
                         <div class="mt-4">
                                           {{ $students->links() }}
                                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
</x-app-layout>