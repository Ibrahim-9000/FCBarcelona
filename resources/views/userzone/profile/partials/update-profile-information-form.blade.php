<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-breeze.input-label for="name" :value="__('Name')" />
            <x-breeze.text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" minlength="2" />
            <x-breeze.input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-breeze.input-label for="email" :value="__('Email')" />
            <x-breeze.text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-breeze.input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-breeze.input-label for="username" value="Username" />
            <x-breeze.text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)" />
            <x-breeze.input-error class="mt-2" :messages="$errors->get('username')" />
        </div>

        <div>
            <x-breeze.input-label for="birthday" value="Verjaardag" />
            <x-breeze.text-input id="birthday" name="birthday" type="date" class="mt-1 block w-full" :value="old('birthday', $user->birthday ? $user->birthday->format('Y-m-d') : '')" />
            <x-breeze.input-error class="mt-2" :messages="$errors->get('birthday')" />
        </div>

        <div>
            <x-breeze.input-label for="bio" value="Over mij" />
            <textarea id="bio" name="bio" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">{{ old('bio', $user->bio) }}</textarea>
            <x-breeze.input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div>
            <x-breeze.input-label for="avatar" value="Profielfoto" />
            @if($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" class="w-20 h-20 rounded-full mb-2 object-cover">
            @endif
            <input id="avatar" name="avatar" type="file" accept="image/*" class="mt-1 block w-full" />
            <x-breeze.input-error class="mt-2" :messages="$errors->get('avatar')" />
        </div>

        <div class="flex items-center gap-4">
            <x-breeze.primary-button>{{ __('Save') }}</x-breeze.primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                    {{ __('Saved.') }}
                </p>
            @endif
        </div>
    </form>
</section>