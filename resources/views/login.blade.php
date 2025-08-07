<!DOCTYPE html>
<html lang="en" class="h-full bg-white">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('img/UTDI-logo.png') }}">

    <title>Portal Akademik</title>

        {{-- font --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />

    {{-- style --}}
    @vite('resources/css/app.css')

    {{-- js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="h-full">
<div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
  <div class="sm:mx-auto sm:w-full sm:max-w-sm">
    <img src="{{ asset("img/UTDI-logo.png") }}" alt="Your Company" class="mx-auto h-35 w-35" />
    <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2>
  </div>

  <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm bg-white px-6 py-8 shadow-md ring-1 ring-gray-900/5 sm:rounded-lg">
    <form action="{{ route('login') }}" method="POST" class="space-y-6">@csrf
      <div>
        <label for="nim" class="block text-sm/6 font-medium text-gray-900">NIM</label>
        <div class="mt-2">
          <input id="nim" name="nim" value="{{ old('nim') }}" required autocomplete="username" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" autofocus />
        </div>
      </div>

      <div x-data="{ show: false }">
  <div class="flex items-center justify-between">
    <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
  </div>

  <div class="mt-2 relative">
    <input
        :type="show ? 'text' : 'password'"
        id="password"
        name="password"
        required
        autocomplete="current-password"
        class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
    />

    <!-- Toggle button -->
    <button
        type="button"@click="show = !show" class="cursor-pointer absolute inset-y-0 right-0 flex items-center px-3 text-gray-500 hover:text-gray-700" tabindex="-1">
        <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
        </svg>

        <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M13.875 18.825A10.05 10.05 0 0112 19c-4.477 0-8.268-2.943-9.542-7a9.956 9.956 0 012.23-3.592m2.857-2.175A9.956 9.956 0 0112 5c4.477 0 8.268 2.943 9.542 7a9.956 9.956 0 01-4.142 5.042M15 12a3 3 0 00-3-3m0 0a3 3 0 00-3 3m3-3L3 21"/>
        </svg>
    </button>
  </div>
</div>


      <div>
        <button type="submit" class="cursor-pointer flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600 active:scale-95 transition">Login</button>
      </div>
    </form>
    @if(session('error'))
    <p class="text-red-500">{{ session('error') }}</p>
    @endif
  </div>
</div>

</body>
</html>