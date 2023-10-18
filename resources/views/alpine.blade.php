<x-guest-layout>
    <div class="flex justify-center mx-auto my-8 max-w-7xl">
        <div x-data="{ count: 0 }">
            <p class="text-center w-full" x-text="count"></p>
            <div class="space-4">
                <x-button x-on:click="count++">Increment</x-button>
                <x-button x-on:click="count--">Decrement</x-button>
            </div>
        </div>
    </div>

    <div class="flex justify-center mx-auto my-8 max-w-7xl">
        <div x-data="{ open: false }">
            <x-button @click="open = ! open">Toggle</x-button>
            <div x-show="open" @click.outside="open = false">
                <ul class="bg-slate-50 border border-slate-700 rounded-md shadow-md my-2">
                    <li class="rounded text-center hover:bg-slate-300">
                        <a href="https://google.com">Google</a>
                    </li>
                    <li class="rounded text-center hover:bg-slate-300">
                        <a href="https://google.com">Google</a>
                    </li>
                    <li class="rounded text-center hover:bg-slate-300">
                        <a href="https://google.com">Google</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="flex justify-center mx-auto my-8 max-w-7xl">
        <div x-data="{
            search: '',

            items: ['foo', 'bar', 'baz'],

            get filteredItems() {
                return this.items.filter(
                    i => i.startsWith(this.search)
                )
            }
        }">
            <input x-model="search" placeholder="Search..." class="rounded-md shadow-md">

            <ul class="bg-slate-50 border border-slate-700 rounded-md shadow-md my-2">
                <template x-for="item in filteredItems" :key="item">
                    <li class="rounded text-center hover:bg-slate-300" x-text="item"></li>
                </template>
            </ul>
        </div>
    </div>
</x-guest-layout>
