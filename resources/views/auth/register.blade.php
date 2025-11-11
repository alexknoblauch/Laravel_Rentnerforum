<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center px-4">
        <form method="POST" action="{{ route('register') }}" class="w-full max-w-md bg-white p-8 rounded-2xl shadow-lg space-y-6">
            @csrf

            <h2 class="text-2xl font-bold text-center text-gray-800">Konto erstellen</h2>

            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <x-text-input id="name" class="mt-1 w-full rounded-xl" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                <x-input-error :messages="$errors->get('name')" class="mt-1 text-sm text-red-500" />
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <x-text-input id="email" class="mt-1 w-full rounded-xl" type="email" name="email" :value="old('email')" required autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-1 text-sm text-red-500" />
            </div>

            <!-- Password -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Passwort</label>
                <x-text-input id="password" class="mt-1 w-full rounded-xl" type="password" name="password" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-1 text-sm text-red-500" />
            </div>

            <!-- Confirm Password -->
            <div>
                <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Passwort bestätigen</label>
                <x-text-input id="password_confirmation" class="mt-1 w-full rounded-xl" type="password" name="password_confirmation" required autocomplete="new-password" />
                <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-sm text-red-500" />
            </div>

            <!-- Submit -->
            <div class="flex items-center justify-between flex-col p-2">
                <x-primary-button class="rounded-xl px-4 py-2 bg-blue-600 hover:bg-blue-700">
                    {{ __('Registrieren') }}
                </x-primary-button>
                <a href="{{ route('login') }}" class="text-sm text-blue-600 hover:underline mt-2">Bereits registriert?</a>
            </div>
        </form>
    </div>
</x-guest-layout>
