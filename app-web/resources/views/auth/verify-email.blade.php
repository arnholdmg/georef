<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
        <img class="block h-20 w-auto" src="{{ url('logo.png')}}" />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            Antes de continuar, cheque seu e-Mail e clique no link que lhe enviamos. Se você não o recebeu, nós podemos lhe enviar outro.
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                Um novo link de verificação foi enviado ao seu endereço de e-Mail cadastrado.
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        Reenviar e-Mail de verificação
                    </x-jet-button>
                </div>
            </form>

            <div>
                <a
                    href="{{ route('profile.show') }}"
                    class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                    Editar perfil</a>

                <form method="POST" action="{{ route('logout') }}" class="inline">
                    @csrf

                    <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900 ml-2">
                        Sair
                    </button>
                </form>
            </div>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
