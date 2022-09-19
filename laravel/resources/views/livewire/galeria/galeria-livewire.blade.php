<div>

    <div class="p-2 sm:px-20 bg-white border-b border-gray-200">
        <div class="mt-2 text-gray-500">

            <form wire:submit.prevent="agregar" enctype="multipart/form-data">
                <div class="mb-2">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Titulo</label>
                        <input wire:model="title"  type="text" id="title" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Agrega el titulo">
                        @error('title')
                            <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                                <span class="font-medium">Error: </span> {{ $message }}
                            </div>
                        @enderror
                </div>
                <div class="mb-2">
                    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Descripción</label>
                    <input type="text" wire:model="body" id="body" class="block p-2 w-full text-gray-900 bg-gray-50 rounded-lg border border-gray-300 sm:text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Agrega la descripción">
                    @error('body')
                        <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                            <span class="font-medium">Error: </span> {{ $message }}
                        </div>
                    @enderror
            </div>
                <div class="mb-2">
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="file_input">Upload file</label>
                    @if ($imagen)
                        Imagen Preview:
                        <img src="{{ $imagen->temporaryUrl() }}" width="200" height="200">
                    @endif
                    <input wire:model="imagen" id="imagen" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file">
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400 px).</p>
                @error('imagen')
                    <div class="p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <span class="font-medium">Error: </span> {{ $message }}
                    </div>
                @enderror
                </div>
                <button type="button" wire:click="agregar" class="py-2 px-3 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Agregar</button>
            </form>

        </div>
    </div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-none md:grid-cols-none">
    <div class="p-6">
        <div class="flex flex-wrap">
            @foreach ($galerias as $item)

                        <div class="max-w-sm bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                        <img class="rounded-t-lg"
                        src="@if($item->image == 'empty'){{Storage::url('default.svg')}}"
                            @else {{Storage::url($item->image)}}"
                            @endif
                        alt="">
                            <div class="p-5">
                            <h6 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$item->id}}.- {{$item->title}}</h6>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$item->body}}</p>
                            <button wire:click="destroy({{$item->id}})" type="button" class="py-2 px-3 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Eliminar</button>
                            </div>
                    </div>

            @endforeach
        </div>
            <br>

             {{$galerias->links()}}
    </div>
</div>


</div>
