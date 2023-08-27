<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<meta name="csrf-token" content="{{ csrf_token() }}">

				<title>{{ config('app.name', 'Laravel') }}</title>

				<!-- Fonts -->
				<link rel="preconnect" href="https://fonts.bunny.net">
				<link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

				<!-- Scripts -->
				<blade
								vite|(%5B%26%2339%3Bresources%2Fcss%2Fapp.css%26%2339%3B%2C%20%26%2339%3Bresources%2Fjs%2Fapp.js%26%2339%3B%5D)>
</head>

<body class="font-sans antialiased">
				<div class="min-h-screen bg-gray-100">
								@include('layouts.navigation')

								<!-- Page Heading -->
								@if (isset($header))
												<header class="bg-white shadow">
																<div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
																				{{ $header }}
																</div>
												</header>
								@endif

								<!-- Page Content -->
								<main>
												{{ $slot }}
								</main>
				</div>
</body>

</html>
