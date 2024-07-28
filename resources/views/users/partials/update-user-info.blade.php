<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Información del Usuario') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualiza la informacion del usuario") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('user.update', ['id' => $user->id]) }}" class="mt-6 space-y-6">
    @csrf
    @method('patch')

    <div>
        <x-input-label for="name" :value="__('Nombre')" />
        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
        <x-input-error class="mt-2" :messages="$errors->get('name')" />
    </div>

    <div>
        <x-input-label for="email" :value="__('Email')" />
        <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
        <x-input-error class="mt-2" :messages="$errors->get('email')" />

        @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
            <div>
                <p class="text-sm mt-2 text-gray-800">
                    {{ __('Your email address is unverified.') }}

                    <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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

    <div>
        <x-input-label for="phone" :value="__('Teléfono')" />
        <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('phone')" />
    </div>

    <div>
        <x-input-label for="adress" :value="__('Dirección')" />
        <x-text-input id="adress" name="adress" type="text" class="mt-1 block w-full" :value="old('adress', $user->adress)" required autofocus />
        <x-input-error class="mt-2" :messages="$errors->get('adress')" />
    </div>
    <div>
    <x-input-label for="role" :value="__('Administrador')" />
    <input id="role" name="role" type="checkbox" class="form-check-input" value="admin"
    @if(old('role', $user->role) === 'admin') checked @endif autofocus />


        <x-input-error class="mt-2" :messages="$errors->get('role')" />
    </div>

    <div class="flex items-center gap-4">
        <x-primary-button>{{ __('Guardar') }}</x-primary-button>

        @if (session('status') === 'user-updated')
            <p
                x-data="{ show: true }"
                x-show="show"
                x-transition
                x-init="setTimeout(() => show = false, 2000)"
                class="text-sm text-gray-600"
            >{{ __('Guardado.') }}</p>
        @endif
    </div>
</form>

</section>