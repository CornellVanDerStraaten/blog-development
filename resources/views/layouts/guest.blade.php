<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Blog Cornell van der Straaten</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="dark:bg-zinc-900 bg-gray-100">
    <!--
  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ],
  }
  ```
-->
    <nav>
        <div class="mx-auto max-w-3xl px-2 sm:px-4 lg:px-8">
            <div class="flex h-16 justify-between">
                <div class="flex px-2 lg:px-0">
                    <div class="flex lg:space-x-8 ">
                        <!-- Current: "border-indigo-500 text-gray-900", Default: "border-transparent text-gray-500 hover:border-gray-300 hover:text-gray-700" -->
                        <a href="{{ route('user.frontpage') }}" class="inline-flex dark:text-gray-100 items-center transition-all @if(request()->routeIs('user.frontpage')) border-b-2  border-cyan-700 @else  hover:border-b-2  @endif px-1 pt-1 text-md font-medium text-gray-900"><span style='font-size:40px;' class="mr-3">&#128187;</span>
                             Cornell van der Straaten</a>
                        <a href="{{ route('user.article.index') }}" class="inline-flex dark:text-gray-100 items-center transition-all @if(request()->routeIs('user.article.index')) border-b-2  border-cyan-700 @else  hover:border-b-2  @endif px-1 pt-1 text-md font-medium text-gray-900">Blogs</a>
                    </div>
                </div>

            </div>
        </div>

    </nav>

    <div class="font-sans text-gray-900 mx-auto max-w-3xl px-2 sm:px-4 lg:px-8 pt-6 dark:text-gray-100 antialiased">
            {{ $slot }}
        </div>

        @livewireScripts
    </body>
</html>
