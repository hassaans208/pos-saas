@php
    $theme = \App\Models\Tenant\Theme::firstOrNew(['user_id' => auth()->user()->id]);
    if (!$theme) {
        $theme->theme = $theme->theme == 'light' ? 'dark' : 'light';
        $theme->save();
        # code...
    }
    // dd($theme);
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css">

    @stack('styles')
</head>

<body class="sb-nav-fixed bg-slate-100 dark:bg-slate-800">

    @include('tenant.admin.partials.sidebar')
    @include('tenant.admin.partials.right-bar')
    @include('tenant.admin.partials.header')
    <x-toast-message></x-toast-message>
    @yield('main')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>
    <script src="https://kit.fontawesome.com/23d794b31c.js" crossorigin="anonymous"></script>
    @vite(['resources/js/app.js'])
    @stack('scripts')
</body>

</html>
