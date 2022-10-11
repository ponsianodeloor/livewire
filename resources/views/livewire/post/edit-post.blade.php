<div>
    <a wire:click="$set('open_modal', true)"><i class="fa fa-edit"></i></a>

    <x-jet-dialog-modal wire:model="open_modal">
        <x-slot name="title">
            Editar Post
        </x-slot>

        <x-slot name="content">

            <div class="mb-4">
                @if($url_image)
                    <img src="{{$url_image->temporaryUrl()}}">
                @else
                    @if(str_contains($post->url_image, 'posts/'))
                        <img src="{{asset($post->url_image)}}">
                    @else
                        <img src="{{$post->url_image}}">
                    @endif
                @endif
            </div>

            <div wire:loading wire:target="url_image" class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Cargando Imagen</strong>
                <span class="block sm:inline">Espere mientras se carga la imagen.</span>
            </div>

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

            <div class="mb-4">
                <input type="file" wire:model="url_image" id="{{$id_url_image}}">
                <x-jetstream::input-error for="url_image" />

                {{$post->url_image}}
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
