<div class="flex">
    <nav class="bg-gray-800 w-full">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <a wire:navigate href="{{ url('/') }}" class="text-white font-bold text-xl">{{ config('app.name', 'Laravel') }}</a>   
                </div>
                <div class="flex space-x-4">
                    @guest
                        <a wire:navigate href="{{ url('/login') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Login</a>
                        <a wire:navigate href="{{ url('/register') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Register</a>
                    @else
                        <span class="text-gray-300 px-3 py-2 rounded-md text-sm font-medium">Hello, {{ Auth::user()->name }}</span>
                        <a wire:navigate href="{{ route('logout') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">Logout</a>
                    @endguest
            </div>
        </div>
    </nav>
</div>