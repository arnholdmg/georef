<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        <img class="block h-20 w-auto" src="{{ url('logo.png')}}" />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Está é uma área segura da aplicação. Por favor confirme sua senha antes de continuar.
        </div>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                <x-jet-label for="password" value="Senha" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            <div class="flex justify-end mt-4">
                <x-jet-button class="ml-4">
                    Confirmar
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
