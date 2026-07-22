@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="min-h-screen pt-24 pb-12">
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-md mx-auto bg-[#111118]/80 backdrop-blur-xl border border-white/10 rounded-2xl shadow-2xl p-8">
            <div class="text-center mb-8">
                <!-- Optional: Add a small logo or icon here -->
                <div class="w-16 h-16 bg-primary/20 text-primary rounded-full flex items-center justify-center mx-auto mb-4 border border-primary/30">
                    <i class="fas fa-user-lock text-2xl"></i>
                </div>
                <h1 class="text-2xl font-bold text-white">Login Admin</h1>
                <p class="text-gray-400 mt-2 text-sm">Masuk untuk mengelola portfolio Anda</p>
            </div>

            <!-- Session Status -->
            @if (session('status'))
                <div class="mb-4 text-sm text-green-400 bg-green-400/10 p-3 rounded-lg border border-green-400/20 text-center">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-300 mb-1">
                        Email
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-envelope text-gray-500"></i>
                        </div>
                        <input
                            id="email"
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            required
                            autofocus
                            autocomplete="username"
                            placeholder="nama@email.com"
                            class="pl-10 block w-full rounded-xl border-white/10 bg-white/5 text-white shadow-sm focus:border-primary focus:ring focus:ring-primary/50 transition-colors"
                        >
                    </div>
                    @error('email')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-300 mb-1">
                        Password
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <i class="fas fa-lock text-gray-500"></i>
                        </div>
                        <input
                            id="password"
                            type="password"
                            name="password"
                            required
                            autocomplete="current-password"
                            placeholder="••••••••"
                            class="pl-10 block w-full rounded-xl border-white/10 bg-white/5 text-white shadow-sm focus:border-primary focus:ring focus:ring-primary/50 transition-colors"
                        >
                    </div>
                    @error('password')
                        <p class="mt-2 text-sm text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Remember Me & Forgot Password -->
                <div class="flex items-center justify-between">
                    <label for="remember_me" class="inline-flex items-center cursor-pointer">
                        <input
                            id="remember_me"
                            type="checkbox"
                            name="remember"
                            class="rounded border-white/10 bg-white/5 text-primary shadow-sm focus:border-primary focus:ring focus:ring-primary/50"
                        >
                        <span class="ml-2 text-sm text-gray-400">Ingat Saya</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-primary hover:text-blue-400 transition-colors">
                            Lupa Password?
                        </a>
                    @endif
                </div>

                <button type="submit" class="w-full bg-primary hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-xl transition duration-300 shadow-lg shadow-primary/25 flex justify-center items-center gap-2 group">
                    <span>Login</span>
                    <i class="fas fa-arrow-right group-hover:translate-x-1 transition-transform"></i>
                </button>
            </form>
        </div>
    </div>
    
    <!-- Decorative background elements -->
    <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-primary/20 rounded-full mix-blend-screen filter blur-3xl opacity-30 animate-blob"></div>
    <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-purple-500/20 rounded-full mix-blend-screen filter blur-3xl opacity-30 animate-blob animation-delay-2000"></div>
</div>
@endsection
