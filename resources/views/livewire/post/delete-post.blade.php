<div>
    <a wire:click="$set('open_modal', true)">
        <i class="fa fa-trash"></i>
    </a>

    <x-jet-dialog-modal wire:model="open_modal">
        <x-slot name="title">
            Desea eliminar el registro
        </x-slot>

        <x-slot name="content">
            Confirmar la eliminacion del Registro {{$postDelete->id}}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open_modal', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="eliminarPost()" wire:loading.attr="disabled" wire:target="eliminarPost" class="disabled:opacity-25">
                Eliminar Post
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</div>
