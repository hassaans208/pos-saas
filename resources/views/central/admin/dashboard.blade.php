@extends('central.admin.partials.app')
@section('body')
    <nav class="mb-4 mx-4" aria-label="Breadcrumb">
        <div class="flex flex-row justify-between">
            <div>
                <h2 class="text-3xl font-semibold dark:text-white text-black">Dashboard</h2>
            </div>
            <div>

                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="#"
                            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 mr-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <a href="#"
                                class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Projects</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 9 4-4-4-4" />
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Flowbite</span>
                        </div>
                    </li>
                </ol>
            </div>

        </div>

    </nav>

    <div class="flex flex-row gap-x-3 justify-center">
        {{-- -------- Design --}}
        <div class="max-w-sm p-4 h-36  transition ease-linear delay-100 hover:scale-105 bg-white border w-72 border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">

            <svg class="w-7 h-7 text-gray-500 float-right transition ease-linear delay-100 hover:scale-110 dark:text-gray-400 mb-3"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
            </svg>
            <h5 class="mb-1 text-base font-semibold tracking-tight text-gray-900 dark:text-white">Revenue
            </h5>
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">$
                {{ number_format(400000, 2) }}
            </h5>
            <p class="mb-2 text-xs font-semibold tracking-tight text-green-500 dark:text-green-500">Rise 42%
            </p>
            <a href="#"
                class="inline-flex items-center text-blue-900 dark:text-blue-200 text-xs float-right hover:underline">
                View More
                <svg class="w-3 h-3 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                </svg>
            </a>
        </div>
        {{-- -------design end --}}
        {{-- -------- Design --}}
        <div class="max-w-sm p-4 h-36  transition ease-linear delay-100 hover:scale-105 bg-white border w-72 border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">

            <svg class="w-7 h-7 text-gray-500 float-right transition ease-linear delay-100 hover:scale-110 dark:text-gray-400 mb-3"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
            </svg>
            <h5 class="mb-1 text-base font-semibold tracking-tight text-gray-900 dark:text-white">Revenue
            </h5>
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">$
                {{ number_format(400000, 2) }}
            </h5>
            <p class="mb-2 text-xs font-semibold tracking-tight text-green-500 dark:text-green-500">Rise 42%
            </p>
            <a href="#"
                class="inline-flex items-center text-blue-900 dark:text-blue-200 text-xs float-right hover:underline">
                View More
                <svg class="w-3 h-3 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                </svg>
            </a>
        </div>
        {{-- -------design end --}}
        {{-- -------- Design --}}
        <div class="max-w-sm p-4 h-36  transition ease-linear delay-100 hover:scale-105 bg-white border w-72 border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">

            <svg class="w-7 h-7 text-gray-500 float-right transition ease-linear delay-100 hover:scale-110 dark:text-gray-400 mb-3"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
            </svg>
            <h5 class="mb-1 text-base font-semibold tracking-tight text-gray-900 dark:text-white">Revenue
            </h5>
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">$
                {{ number_format(400000, 2) }}
            </h5>
            <p class="mb-2 text-xs font-semibold tracking-tight text-green-500 dark:text-green-500">Rise 42%
            </p>
            <a href="#"
                class="inline-flex items-center text-blue-900 dark:text-blue-200 text-xs float-right hover:underline">
                View More
                <svg class="w-3 h-3 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                </svg>
            </a>
        </div>
        {{-- -------design end --}}
        {{-- -------- Design --}}
        <div class="max-w-sm p-4 h-36  transition ease-linear delay-100 hover:scale-105 bg-white border w-72 border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">

            <svg class="w-7 h-7 text-gray-500 float-right transition ease-linear delay-100 hover:scale-110 dark:text-gray-400 mb-3"
                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                <path
                    d="M18 5h-.7c.229-.467.349-.98.351-1.5a3.5 3.5 0 0 0-3.5-3.5c-1.717 0-3.215 1.2-4.331 2.481C8.4.842 6.949 0 5.5 0A3.5 3.5 0 0 0 2 3.5c.003.52.123 1.033.351 1.5H2a2 2 0 0 0-2 2v3a1 1 0 0 0 1 1h18a1 1 0 0 0 1-1V7a2 2 0 0 0-2-2ZM8.058 5H5.5a1.5 1.5 0 0 1 0-3c.9 0 2 .754 3.092 2.122-.219.337-.392.635-.534.878Zm6.1 0h-3.742c.933-1.368 2.371-3 3.739-3a1.5 1.5 0 0 1 0 3h.003ZM11 13H9v7h2v-7Zm-4 0H2v5a2 2 0 0 0 2 2h3v-7Zm6 0v7h3a2 2 0 0 0 2-2v-5h-5Z" />
            </svg>
            <h5 class="mb-1 text-base font-semibold tracking-tight text-gray-900 dark:text-white">Revenue
            </h5>
            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">$
                {{ number_format(400000, 2) }}
            </h5>
            <p class="mb-2 text-xs font-semibold tracking-tight text-green-500 dark:text-green-500">Rise 42%
            </p>
            <a href="#"
                class="inline-flex items-center text-blue-900 dark:text-blue-200 text-xs float-right hover:underline">
                View More
                <svg class="w-3 h-3 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15 11v4.833A1.166 1.166 0 0 1 13.833 17H2.167A1.167 1.167 0 0 1 1 15.833V4.167A1.166 1.166 0 0 1 2.167 3h4.618m4.447-2H17v5.768M9.111 8.889l7.778-7.778" />
                </svg>
            </a>
        </div>
        {{-- -------design end --}}
    </div>
@endsection
