<div>
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
            @if($posts->count())
                <table class="w-full table-auto">
                    <thead>
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
                                <div class="flex item-center justify-center">
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                        </svg>
                                    </div>
                                    <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                <h1>No se encuentran registros</h1>
            @endif

        </x-tabla>
    </div>
</div>
