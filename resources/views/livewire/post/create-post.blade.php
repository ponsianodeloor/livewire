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
                @if($url_image)
                    <img src="{{$url_image->temporaryUrl()}}">
                @endif
            </div>

            <div wire:loading wire:target="url_image" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Cargando Imagen</strong>
                <span class="block sm:inline">Espere mientras se carga la imagen.</span>
            </div>

            <div class="mb-4">
                <x-jet-label value="Titulo del post"/>
                <!-- se usa wire:model.refer cuando no se requiere interpolacion-->
                <x-jet-input type="text" name="title" class="w-full mb-4" wire:model="title"/>
                {{$title}}
                @error('title')
                    {{$message}}
                @enderror
            </div>

            <div class="mb4">

                <x-jet-label value="Contenido del Post"/>
                <x-textarea name="content" class="w-full" wire:model="content"></x-textarea>
                {{$content}}
                <x-jetstream::input-error for="content"></x-jetstream::input-error>
            </div>

            <div class="mb-4">
                <input type="file" wire:model="url_image" id="{{$id_url_image}}">
                <x-jetstream::input-error for="url_image" />
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button class="mr-2" wire:click="$set('open', false)">
                Cancelar
            </x-jet-secondary-button>
            <x-jet-danger-button wire:click="guardarPost()" wire:loading.attr="disabled" wire:target="guardarPost, url_image" class="disabled:opacity-25">
                Crear Post
            </x-jet-danger-button>

            <!--
            <span wire:loading wire:target="guardarPost">Cargando...</span>
            -->
        </x-slot>
    </x-jet-dialog-modal>
</div>
