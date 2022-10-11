<div>
    <a wire:click="$set('open_modal', true)"><i class="fa fa-edit"></i></a>

    <x-jet-dialog-modal wire:model="open_modal">
        <x-slot name="title">
            Editar Post
        </x-slot>

        <x-slot name="content">

        </x-slot>

        <x-slot name="footer">

        </x-slot>
    </x-jet-dialog-modal>
</div>
