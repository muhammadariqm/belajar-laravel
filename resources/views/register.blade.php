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
    {{-- <img src="{{ asset("img/UTDI-logo.png") }}" alt="Your Company" class="mx-auto h-35 w-35" /> --}}
    {{-- <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Sign in to your account</h2> --}}
  </div>

<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-center">Form Registrasi</h2>
    <form action="{{ route('register') }}" method="POST" class="grid grid-cols-1 gap-4">
        @csrf

        <div>
            <label for="nim" class="block font-medium">NIM</label>
            <input type="text" value="{{ old('nim')}}" id="nim" name="nim" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="nama" class="block font-medium">Nama</label>
            <input type="text" value="{{ old('nama')}}" name="nama" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="email" class="block font-medium">Email</label>
            <input type="email" value="{{ old('email')}}" name="email" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="tgl_lahir" class="block font-medium">Tanggal Lahir</label>
            <input type="text" value="{{ old('tgl_lahir')}}" name="tgl_lahir" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="status" class="block font-medium">Status</label>
            <input type="text" value="{{ old('status')}}" name="status" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="jenis_kelamin" class="block font-medium">Jenis Kelamin</label>
            <input type="text" value="{{ old('jenis_kelamin')}}" name="jenis_kelamin" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="fakultas" class="block font-medium">Fakultas</label>
            <input type="text" value="{{ old('fakultas')}}" name="fakultas" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="prodi" class="block font-medium">Prodi</label>
            <input type="text" value="{{ old('prodi')}}" name="prodi" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="asal_negara" class="block font-medium"> Negara</label>
            <input type="text" value="{{ old('asal_negara')}}" name="asal_negara" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="asal_sekolah" class="block font-medium">Asal Sekolah</label>
            <input type="text" value="{{ old('asal_sekolah')}}" name="asal_sekolah" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="telepon" class="block font-medium">Telepon</label>
            <input type="text" value="{{ old('telepon')}}" name="telepon" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="agama" class="block font-medium">Agama</label>
            <input type="text" value="{{ old('agama')}}" name="agama" class="w-full border rounded p-2" required>
        </div>

        <div>
            <label for="password" class="block font-medium">Password</label>
            <input type="password" value="{{ old('password')}}" name="password" class="w-full border rounded p-2" required>
        </div>

        <div class="col-span-2">
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 rounded hover:bg-indigo-700">
                Register
            </button>
        </div>
    </form>
    @if (session('success'))
    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded relative mb-4">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mb-4">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>


</body>
</html>