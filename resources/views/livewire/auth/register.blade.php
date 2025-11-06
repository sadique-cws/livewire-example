<div class="flex items-center justify-center min-h-screen bg-gray-100">
    {{-- Care about people's approval and you will be their prisoner. --}}
    <form wire:submit.prevent="register" class=" w-3/12 h-auto mx-auto mt-10 p-6 border border-gray-300 rounded-lg shadow-lg">
        <h2 class="text-2xl font-bold mb-6 text-center">Register</h2>

        @if (session()->has('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        @if(session()->has('message'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('message') }}
            </div>
        @endif

        <div class="mb-4">
            <label for="name" class="block text-gray-700 mb-2">Name:</label>
            <input type="text" id="name" wire:model.live="name" class="w-full p-2 border border-gray-300 rounded" required>
            @error('name') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 mb-2">Email:</label>
            <input type="email" id="email" wire:model.live="email" class="w-full p-2 border border-gray-300 rounded" required>
            @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-6">
            <label for="password" class="block text-gray-700 mb-2">Password:</label>
            <input type="password" id="password" wire:model.live="password" class="w-full p-2 border border-gray-300 rounded" required>
            @error('password') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full bg-green-500 text-white p-2 rounded hover:bg-green-600">Register</button>
</div>
