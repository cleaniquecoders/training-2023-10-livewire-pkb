<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div>
        {{-- Search / Filter Components --}}
        <div class="max-w-7xl mx-4 py-10 sm:px-6 lg:px-8">
            <x-input wire:model.live.debounce.500ms="search" class="w-full"
                placeholder="Search user by name or email..." />

            <div class="flex justify-between">
                <span class="my-2">Search for: <span class="italic" x-text="$wire.search"></span></span>

                <div class="my-2" wire:loading>
                    Searching...
                </div>

            </div>
        </div>

        {{-- User Listing --}}
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex justify-between mx-4">
                <select wire:model.live="perPage"
                    class=" border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>

                {{ $users->links() }}
            </div>

            {{-- Listing here --}}
            <div>
                <ul role="list" class="divide-y divide-gray-100">
                    @forelse($users as $user)
                        <li class="mx-4 flex justify-between gap-x-6 py-5 m-4 bg-white shadow-md border border-slate-100">
                            <div class="flex min-w-0 gap-x-4 mx-4">
                                <img class="h-12 w-12 flex-none rounded-full bg-gray-50"
                                    src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}">
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold leading-6 text-gray-900">{{ $user->name }}</p>
                                    <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $user->email }}</p>
                                </div>
                            </div>
                            <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end mx-4">
                                <p class="text-sm leading-6 text-gray-900">Co-Founder / CEO</p>
                                <p class="mt-1 text-xs leading-5 text-gray-500">Last seen <time
                                        datetime="2023-01-23T13:23Z">3h ago</time>
                                </p>
                            </div>
                        </li>
                    @empty
                        <li class="text-center">No users found.</li>
                    @endforelse
                </ul>
            </div>

            <div class="flex justify-between mx-4">
                <select wire:model.live="perPage"
                    class=" border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>

                {{ $users->links() }}
            </div>
        </div>
    </div>
</div>
