<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('img/UTDI-logo.png') }}">
    <title>Setings</title>

    {{-- font --}}
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />

    {{-- style --}}
    @vite('resources/css/app.css')

    {{-- js --}}
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
<!-- Include this script tag or install `@tailwindplus/elements` via npm: -->
<script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script> 

</head>
<body class="h-full">
    
<div class="min-h-full">
  <nav class="bg-gray-800">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="{{ asset("img/OnePiece.png") }}" alt="Your Company" class="w-10 h-10 rounded-full object-cover" style="filter: drop-shadow(0 0 5px white);"  />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="{{ url('dashboard') }}" aria-current="page" class="rounded-md bg-gray-1000 hover:bg-gray-700 px-3 py-2 text-sm font-medium text-white">Dashboard</a>
              <a href="/about" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Panduan</a>
              {{-- <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
              <a href="#" class="rounded-md px-3 py-2 text-sm font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a> --}}
            </div>
          </div>
        </div>
        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <div style="color: white">
              {{ auth()->user()->nama ?? 'Guest' }}
            </div>

            <!-- Profile dropdown -->
            <el-dropdown class="relative ml-3">
              <button class="relative flex max-w-xs items-center rounded-full bg-gray-800 text-sm focus:outline-hidden focus-visible:ring-2 focus-visible:ring-white focus-visible:ring-offset-2 focus-visible:ring-offset-gray-800">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <img 
                    src="{{ Auth::user()->profile_picture ? asset('profile_picture/'.Auth::user()->profile_picture) . '?v=' . time() : asset('img/user.png') }}" 
                    alt="{{ Auth::user()->name }}" 
                    class="w-10 h-10 rounded-full object-cover"
                />
              </button>

              <el-menu anchor="bottom end" popover class="w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black/5 transition transition-discrete [--anchor-gap:--spacing(2)] focus:outline-hidden data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                <a href="{{ url('profil')}}" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Your Profile</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Settings</a>
                <a href="/" class="block px-4 py-2 text-sm text-gray-700 focus:bg-gray-100 focus:outline-hidden">Sign out</a>
              </el-menu>
            </el-dropdown>
          </div>
        </div>
        <div class="-mr-2 flex md:hidden">
          <!-- Mobile menu button -->
          <button type="button" command="--toggle" commandfor="mobile-menu" class="relative inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
            <span class="absolute -inset-0.5"></span>
            <span class="sr-only">Open main menu</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 in-aria-expanded:hidden">
              <path d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6 not-in-aria-expanded:hidden">
              <path d="M6 18 18 6M6 6l12 12" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button>
        </div>
      </div>
    </div>

    <el-disclosure id="mobile-menu" hidden class="block md:hidden">
      <div class="space-y-1 px-2 pt-2 pb-3 sm:px-3">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="{{ url('dashboard')}}" aria-current="page" class="block rounded-md bg-gray-900 px-3 py-2 text-base font-medium text-white">Dashboard</a>
        <a href="/about" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Panduan</a>
        <a href="{{ url('about')}}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Projects</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Calendar</a>
        <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:bg-gray-700 hover:text-white">Reports</a>
      </div>
      <div class="border-t border-gray-700 pt-4 pb-3">
        <div class="flex items-center px-5">
          <div class="shrink-0">
            <img src="{{ asset('img/user.png')}}" class="size-10 rounded-full" />
          </div>
          <div class="ml-3">
            <div class="text-base/5 font-medium text-white"></div>
            <div class="text-sm font-medium text-gray-400">test@test.id</div>
          </div>
          {{-- <button type="button" class="relative ml-auto shrink-0 rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800 focus:outline-hidden">
            <span class="absolute -inset-1.5"></span>
            <span class="sr-only">View notifications</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" data-slot="icon" aria-hidden="true" class="size-6">
              <path d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </button> --}}
        </div>
        <div class="mt-3 space-y-1 px-2">
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Your Profile</a>
          <a href="#" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Settings</a>
          <a href="{{ route('logout') }}" class="block rounded-md px-3 py-2 text-base font-medium text-gray-400 hover:bg-gray-700 hover:text-white">Sign out</a>
        </div>
      </div>
    </el-disclosure>
  </nav>

  {{-- Profil --}}
  <div class="px-4 sm:px-0 flex flex-col items-center justify-center py-0">
    <div class="flex flex-col items-center justify-center py-10">
    <img src="{{ Auth::user()->profile_picture ? asset('profile_picture/'.Auth::user()->profile_picture) . '?v=' . time() : asset('img/user.png') }}"
         alt="Profil"
         class="w-24 h-24 rounded-full border-2 border-gray-300 object-cover" >

    <form action="{{ route('update.photo') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-2">
        @csrf
        <input type="file" name="profile_picture" accept="image/*" required
               class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer focus:outline-none">

        <button type="submit"
                class="px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg">
            Ganti Foto
        </button>
    </form>

    @if(session('success'))
        <p class="text-green-500 text-sm">{{ session('success') }}</p>
    @endif

    </div>
</div>


  {{-- Form ubah password --}}
<div class="max-w-md mx-auto bg-white shadow-md rounded-lg p-6 mt-2">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Ganti Kata Sandi</h2>

    <form action="{{ route('password.update') }}" method="POST">
    @csrf
    @method('PUT') {{-- pakai PUT untuk update data --}}

    <!-- Password Lama -->
    <div class="mb-4">
        <label for="old_password" class="block text-sm font-medium text-gray-700">Password Lama</label>
        <input type="password" name="old_password" id="old_password"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm 
            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
    </div>

    <!-- Password Baru -->
    <div class="mb-4">
        <label for="new_password" class="block text-sm font-medium text-gray-700">Password Baru</label>
        <input type="password" name="new_password" id="new_password"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm 
            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
    </div>

    <!-- Konfirmasi Password Baru -->
    <div class="mb-6">
        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700">Konfirmasi Password Baru</label>
        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
            class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm 
            focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
    </div>

    <button type="submit"
        class="w-full bg-indigo-600 text-white py-2 px-4 rounded-lg hover:bg-indigo-700 
        focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Simpan Perubahan
    </button>
</form>

</div>
</div>




</body>
</html>