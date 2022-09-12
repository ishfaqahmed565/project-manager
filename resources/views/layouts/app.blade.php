<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
        <style>
             @media screen and (max-width: 576px) {
                .hide-on-mobile {
                    display: none; 
                }
            } 
            [x-cloak] {
			display: none;
		}

		.duration-300 {
			transition-duration: 300ms;
		}

		.ease-in {
			transition-timing-function: cubic-bezier(0.4, 0, 1, 1);
		}

		.ease-out {
			transition-timing-function: cubic-bezier(0, 0, 0.2, 1);
		}

		.scale-90 {
			transform: scale(.9); 
		}

		.scale-100 {
			transform: scale(1);
		}
        </style>
        <!-- Scripts -->
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased "
    x-data="{ 'showModal': false }" @keydown.escape="showModal = false" x-cloak>
        <div class="min-h-screen bg-gray-100">
        
            @include('layouts.navigation')
            
            <!-- Page Heading -->
            <header class="bg-white shadow">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
                </h2>
            </header>

            <!-- Page Content -->
            <main 
            
            >
         
                {{ $slot }}
            </main>
        </div>
    </body>
</html>
<script src='/app.js'></script>
