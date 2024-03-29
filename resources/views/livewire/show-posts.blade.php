<div wire:init="loadPosts">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-5">
        <div class="flex px-6 py-5">
            <div class="mb-3 xl:w-96">
                <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">Busqueda</label>
                <!--
                <input type="text" name="txt_search" wire:model="txt_search" class="form-control rounded" placeholder="Search"/>
                -->
                <x-jet-input wire:model="txt_search" name="txt_search" type="text" class="w-full mb-6"></x-jet-input>
                <label for="exampleText0" class="form-label inline-block mb-2 text-gray-700">{{$txt_search}}</label>
                @livewire('post.create-post')
            </div>
        </div>
        <x-tabla>
            @if(count($posts)) <!-- $posts->count() -->
                <table class="w-full table-auto">
                    <thead>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th colspan="5" class="py-3 px-6  text-left cursor-pointer">
                            <x-jet-label>Cantidad Registros </x-jet-label>
                            <select class="block mt-1 w-full" wire:model="cantRegistros">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="100">100</option>
                            </select>
                        </th>
                    </tr>
                    <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                        <th class="py-3 px-6  text-left cursor-pointer"   wire:click="order('id')">
                            ID
                            @if($column == 'id')
                                @if($orderBy == 'ASC')
                                    <i class="fa fa-sort-amount-desc"></i>
                                @else
                                    <i class="fa fa-sort-amount-asc"></i>
                                @endif
                            @else
                                <i class="fa fa-sort"></i>
                            @endif
                        </th>
                        <th class="py-3 px-6 text-left cursor-pointer"   wire:click="order('title')">
                            Title
                            @if($column == 'title')
                                @if($orderBy == 'ASC')
                                    <i class="fa fa-sort-alpha-asc"></i>
                                    @else
                                    <i class="fa fa-sort-alpha-desc"></i>
                                @endif
                                @else
                                <i class="fa fa-sort"></i>
                            @endif
                        </th>
                        <th class="py-3 px-6 text-center cursor-pointer" wire:click="order('content')">
                            Content
                            @if($column == 'content')
                                @if($orderBy == 'ASC')
                                    <i class="fa fa-sort-alpha-asc"></i>
                                @else
                                    <i class="fa fa-sort-alpha-desc"></i>
                                @endif
                            @else
                                <i class="fa fa-sort"></i>
                            @endif
                        </th>
                        <th class="py-3 px-6 text-center">Image</th>
                        <th class="py-3 px-6 text-center">Actions</th>
                    </tr>
                    </thead>
                    <tbody class="text-gray-600 text-sm font-light">
                    @foreach($posts as $post)
                        <tr class="border-b border-gray-200 hover:bg-gray-100">
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span class="font-medium">{{$post->id}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-left">
                                <div class="flex items-center">
                                    <span>{{$post->title}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    <span>{{$post->content}}</span>
                                </div>
                            </td>
                            <td class="py-3 px-6 text-center">
                                <div class="flex items-center">
                                    <span>
                                        @if(str_contains($post->url_image, 'posts/'))
                                            <img src="{{asset($post->url_image)}}">
                                        @else
                                            <img src="{{$post->url_image}}">
                                        @endif
                                    </span>
                                </div>
                            </td>
                            <td class="py-3 px-6">
                                <div class="flex item-center justify-center">
                                    <a href="#"><i class="fa fa-eye"></i></a>
                                    @livewire('post.edit-post', ['post'=>$post], key($post->id))
                                    @livewire('post.delete-post', ['post'=>$post], key($post->id))
                                    <a wire:click="$emit('deletePost', {{$post->id}})"><i class="fa fa-trash"></i></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                @if($posts->hasPages())
                    <div class="px-6 py-3">
                        {{$posts->links()}}
                    </div>
                @endif
            @else
                <h1>No se encuentran registros</h1>
            @endif
        </x-tabla>
    </div>
    <x-jet-dialog-modal>
        <x-slot name="title">

        </x-slot>

        <x-slot name="content">

        </x-slot>

        <x-slot name="footer">

        </x-slot>

    </x-jet-dialog-modal>

    @push('js')
        <script>
            Livewire.on('deletePost', postId=>{
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Livewire.emitTo('show-posts', 'delete', postId);
                        //console.log(postId);
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                    }
                });
            });
        </script>
    @endpush
</div>
