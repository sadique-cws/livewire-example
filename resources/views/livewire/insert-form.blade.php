 <div class="w-full gap-6 lg:gap-12">
          @if (session()->has('message'))
                 <div class="bg-green-200 w-full text-green-800 px-3 py-2 rounded">
                     {{ session('message') }}
                 </div>
             @endif
             
    <div class="flex flex-1">
     <div class="w-3/12">
         <div class="w-full max-w-md mx-auto p-6 border rounded">
             <h1 class="text-3xl mb-4">@if($isUpdate) Update @else Insert @endif Form</h1>
             <form wire:submit="save">
                 <div class="mb-3">
                     <label for="">Name</label>
                     <input type="text" class="w-full border px-3 py-2" wire:model.live="name" id="">
                     <span class="text-red-500">@error('name') {{ $message }} @enderror</span>
                 </div>

                 <div class="mb-3">
                     <label for="">contact</label>
                     <input type="text" class="w-full border px-3 py-2" wire:model.live="contact" id="">
                     <span class="text-red-500">@error('contact') {{ $message }} @enderror</span>
                 </div>
                 <div class="mb-3">
                     <label for="">email</label>
                     <input type="text" class="w-full border px-3 py-2" wire:model.live="email" id="">
                     <span class="text-red-500">@error('email') {{ $message }} @enderror</span>
                 </div>
                    <div class="mb-3">
                        <label for="">Photo</label>
                        <input type="file" class="w-full border px-3 py-2" wire:model.live="photo" id="">
                        <span class="text-red-500">@error('photo') {{ $message }} @enderror</span>
                    </div>

                    <div class="mb-3">
                        @if ($photo)
                            <img src="{{ $photo->temporaryUrl() }}" alt="Photo Preview" class="w-full h-32 object-cover mb-2">
                        @endif
                    </div>

                 <div class="mb-3">
                     <button class="bg-blue-500 text-white px-3 py-2 rounded">@if($isUpdate) Update Record @else Submit @endif</button>
                 </div>

             </form>
         </div>
     </div>

     <div class="w-9/12">

        <div class="flex flex-1 justify-between items-center mb-4 px-10">
            <h1 class="text-3xl my-4">Manage Students Records</h1>

            <input type="search" wire:model.live="search" class="border px-3 py-2" placeholder="Enter name or contact">
        </div>

        <table class="w-full border-collapse border">
            <thead>
                <tr>
                    <th class="border px-3 py-2">ID</th>
                    <th class="border px-3 py">Photo</th>
                    <th class="border px-3 py-2">Name</th>
                    <th class="border px-3 py-2">Email</th>
                    <th class="border px-3 py-2">Contact</th>
                    <th class="border px-3 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($students as $student)
                    <tr>
                        <td class="border px-3 py-2">{{ $student->id }}</td>
                        <td class="border px-3 py-2">
                            @if ($student->photo)
                                <img src="{{ asset("storage/" .$student->photo) }}" alt="Student Photo" class="w-16 h-16 object-cover">
                            @else
                                N/A
                            @endif
                        <td class="border px-3 py-2">{{ $student->name }}</td>
                        <td class="border px-3 py-2">{{ $student->email }}</td>
                        <td class="border px-3 py-2">{{ $student->contact }}</td>
                        <td class="border px-3 py-2">
                            <button wire:click="delete({{ $student->id }})" class="bg-red-500 text-white px-3 py-1 rounded">Delete</button>
                            <button wire:click="updateForm({{ $student->id }})" class="bg-green-500 text-white px-3 py-1 rounded">Update</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>

     </div>
     </div>
 </div>
