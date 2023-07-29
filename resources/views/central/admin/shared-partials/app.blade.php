@php
    $theme = \App\Models\Theme::where('user_id', auth()->user()->std_id)->first();
@endphp
<!DOCTYPE html>
<html lang="en" id="html" data-mode="{{ $theme->theme }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{ config('app.name', 'EnigmaEdge') }} | @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>

<body class="sb-nav-fixed bg-slate-100 dark:bg-slate-800">

{{-- @include('central.admin.partials.toast') --}}

    @include('central.admin.partials.sidebar')
    @include('central.admin.partials.right-bar')
    @include('central.admin.partials.header')
    @yield('main')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    @stack('scripts')
</body>

</html>
