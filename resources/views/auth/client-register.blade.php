<x-guest-layout>
    <form method="POST" action="{{ route('client.register') }}">
        @csrf

        <x-input-label for="name" :value="'Nom'" />
        <x-text-input id="name" name="name" type="text" required />

        <x-input-label for="email" :value="'Email'" class="mt-4" />
        <x-text-input id="email" name="email" type="email" required />

        <x-input-label for="password" :value="'Mot de passe'" class="mt-4" />
        <x-text-input id="password" name="password" type="password" required />

        <x-input-label for="password_confirmation" :value="'Confirmer'" class="mt-4" />
        <x-text-input id="password_confirmation" name="password_confirmation" type="password" required />

        <button class="btn btn-success mt-4">S'inscrire</button>
    </form>
</x-guest-layout>
