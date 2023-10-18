<li>
    <button :id="$id('tab', whichChild($el.parentElement, $refs.tablist))" @click="select($el.id)" @mousedown.prevent
        @focus="select($el.id)" type="button" :tabindex="isSelected($el.id) ? 0 : -1" :aria-selected="isSelected($el.id)"
        :class="isSelected($el.id) ? 'border-gray-200 bg-white' : 'border-transparent'"
        class="inline-flex rounded-t-md border-t border-l border-r px-5 py-2.5" role="tab">
        {{ $slot }}</button>
</li>
