@extends('layouts.app')

@section('title', 'Verifikasi Email')

@section('content')
<div class="min-h-screen pt-24 pb-12">
    <div class="container mx-auto px-6">
        <div class="max-w-md mx-auto bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8">
            <div class="text-center mb-8">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Verifikasi Email</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2">
                    Terima kasih telah mendaftar! Sebelum memulai, bisakah Anda memverifikasi alamat email Anda dengan mengklik link yang baru saja kami kirimkan ke email Anda? Jika Anda tidak menerima email tersebut, kami akan dengan senang hati mengirimkan email yang baru.
                </p>
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 text-sm text-green-600 dark:text-green-400">
                    Link verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.
                </div>
            @endif

            <div class="flex items-center justify-between mt-8">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit" class="bg-primary hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg transition duration-300">
                        Kirim Ulang Email Verifikasi
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-gray-600 hover:text-primary dark:text-gray-400">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
