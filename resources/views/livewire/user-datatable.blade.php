<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div>
        {{-- Search / Filter Components --}}
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <x-input wire:model.live.debounce.500ms="search" class="w-full"
                placeholder="Search user by name or email..." />

            <div class="flex justify-end gap-2 mt-4">

                <div class="flex justify-between">
                    <select wire:model.live="isActive"
                        class=" border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-gray-500 dark:focus:border-gray-600 focus:ring-gray-500 dark:focus:ring-gray-600 rounded-md shadow-sm">
                        <option value="">All</option>
                        <option value="1">Active</option>
                        <option value="2">Inactive</option>
                    </select>
                </div>

            </div>
        </div>

        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex justify-end gap-2 mt-4">

                <x-button wire:click="updateUsersStatus(1)">Set As Active</x-button>
                <x-button wire:click="updateUsersStatus(0)">Set As Inactive</x-button>

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
            <div class="bg-white border border-slate-300 rounded-md shadow-md m-4">
                <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead>
                            <tr>
                                <th scope="col">

                                </th>
                                <th scope="col" wire:click="setSort('name')"
                                    class="cursor-pointer py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900">
                                    <x-sortable :sortDirection="$sortDirection" label="Name" :show="$sortBy == 'name'"  />
                                </th>
                                <th wire:click="setSort('email')" scope="col"
                                    class="cursor-pointer px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    <x-sortable :sortDirection="$sortDirection" label="E-mail" :show="$sortBy == 'email'"  />
                                </th>
                                <th wire:click="setSort('is_active')" scope="col"
                                    class="cursor-pointer px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                    <x-sortable :sortDirection="$sortDirection" label="Status" :show="$sortBy == 'is_active'"  />
                                </th>
                                <th scope="col" class="px-3 py-3.5 text-sm font-semibold text-gray-900 text-center">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <tr>
                                <td>
                                    <p class="text-center italic my-4 py-4 text-sm w-full" wire:loading>
                                        Populating data...
                                    </p>
                                </td>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                        <input type="checkbox" wire:model="selectedRows.{{ $user->id }}"
                                            {{ in_array($user->id, $selectedRows) ? 'checked' : '' }} />
                                    </td>
                                    <td
                                        class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-0">
                                        {{ $user->name }}</td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">{{ $user->email }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                        {{ $user->is_active ? 'Active' : 'Inactive' }}
                                    </td>
                                    <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500 justify-around flex">

                                        <x-secondary-button class="mx-2"
                                            onclick="confirm('Are you sure want to set status {{ $user->name }} to {{ $user->is_active ? 'inactive' : 'active' }} ?') || event.stopImmediatePropagation()"
                                            wire:click="setStatus({{ $user->id }}, {{ $user->is_active ? 0 : 1 }})">
                                            Set {{ $user->is_active ? 'Inactive' : 'Active' }}
                                        </x-secondary-button>
                                        <x-secondary-button class="mx-2">
                                            View
                                        </x-secondary-button>
                                        <x-button class="mx-2">
                                            Update
                                        </x-button>
                                        <x-button
                                            onclick="confirm('Are you sure want to delete {{ $user->name }} ?') || event.stopImmediatePropagation()"
                                            wire:click="removeUser({{ $user->id }})" class="bg-red-700 mx-2">
                                            Delete
                                        </x-button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
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
