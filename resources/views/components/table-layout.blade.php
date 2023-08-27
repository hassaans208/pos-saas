<div class="w-full border border-gray-200 bg-white px-7 shadow dark:border-gray-700 dark:bg-gray-800">
				<div class="my-2 flex flex-row items-center justify-between">
								<div>
												<h3 class="text-2xl font-semibold text-black dark:text-white">{{ $title }}</h3>
								</div>
								@if ($create)
												<a href="{{ route($createRoute ? $createRoute : \Request::route()->getName()) }}">
																<button type="button"
																				class="my-2 mb-2 justify-self-end rounded-sm bg-indigo-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-900">
																				Create {{ $title }}
																</button>
												</a>
								@endif

				</div>
				<hr>
				<div class="relative overflow-x-auto">

								<table id="datatable" class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
												<div class="my-2 flex flex-row justify-center">
																<div class="basis-3/4">
																				<x-search-bar :options="$options" :label="$title"></x-search-bar>
																</div>
																@if ($action)
																				<div class="flex w-full flex-row justify-end gap-x-1">
																								@if ($print)
																												<a href="">
																																<button title="Print {{ $title }}"
																																				class="w-10 rounded-sm bg-black bg-opacity-60 px-2 py-2 text-indigo-500 transition delay-100 hover:scale-105 hover:bg-indigo-500 hover:bg-opacity-100 hover:text-black dark:bg-white dark:bg-opacity-60 dark:text-indigo-500 dark:hover:scale-105 dark:hover:bg-indigo-500 dark:hover:bg-opacity-100 dark:hover:text-white"><i
																																								class="fa-solid fa-print"></i></button>
																												</a>
																								@endif
																								@if ($excel)
																												<a href="">
																																<button title="Convert {{ $title }} Excel"
																																				class="w-10 rounded-sm bg-black bg-opacity-60 px-2 py-2 text-indigo-500 transition delay-100 hover:scale-105 hover:bg-indigo-500 hover:bg-opacity-100 hover:text-black dark:bg-white dark:bg-opacity-60 dark:text-indigo-500 dark:hover:scale-105 dark:hover:bg-indigo-500 dark:hover:bg-opacity-100 dark:hover:text-white">
																																				<i class="fa-solid fa-file-excel"></i>
																																</button>
																												</a>
																								@endif
																								@if ($pdf)
																												<a href="">
																																<button title="Convert {{ $title }} PDF"
																																				class="w-10 rounded-sm bg-black bg-opacity-60 px-2 py-2 text-indigo-500 transition delay-100 hover:scale-105 hover:bg-indigo-500 hover:bg-opacity-100 hover:text-black dark:bg-white dark:bg-opacity-60 dark:text-indigo-500 dark:hover:scale-105 dark:hover:bg-indigo-500 dark:hover:bg-opacity-100 dark:hover:text-white">
																																				<i class="fa-solid fa-file-pdf"></i>
																																</button>
																												</a>
																								@endif
																								@if ($docx)
																												<a href="">
																																<button title="Convert {{ $title }} Docx"
																																				class="w-10 rounded-sm bg-black bg-opacity-60 px-2 py-2 text-indigo-500 transition delay-100 hover:scale-105 hover:bg-indigo-500 hover:bg-opacity-100 hover:text-black dark:bg-white dark:bg-opacity-60 dark:text-indigo-500 dark:hover:scale-105 dark:hover:bg-indigo-500 dark:hover:bg-opacity-100 dark:hover:text-white">
																																				<i class="fa-solid fa-file-word"></i>
																																</button>
																												</a>
																								@endif
																								@if ($reload)
																												<a href="">
																																<button title="Reload {{ $title }}"
																																				class="w-10 rounded-sm bg-black bg-opacity-60 px-2 py-2 text-indigo-500 transition delay-100 hover:scale-105 hover:bg-indigo-500 hover:bg-opacity-100 hover:text-black dark:bg-white dark:bg-opacity-60 dark:text-indigo-500 dark:hover:scale-105 dark:hover:bg-indigo-500 dark:hover:bg-opacity-100 dark:hover:text-white">
																																				<i class="fa-solid fa-rotate-right"></i>
																																</button>
																												</a>
																								@endif

																				</div>
																@endif
												</div>
												<thead class="text-xs uppercase text-gray-900 dark:text-gray-400">
																<tr>
																				@foreach ($head as $item)
																								<th scope="col" class="px-6 py-3">
																												{{ $item }}
																								</th>
																				@endforeach
																</tr>
												</thead>
												<tbody class="text-base text-gray-900 dark:text-gray-400">
																@foreach ($collection as $item)
																				<tr
																								class="border-1 bg-white hover:bg-gray-50 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-600">
																								@foreach ($row as $name)
																												<td class="px-6 py-3">{{ $item->$name }}</td>
																								@endforeach
																								<td class="px-6 py-3">
																												@if ($edit)
																																<a href="{{ route($editRoute ? $editRoute : \Request::route()->getName()) }}">

																																				<button title="Edit" type="button"
																																								class="my-1 mb-2 justify-self-end rounded-sm bg-indigo-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-indigo-800 focus:outline-none focus:ring-4 focus:ring-indigo-300 dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-900">
																																								<i class="fa-solid fa-pen-to-square"></i>
																																				</button>
																																</a>
																												@endif
																												@if ($delete)
																																<a href="{{ route($deleteRoute ? $deleteRoute : \Request::route()->getName()) }}">
																																				<button title="Delete" type="button"
																																								class="my-1 mb-2 justify-self-end rounded-sm bg-red-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
																																								<i class="fa-solid fa-trash"></i>
																																				</button>
																																</a>
																												@endif
																								</td>
																				</tr>
																@endforeach
																@if ($collection->count() <= 0)
																				<tr>
																								<td colspan="{{ count($head) + 1 }}"
																												class="px-6 py-3 text-center text-gray-500 dark:text-gray-400">
																												No Data
																								</td>
																				</tr>
																@endif
												</tbody>

								</table>
								<hr>
								<div class="my-6 flex flex-row items-center justify-between">
												<!-- Help text -->
												<span class="text-sm text-gray-700 dark:text-gray-400">
																Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $collection->firstItem() }}</span>
																to <span class="font-semibold text-gray-900 dark:text-white">{{ $collection->lastItem() }}</span> of
																<span class="font-semibold text-gray-900 dark:text-white">{{ $collection->count() }}</span> Entries
												</span>
												<!-- Buttons -->
												@php
																$prev = explode('=', $collection->previousPageUrl());
																$next = explode('=', $collection->nextPageUrl());
												@endphp
												<div class="xs:mt-0 mt-2 inline-flex">
																<button {{ array_key_exists(1, $prev) && $prev[1] ? '' : 'disabled' }}
																				class="flex h-10 items-center justify-center rounded-l bg-gray-400 bg-gray-800 px-4 text-base font-medium text-black text-white hover:bg-gray-900 disabled:bg-gray-200 disabled:text-black dark:border-gray-500 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:disabled:bg-gray-900">
																				Prev
																</button>
																<button {{ array_key_exists(1, $next) && $next[1] ? '' : 'disabled' }}
																				class="flex h-10 items-center justify-center rounded-r border-0 border-l border-gray-500 bg-gray-400 bg-gray-800 px-4 text-base font-medium text-black text-white hover:bg-gray-900 disabled:bg-gray-200 disabled:text-black dark:border-gray-500 dark:bg-gray-800 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white dark:disabled:bg-gray-900">
																				Next
																</button>
												</div>
								</div>

				</div>

</div>
