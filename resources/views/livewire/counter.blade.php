<div>
    {{-- Be like water. --}}

    <h1>This is Counter</h1>

    <button class="bg-red-500 text-white px-6 py-2 rounded text-3xl" wire:click="minus">-</button>
    <span class="px-6 py-2 text-3xl">{{$count}}</span>
    <button class="bg-green-500 text-white px-6 py-2 rounded text-3xl" wire:click="add">+</button>
</div>
