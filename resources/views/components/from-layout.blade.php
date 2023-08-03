<section
    class="flex flex-row  justify-center bg-white border border-gray-200 shadow dark:bg-gray-800 dark:border-gray-700">
    <div class="py-8  w-full mx-28 max-md:mx-10  lg:py-16">

{{-- @dd($route) --}}
        <form action="{{ route($route) }}" method="POST">
            @csrf
            @method('post')
            <x-submit-button title="{{ $title }}"></x-submit-button>
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                {{ $slot }}
            </div>
            <x-submit-button title=""></x-submit-button>
        </form>
    </div>
</section>
