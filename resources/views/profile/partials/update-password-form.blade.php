<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Update Password') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="space-y-6">
        @csrf
        @method('put')
       
        <div class="mb-3">
            <label class="form-label">Current Password</label>
            <input class="form-control form-control-sm" type="password" name="current_password"
                placeholder="Enter your current password"
                required/>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2 text-danger" />
        </div>    
        <div class="mb-3">
            <label class="form-label">New Password</label>
            <input class="form-control form-control-sm" type="password" name="password"
                placeholder="Enter your new password"
                required/>
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2 text-danger" />
        </div>    
        <div class="mb-3">
            <label class="form-label">Confirm Password</label>
            <input class="form-control form-control-sm" type="password" name="password_confirmation"
                placeholder="Confirm your new password"
                required/>
                <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2 text-danger" />
        </div>           
       

        <div class="flex items-center gap-4">
            <button type="submit" class="btn btn-xs btn-success mt-4">Change Password</button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-success"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
