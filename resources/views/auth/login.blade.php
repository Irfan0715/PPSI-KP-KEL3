<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="min-h-[80vh] grid grid-cols-1 lg:grid-cols-2 gap-6 bg-gray-50 rounded-2xl overflow-hidden">
        <!-- Left brand/illustration -->
        <div class="hidden lg:flex bg-gradient-to-br from-blue-600 via-indigo-600 to-sky-500 text-white items-center justify-center p-12">
            <div class="max-w-md">
                <h1 class="text-3xl font-semibold leading-tight">Selamat Datang di Sistem KP</h1>
                <p class="mt-3 text-blue-100">Masuk untuk mengelola data pengguna, instansi, lowongan KP dan fitur lain dengan antarmuka yang modern.</p>
                <div class="mt-8 grid grid-cols-2 gap-3 text-sm">
                    <div class="bg-white/10 rounded-lg px-4 py-3 backdrop-blur-sm">Akses cepat</div>
                    <div class="bg-white/10 rounded-lg px-4 py-3 backdrop-blur-sm">Keamanan</div>
                    <div class="bg-white/10 rounded-lg px-4 py-3 backdrop-blur-sm">Responsif</div>
                    <div class="bg-white/10 rounded-lg px-4 py-3 backdrop-blur-sm">Tailwind</div>
                </div>
            </div>
        </div>

        <!-- Right form card -->
        <div class="flex items-center justify-center p-6 lg:p-10">
            <div class="w-full max-w-md">
                <div class="bg-white border border-gray-100 shadow-sm rounded-xl p-6 sm:p-8">
                    <div class="mb-6 text-center">
                        <h2 class="text-2xl font-semibold text-gray-900">Masuk ke Akun</h2>
                        <p class="text-sm text-gray-500 mt-1">Gunakan email dan password Anda</p>
                    </div>

                    <form method="POST" action="{{ route('login') }}" class="space-y-5">
                        @csrf

                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                                   class="mt-2 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" />
                            @error('email')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <div class="flex items-center justify-between">
                                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-sm text-blue-700 hover:underline">Lupa password?</a>
                                @endif
                            </div>
                            <input id="password" name="password" type="password" required autocomplete="current-password"
                                   class="mt-2 block w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring-blue-500" />
                            @error('password')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <label class="inline-flex items-center select-none">
                            <input id="remember_me" type="checkbox" name="remember" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500">
                            <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                        </label>

                        <button type="submit" class="w-full inline-flex justify-center items-center rounded-lg bg-blue-600 text-white px-4 py-2.5 font-medium hover:bg-blue-700 focus:ring-4 focus:ring-blue-100 transition">
                            Masuk
                        </button>

                        <p class="text-center text-sm text-gray-600">Belum punya akun?
                            <a href="{{ route('register') }}" class="font-medium text-blue-700 hover:underline">Daftar</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
