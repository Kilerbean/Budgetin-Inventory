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

<form method="post" action="{{ route('profile.update') }}" class="space-y-6">
    @csrf
    @method('patch')

    <div>
        <label class="form-label">Nama</label>
        <input class="form-control form-control-lg" type="text" name="name" placeholder="Enter your name"
            autocomplete="name" value="{{ old('name', $user->name) }}" />
        <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
    </div>

    <div>
        <label class="form-label">Email</label>
        <input class="form-control form-control-lg" type="email" name="email" placeholder="Enter your email"
            autocomplete="email" value="{{ old('email', $user->email) }}" />
        
        <x-input-error class="mt-2 text-danger" :messages="$errors->get('email')" />
        @if (!$user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification"
                        class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if (session('status') === 'verification-link-sent')
                    <p class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            </div>
        @endif
    </div>

    <div class="flex items-center gap-4">
        <button type="submit" class="btn btn-xs btn-primary mt-4">Save</button>

        @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-success">{{ __('Saved.') }}</p>
        @endif
    </div>
</form>
