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


    <div class="flex justify-center mx-auto my-8 max-w-7xl">
        <div x-data="{
            open: false,
            toggle() {
                if (this.open) {
                    return this.close()
                }

                this.$refs.button.focus()

                this.open = true
            },
            close(focusAfter) {
                if (!this.open) return

                this.open = false

                focusAfter && focusAfter.focus()
            }
        }" x-on:keydown.escape.prevent.stop="close($refs.button)"
            x-on:focusin.window="! $refs.panel.contains($event.target) && close()" x-id="['dropdown-button']"
            class="relative">
            <!-- Button -->
            <button x-ref="button" x-on:click="toggle()" :aria-expanded="open" :aria-controls="$id('dropdown-button')"
                type="button" class="flex items-center gap-2 bg-white px-5 py-2.5 rounded-md shadow">
                Options

                <!-- Heroicon: chevron-down -->
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Panel -->
            <div x-ref="panel" x-show="open" x-transition.origin.top.left x-on:click.outside="close($refs.button)"
                :id="$id('dropdown-button')" style="display: none;"
                class="absolute left-0 mt-2 w-40 rounded-md bg-white shadow-md">
                <a href="#"
                    class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                    New Task
                </a>

                <a href="#"
                    class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                    Edit Task
                </a>

                <a href="#"
                    class="flex items-center gap-2 w-full first-of-type:rounded-t-md last-of-type:rounded-b-md px-4 py-2.5 text-left text-sm hover:bg-gray-50 disabled:text-gray-500">
                    <span class="text-red-600">Delete Task</span>
                </a>
            </div>

            <x-alpine.dropdown>
                <x-alpine.dropdown-link>New Task</x-alpine.dropdown-link>
                <x-alpine.dropdown-link>Edit Task</x-alpine.dropdown-link>
                <x-alpine.dropdown-link url="https://google.com">Google</x-alpine.dropdown-link>
            </x-alpine.dropdown>
        </div>


    </div>

    <div class="flex justify-center mx-auto my-8 max-w-7xl">
        <div x-data="{ open: false }" class="bg-white mx-4 my-2 w-1/2 p-4 shadow-md space-y-4 max-w-7xl">

            <div class="flex justify-between space-x-2 ">
                <span class="text-3xl">Question 1</span>
                {{-- <x-button @click="open = ! open">Toggle</x-button> --}}
                <span x-show="open" aria-hidden="true" @click="open = false"
                    class="ml-4 text-2xl cursor-pointer hover:bg-slate-300 hover:text-slate-700 hover:rounded hover:shadow-sm px-4 hover:text-white">&minus;</span>
                <span x-show="!open" aria-hidden="true" @click="open = true"
                    class="ml-4 text-2xl cursor-pointer hover:bg-slate-300 hover:text-slate-700 hover:rounded hover:shadow-sm px-4 hover:text-white">&plus;</span>
            </div>

            <div x-show="open">
                <p class="my-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc condimentum tincidunt
                    gravida. Etiam vel consectetur purus. Donec tincidunt id ligula ut accumsan. Sed semper hendrerit
                    justo, at dapibus velit interdum sed. Sed in eros sit amet elit aliquet varius non placerat nisl.
                    Integer congue mi vitae lectus malesuada, eget tempor nisi fringilla. Vestibulum laoreet nisi ut
                    sapien sollicitudin vehicula. Integer eget justo venenatis, ullamcorper nulla in, rutrum leo. Donec
                    id convallis lacus, vitae pharetra elit.</p>

                <p class="my-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc condimentum tincidunt
                    gravida. Etiam vel consectetur purus. Donec tincidunt id ligula ut accumsan. Sed semper hendrerit
                    justo, at dapibus velit interdum sed. Sed in eros sit amet elit aliquet varius non placerat nisl.
                    Integer congue mi vitae lectus malesuada, eget tempor nisi fringilla. Vestibulum laoreet nisi ut
                    sapien sollicitudin vehicula. Integer eget justo venenatis, ullamcorper nulla in, rutrum leo. Donec
                    id convallis lacus, vitae pharetra elit.</p>

                <p class="my-2">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc condimentum tincidunt
                    gravida. Etiam vel consectetur purus. Donec tincidunt id ligula ut accumsan. Sed semper hendrerit
                    justo, at dapibus velit interdum sed. Sed in eros sit amet elit aliquet varius non placerat nisl.
                    Integer congue mi vitae lectus malesuada, eget tempor nisi fringilla. Vestibulum laoreet nisi ut
                    sapien sollicitudin vehicula. Integer eget justo venenatis, ullamcorper nulla in, rutrum leo. Donec
                    id convallis lacus, vitae pharetra elit.</p>
            </div>

        </div>
    </div>
</x-guest-layout>
