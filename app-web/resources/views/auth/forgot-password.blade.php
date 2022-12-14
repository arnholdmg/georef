<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        <img class="block h-20 w-auto" src="{{ url('logo.png')}}" />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Esqueceu sua senha? Sem problemas. Informe seu endereço de e-Mail e nós lhe enviaremos um link para redefinir sua senha.
        </div>

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="e-Mail" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    Enviar link de redefinição de senha
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
