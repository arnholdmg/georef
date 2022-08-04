<x-jet-action-section>
    <x-slot name="title">
        Deletar Conta
    </x-slot>

    <x-slot name="description">
        Exclui sua conta permanentemente.
    </x-slot>

    <x-slot name="content">
        <div class="max-w-xl text-sm text-gray-600">
            Uma vez que sua conta é apagada, todo seu conteúdo e dados serão permanentemente excluídos.
        </div>

        <div class="mt-5">
            <x-jet-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                Deletar Conta
            </x-jet-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        <x-jet-dialog-modal wire:model="confirmingUserDeletion">
            <x-slot name="title">
                Deletar Conta
            </x-slot>

            <x-slot name="content">
                Você tem certeza que deseja deletar sua conta? Uma vez que sua conta é apagada, todo seu conteúdo e dados serão permanentemente excluídos. Por favor digite sua senha para confirmar que deseja apagar sua conta.

                <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    <x-jet-input type="password" class="mt-1 block w-3/4"
                                placeholder="Senha"
                                x-ref="password"
                                wire:model.defer="password"
                                wire:keydown.enter="deleteUser" />

                    <x-jet-input-error for="password" class="mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    Cancelar
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    Apagar Conta
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </x-slot>
</x-jet-action-section>
