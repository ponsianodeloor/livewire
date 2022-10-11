<div>
    <a wire:click="$set('open_modal', true)"><i class="fa fa-edit"></i></a>

    <x-jet-dialog-modal wire:model="open_modal">
        <x-slot name="title">
            Editar Post
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                <x-jet-label value="Titulo del post"/>
                <!-- se usa wire:model.refer cuando no se requiere interpolacion-->
                <x-jet-input type="text" class="w-full mb-4" wire:model="post.title"/>
                {{$post->title}}

            </div>

            <div class="mb4">
                <x-jet-label value="Contenido del Post"/>
                <x-textarea class="w-full" wire:model="post.content"></x-textarea>
                {{$post->content}}

            </div>

        </x-slot>

        <x-slot name="footer">

            <x-jet-secondary-button class="mr-2" wire:click="$set('open_modal', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="actualizarPost()" wire:loading.attr="disabled" wire:target="actualizarPost" class="disabled:opacity-25">
                Guardar Post
            </x-jet-danger-button>

        </x-slot>
    </x-jet-dialog-modal>
</div>
