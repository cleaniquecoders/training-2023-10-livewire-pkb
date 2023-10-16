<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <form wire:submit="save" class="bg-white p-8 rounded-sm shadow-md">
                <div>
                    <x-label for="name" value="{{ __('Name') }}" />
                    <x-input wire:model="name" class="block mt-1 w-full" type="text" name="name"  />
                    <x-input-error for="name" class="mt-2" />
                </div>

                <div class="mt-4">
                    <x-label for="email" value="{{ __('Email') }}" />
                    <x-input wire:model="email" class="block mt-1 w-full" type="email" name="email"  />
                    <x-input-error for="email" class="mt-2" />
                </div>

                <div>
                    <x-label for="subject" value="{{ __('Subject') }}" />
                    <x-input wire:model="subject" class="block mt-1 w-full" type="text" name="subject"  />
                    <x-input-error for="subject" class="mt-2" />
                </div>

                <div>
                    <x-label for="message" value="{{ __('Message') }}" />
                    <textarea wire:model="message" class="block mt-1 w-full border-gray-300 dark:border-gray-700" name="message"  rows="7"></textarea>
                    <x-input-error for="message" class="mt-2" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <x-action-message class="mr-3" on="saved">
                        {{ __('Thank you for contacting us..') }}
                    </x-action-message>

                    <x-button class="ml-4">
                        {{ __('Submit') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</div>
