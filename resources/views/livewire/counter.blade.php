<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Counter') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8 flex justify-center items-center gap-2">
            <x-button wire:click="increment">+</x-button>

            <x-button wire:click="decrement">-</x-button>

            <span class="text-2xl">{{ $count }}</span>
        </div>
    </div>

</div>
