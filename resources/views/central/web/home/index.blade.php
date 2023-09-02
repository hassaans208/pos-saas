@extends('central.web.home.partials.app')
@section('main')
{{-- <div class="py-10"></div> --}}
    <div id="indicators-carousel" class="relative w-full" data-carousel="static">
        <!-- Carousel wrapper -->
        <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
            <!-- Item 1 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item="active">
                <img src="{{ asset('assets/banners/banner_1.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
            <!-- Item 2 -->
            <div class="hidden duration-700 ease-in-out" data-carousel-item>
                <img src="{{ asset('assets/banners/banner_2.jpg') }}"
                    class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
            </div>
        </div>
        <!-- Slider indicators -->
        <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                data-carousel-slide-to="0"></button>
            <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                data-carousel-slide-to="1"></button>
        </div>
        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-white dark:text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>
    {{-- coursel end --}}
    <div class="my-10"></div>
    {{-- section 1 --}}
    <div class="grid grid-cols-3 px-52 items-center bg-white">

        <div
            class="relative col-span-2  my-5  border-gray-800 dark:border-gray-800 bg-gray-800 border-[14px] rounded-[2.5rem] h-[454px] min-h-[454px] min-w-[341px] max-w-[341px] md:h-[682px] md:max-w-[512px]">
            <div class="h-[32px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -left-[17px] top-[72px] rounded-l-lg">
            </div>
            <div class="h-[46px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -left-[17px] top-[124px] rounded-l-lg">
            </div>
            <div class="h-[46px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -left-[17px] top-[178px] rounded-l-lg">
            </div>
            <div class="h-[64px] w-[3px] bg-gray-800 dark:bg-gray-800 absolute -right-[17px] top-[142px] rounded-r-lg">
            </div>
            <div class="rounded-[2rem] overflow-hidden h-[426px] md:h-[654px] bg-white dark:bg-gray-800">
                <img src="https://flowbite.s3.amazonaws.com/docs/device-mockups/tablet-mockup-image.png"
                    class="dark:hidden h-[426px] md:h-[654px]" alt="">
                <img src="https://flowbite.s3.amazonaws.com/docs/device-mockups/tablet-mockup-image-dark.png"
                    class="hidden dark:block h-[426px] md:h-[654px]" alt="">
            </div>
        </div>
        {{-- </div> --}}

        <div class="text-center">
            <h3 class="text-2xl font-bold w-full">Master Data Management: A Comprehensive Guide to Keeping Records</h3>
            <hr class="my-5">
            <p>In the age of data-driven decision-making, maintaining accurate and organized records is paramount for
                businesses, organizations, and individuals alike. "Master Data Management: A Comprehensive Guide to Keeping
                Records" is your essential companion in the world of data stewardship. This comprehensive resource is
                designed to help you effectively collect, store, manage, and safeguard your valuable data assets.</p>

    </div>
    </div>
    {{-- section 1 end --}}
    <div class="my-10"></div>
     @include('central.web.home.partials.plans')
    <div class="my-10"></div>
    {{-- section 2 --}}
    <div class="grid grid-cols-4 px-52 gap-10 items-center bg-white">
        <div class="text-center col-span-2 ">
            <h3 class="text-2xl font-bold w-full">Master Data Management: A Comprehensive Guide to Keeping Records</h3>
            <hr class="my-5">
            <p>In the age of data-driven decision-making, maintaining accurate and organized records is paramount for
                businesses, organizations, and individuals alike. "Master Data Management: A Comprehensive Guide to Keeping
                Records" is your essential companion in the world of data stewardship. This comprehensive resource is
                designed to help you effectively collect, store, manage, and safeguard your valuable data assets.</p>

        </div>
        <div class="flex flex-col my-16  items-center col-span-2">

            <div
                class="relative shadow-lg    border-gray-800 dark:border-gray-800 bg-gray-800 border-[8px] rounded-t-xl h-[172px] max-w-[301px] md:h-[294px] md:max-w-[512px]">
                <div class="rounded-lg overflow-hidden h-[156px] md:h-[278px] bg-white dark:bg-gray-800">
                    <img src="https://flowbite.s3.amazonaws.com/docs/device-mockups/laptop-screen.png"
                        class="dark:hidden h-[156px] md:h-[278px] w-full rounded-xl" alt="">
                    <img src="https://flowbite.s3.amazonaws.com/docs/device-mockups/laptop-screen-dark.png"
                        class="hidden dark:block h-[156px] md:h-[278px] w-full rounded-lg" alt="">
                </div>
            </div>
            <div
                class="relative bg-gray-900 w-full dark:bg-gray-700 rounded-b-xl rounded-t-sm h-[17px] max-w-[351px] md:h-[21px] md:max-w-[597px]">
                <div
                    class="absolute left-1/2 top-0 -translate-x-1/2 rounded-b-xl w-[56px] h-[5px] md:w-[96px] md:h-[8px] bg-gray-800">
                </div>
            </div>
        </div>
    </div>
    {{-- section 2 end --}}
    <div class="my-10"></div>
    {{-- section 3 --}}
    <div class="grid grid-cols-4 px-52 gap-10 items-center bg-white">
        <div class="flex flex-col my-16  items-center col-span-2">

            <div
                class="relative w-full border-gray-800 dark:border-gray-800 bg-gray-800 border-[16px] rounded-t-xl h-[172px] max-w-[301px] md:h-[294px] md:max-w-[512px]">
                <div class="rounded-xl overflow-hidden h-[140px] md:h-[262px]">
                    <img src="https://flowbite.s3.amazonaws.com/docs/device-mockups/screen-image-imac.png"
                        class="dark:hidden h-[140px] md:h-[262px] w-full rounded-xl" alt="">
                    <img src="https://flowbite.s3.amazonaws.com/docs/device-mockups/screen-image-imac-dark.png"
                        class="hidden dark:block h-[140px] md:h-[262px] w-full rounded-xl" alt="">
                </div>
            </div>
            <div
                class="relative w-full bg-gray-900 dark:bg-gray-700 rounded-b-xl h-[24px] max-w-[301px] md:h-[42px] md:max-w-[512px]">
            </div>
            <div class="relative w-full bg-gray-800 rounded-b-xl h-[55px] max-w-[83px] md:h-[95px] md:max-w-[142px]"></div>
        </div>

        <div class="text-center col-span-2 ">
            <h3 class="text-2xl font-bold w-full">Master Data Management: A Comprehensive Guide to Keeping Records</h3>
            <hr class="my-5">
            <p>In the age of data-driven decision-making, maintaining accurate and organized records is paramount for
                businesses, organizations, and individuals alike. "Master Data Management: A Comprehensive Guide to Keeping
                Records" is your essential companion in the world of data stewardship. This comprehensive resource is
                designed to help you effectively collect, store, manage, and safeguard your valuable data assets.</p>

        </div>
    </div>
    {{-- section 3 end --}}
    <div class="my-10"></div>

@endsection
