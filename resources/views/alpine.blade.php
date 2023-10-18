<x-guest-layout>
    <div class="flex justify-center mx-auto my-8 max-w-7xl">
        <div x-data="{ count: 0 }">
            <p class="text-center flex" x-text="count"></p>
            <div>
                <x-button x-on:click="count++">Increment</x-button>
                <x-button x-on:click="count--">Decrement</x-button>
            </div>
        </div>
    </div>
</x-guest-layout>
