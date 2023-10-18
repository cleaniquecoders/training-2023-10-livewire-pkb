@props(['id' => 'toggle-label', 'inputName' => 'toggle'])

<div>
    <!-- Toggle -->
    <div x-data="{ value: false }" class="flex items-center justify-center" x-id="[$id]">
        <input type="hidden" name="{{ $inputName }}" :value="value">

        <!-- Label -->
        <label @click="$refs.toggle.click(); $refs.toggle.focus()" :id="$id($id)"
            class="text-gray-900 font-medium">
            {{ $slot }}
        </label>

        <!-- Button -->
        <button x-ref="toggle" @click="value = ! value" type="button" role="switch" :aria-checked="value"
            :aria-labelledby="$id($id)" :class="value ? 'bg-slate-400' : 'bg-slate-300'"
            class="relative ml-4 inline-flex w-14 rounded-full py-1 transition">
            <span :class="value ? 'translate-x-7' : 'translate-x-1'"
                class="bg-white h-6 w-6 rounded-full transition shadow-md" aria-hidden="true"></span>
        </button>
    </div>

</div>
