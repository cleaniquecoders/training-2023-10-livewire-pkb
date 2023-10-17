<div>
    <div class="m-4 flex">
        <p>{{ $user->name }}</p>
    </div>
    <div>
        <livewire:contact-us
            :email="$user->email"
            :name="$user->name" />
    </div>
</div>
