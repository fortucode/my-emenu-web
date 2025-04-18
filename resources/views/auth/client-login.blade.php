<x-guest-layout>
    <form method="POST" action="{{ route('client.login') }}">
        @csrf

        <x-input-label for="email" :value="'Email'" />
        <x-text-input id="email" name="email" type="email" required />

        <x-input-label for="password" :value="'Mot de passe'" class="mt-4" />
        <x-text-input id="password" name="password" type="password" required />

        <button class="btn btn-primary mt-4">Connexion</button>
    </form>
</x-guest-layout>
