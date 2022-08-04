<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        Informações do Usuário
    </x-slot>

    <x-slot name="description">
        Atualize o seu nome de usuário e conta de e-Mail.
    </x-slot>

    <x-slot name="form">

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="Nome" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="e-Mail" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    Seu endereço de e-Mail não é verificado.

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                        Clique aqui para reenviar o e-Mail de confirmação.
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        Um novo link de verificação foi enviado ao seu e-Mail.
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            Salvo.
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            Salvar
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
