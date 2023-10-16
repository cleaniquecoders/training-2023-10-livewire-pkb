<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Search') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-input wire:model.live.debounce.500ms="search" class="w-full"
                placeholder="Search user by name or email..." />

            <div class="flex justify-between">
                <span class="my-2">Search for: <span class="italic" x-text="$wire.search"></span></span>

                <div class="my-2" wire:loading>
                    Searching...
                </div>
                
            </div>

            <div class="max-h-72 overflow-y-auto my-4">

                <ul role="list" class="divide-y divide-gray-100">
                    @forelse($users as $user)
                        <li class="flex justify-between gap-x-6 py-5 m-4 bg-white shadow-md border border-slate-100">
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
        </div>
    </div>
</div>
