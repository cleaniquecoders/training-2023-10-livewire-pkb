<x-guest-layout>

    <div class="flex justify-center mx-auto my-8 max-w-7xl">
        <ul>
            <li class="my-2"><x-toggle id="send-notifications" inputName="sendNotifications">Send notifications</x-toggle></li>
            <li class="my-2"><x-toggle id="send-reply" inputName="sendReply">Send reply</x-toggle></li>
            <li class="my-2"><x-toggle id="enable-site" inputName="enableSite">Enable Website</x-toggle></li>
            <li class="my-2"><x-toggle id="dark-mode" inputName="darkmode">Dark Mode</x-toggle></li>
        </ul>
    </div>

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

    <div class="flex justify-center mx-auto my-8 max-w-7xl">

        <!-- Tabs -->
        <div x-data="{
            selectedId: null,
            init() {
                // Set the first available tab on the page on page load.
                this.$nextTick(() => this.select(this.$id('tab', 1)))
            },
            select(id) {
                this.selectedId = id
            },
            isSelected(id) {
                return this.selectedId === id
            },
            whichChild(el, parent) {
                return Array.from(parent.children).indexOf(el) + 1
            }
        }" x-id="['tab']" class="mx-auto max-w-3xl">
            <!-- Tab List -->
            <ul x-ref="tablist" @keydown.right.prevent.stop="$focus.wrap().next()"
                @keydown.home.prevent.stop="$focus.first()" @keydown.page-up.prevent.stop="$focus.first()"
                @keydown.left.prevent.stop="$focus.wrap().prev()" @keydown.end.prevent.stop="$focus.last()"
                @keydown.page-down.prevent.stop="$focus.last()" role="tablist" class="-mb-px flex items-stretch">
                <!-- Tab -->
                <li>
                    <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))" @click="select($el.id)"
                        @mousedown.prevent @focus="select($el.id)" type="button"
                        :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
                        :class="isSelected($el.id) ? 'border-gray-200 bg-white' : 'border-transparent'"
                        class="inline-flex rounded-t-md border-t border-l border-r px-5 py-2.5" role="tab">Tab
                        1</button>
                </li>

                <li>
                    <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))" @click="select($el.id)"
                        @mousedown.prevent @focus="select($el.id)" type="button"
                        :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
                        :class="isSelected($el.id) ? 'border-gray-200 bg-white' : 'border-transparent'"
                        class="inline-flex rounded-t-md border-t border-l border-r px-5 py-2.5" role="tab">Tab
                        2</button>
                </li>
            </ul>

            <!-- Panels -->
            <div role="tabpanels" class="rounded-b-md border border-gray-200 bg-white">
                <!-- Panel -->
                <section x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                    :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))" role="tabpanel" class="p-8">
                    <h2 class="text-xl font-bold">Tab 1 Content</h2>
                    <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio,
                        quo sequi error quibusdam quas temporibus animi sapiente eligendi! Deleniti minima velit
                        recusandae iure.</p>
                    <button class="mt-5 rounded-md border border-gray-200 px-4 py-2 text-sm">Something
                        focusable</button>
                </section>

                <section x-show="isSelected($id('tab', whichChild($el, $el.parentElement)))"
                    :aria-labelledby="$id('tab', whichChild($el, $el.parentElement))" role="tabpanel" class="p-8">
                    <h2 class="text-xl font-bold">Tab 2 Content</h2>
                    <p class="mt-2 text-gray-500">Fugiat odit alias, eaque optio quas nobis minima reiciendis
                        voluptate dolorem nisi facere debitis ea laboriosam vitae omnis ut voluptatum eos. Fugiat?
                    </p>
                    <button class="mt-5 rounded-md border border-gray-200 px-4 py-2 text-sm">Something else
                        focusable</button>
                </section>
            </div>
        </div>
    </div>

    <div class="flex justify-center mx-auto my-8 max-w-7xl">
        <x-tab>
            <x-slot name="navigation">
                <x-tab-nav>Tab 1</x-tab-nav>
                <x-tab-nav>Tab 2</x-tab-nav>
                <x-tab-nav>Tab 3</x-tab-nav>
            </x-slot>

            <x-tab-content>
                <h2 class="text-xl font-bold">Tab 1 Content</h2>
                <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio,
                    quo sequi error quibusdam quas temporibus animi sapiente eligendi! Deleniti minima velit
                    recusandae iure.</p>
                <button class="mt-5 rounded-md border border-gray-200 px-4 py-2 text-sm">Something
                    focusable</button>
            </x-tab-content>

            <x-tab-content>
                <h2 class="text-xl font-bold">Tab 2 Content</h2>
                <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio,
                    quo sequi error quibusdam quas temporibus animi sapiente eligendi! Deleniti minima velit
                    recusandae iure.</p>
                <button class="mt-5 rounded-md border border-gray-200 px-4 py-2 text-sm">Something
                    focusable</button>
            </x-tab-content>

            <x-tab-content>
                <h2 class="text-xl font-bold">Tab 3 Content</h2>
                <p class="mt-2 text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio,
                    quo sequi error quibusdam quas temporibus animi sapiente eligendi! Deleniti minima velit
                    recusandae iure.</p>
                <button class="mt-5 rounded-md border border-gray-200 px-4 py-2 text-sm">Something
                    focusable</button>
            </x-tab-content>
        </x-tab>
    </div>



</x-guest-layout>
