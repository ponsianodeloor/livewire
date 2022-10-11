<div>
    <x-jet-danger-button wire:click="$set('open', true)">
        Crear Post
    </x-jet-danger-button>

    <x-jet-dialog-modal wire:model="open">
        <x-slot name="title">
            Crear Nuevo Post
        </x-slot>

        <x-slot name="content">
            <div class="mb-4">
                <x-jet-label value="Titulo del post"/>
                <!-- se usa wire:model.refer cuando no se requiere interpolacion-->
                <x-jet-input type="text" name="title" class="w-full mb-4" wire:model="title"/>
                {{$title}}
                @error('title')
                    {{$message}}
                @enderror

                <x-jet-label value="Contenido del Post"/>
                <x-textarea name="content" class="w-full" wire:model="content"></x-textarea>
                {{$content}}
                <x-jetstream::input-error for="content"></x-jetstream::input-error>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="guardarPost()" wire:loading.attr="disabled" wire:target="guardarPost" class="disabled:opacity-25">
                Crear Post
            </x-jet-danger-button>

            <!--
            <span wire:loading wire:target="guardarPost">Cargando...</span>
            -->
        </x-slot>
    </x-jet-dialog-modal>
</div>
