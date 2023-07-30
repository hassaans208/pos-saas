<div class="px-7 bg-white border w-full border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="flex  flex-row my-2 items-center justify-between">
        <div>
            <h3 class="text-2xl font-semibold dark:text-white text-black">{{$title}}</h3>
        </div>
        @if ($create)
        <a href="{{route($createRoute ? $createRoute: \Request::route()->getName())}}">
            <button type="button" class="my-2 justify-self-end focus:outline-none text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-sm text-sm px-5 py-2.5 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-900">
                Create {{$title}}
            </button>
        </a>    
        @endif
        
    
    </div>
    <hr>
        <div class="relative overflow-x-auto">
    
            <table id="datatable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                {{-- <div class="flex flex-row justify-end	"> --}}
{{-- <div></div> --}}
                @if($action)
                <div class="flex flex-row justify-end	  w-full gap-x-1">
                @if($print)
                    <a href="">
                        <button title="Print {{$title}}" class="rounded-sm transition delay-100 dark:hover:scale-105 hover:scale-105 dark:hover:bg-opacity-100 hover:bg-opacity-100 bg-opacity-60 dark:hover:bg-indigo-500 hover:bg-indigo-500 dark:hover:text-white hover:text-black  dark:bg-white bg-black text-indigo-500 dark:bg-opacity-60 w-10 dark:text-indigo-500 px-2 py-2"><i class="fa-solid fa-print"></i></button>
                    </a>
                @endif
                @if($excel)
                    <a href="">
                        <button title="Convert {{$title}} Excel" class="rounded-sm transition delay-100 dark:hover:scale-105 hover:scale-105 dark:hover:bg-opacity-100 hover:bg-opacity-100 bg-opacity-60 dark:hover:bg-indigo-500 hover:bg-indigo-500 dark:hover:text-white hover:text-black  dark:bg-white bg-black text-indigo-500 dark:bg-opacity-60 w-10 dark:text-indigo-500 px-2 py-2">
                            <i class="fa-solid fa-file-excel"></i>
                        </button>
                    </a>
                @endif
                @if($pdf)
                    <a href="">
                        <button title="Convert {{$title}} PDF" class="rounded-sm transition delay-100 dark:hover:scale-105 hover:scale-105 dark:hover:bg-opacity-100 hover:bg-opacity-100 bg-opacity-60 dark:hover:bg-indigo-500 hover:bg-indigo-500 dark:hover:text-white hover:text-black  dark:bg-white bg-black text-indigo-500 dark:bg-opacity-60 w-10 dark:text-indigo-500 px-2 py-2">
                            <i class="fa-solid fa-file-pdf"></i>
                        </button>
                    </a>
                @endif
                @if($docx)
                    <a href="">
                        <button title="Convert {{$title}} Docx" class="rounded-sm transition delay-100 dark:hover:scale-105 hover:scale-105 dark:hover:bg-opacity-100 hover:bg-opacity-100 bg-opacity-60 dark:hover:bg-indigo-500 hover:bg-indigo-500 dark:hover:text-white hover:text-black  dark:bg-white bg-black text-indigo-500 dark:bg-opacity-60 w-10 dark:text-indigo-500 px-2 py-2">
                            <i class="fa-solid fa-file-word"></i>
                        </button>
                    </a>
                @endif
                @if($reload)
                    <a href="">
                        <button title="Reload {{$title}}" class="rounded-sm transition delay-100 dark:hover:scale-105 hover:scale-105 dark:hover:bg-opacity-100 hover:bg-opacity-100 bg-opacity-60 dark:hover:bg-indigo-500 hover:bg-indigo-500 dark:hover:text-white hover:text-black  dark:bg-white bg-black text-indigo-500 dark:bg-opacity-60 w-10 dark:text-indigo-500 px-2 py-2">
                            <i class="fa-solid fa-rotate-right"></i>
                        </button>
                    </a>
                @endif

                {{-- </div> --}}
            </div>

                @endif
                <thead class="text-xs text-gray-900 uppercase dark:text-gray-400">
                    <tr>
                        @foreach ($head as $item)
                            <th scope="col" class="px-6 py-3">
                                {{$item}}
                            </th>
                        @endforeach       
                    </tr>
                </thead>
                <tbody class="text-base text-gray-900 dark:text-gray-400">
                    @foreach ($collection as $item)
                    <tr class="bg-white border-1 dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    @foreach ($row as $name)
                        <td class="px-6 py-3">{{$item->$name}}</td>
                    @endforeach
                        <td class="px-6 py-3">
                            @if ($edit)
                            <a href="{{route($editRoute ? $editRoute: \Request::route()->getName())}}">

                                <button title="Edit" type="button" class="my-1 justify-self-end focus:outline-none text-white bg-indigo-700 hover:bg-indigo-800 focus:ring-4 focus:ring-indigo-300 font-medium rounded-sm text-sm px-5 py-2.5 mb-2 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-900">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </button>    
                            </a>
                            @endif
                            @if ($delete)
                            <a href="{{route($deleteRoute ? $deleteRoute: \Request::route()->getName())}}">
                                <button title="Delete" type="button" class="my-1 justify-self-end focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-sm text-sm px-5 py-2.5 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                    <i class="fa-solid fa-trash"></i>
                                </button>  
                            </a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    
    </div>
    