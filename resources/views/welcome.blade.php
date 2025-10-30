<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKP - Sistem Informasi Kerja Praktek - Universitas Bengkulu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom Orange and Blue Palette */
        :root {
            --color-primary-blue: #2563EB; /* Blue-600 */
            --color-primary-blue-dark: #1D4ED8; /* Blue-700 */
            --color-accent-orange: #F97316; /* Orange-500 */
            --color-accent-orange-dark: #EA580C; /* Orange-600 */
            --color-light-bg: #F9FAFB; /* Gray-50 */
        }
        .bg-primary-blue { background-color: var(--color-primary-blue); }
        .hover\:bg-primary-blue-dark:hover { background-color: var(--color-primary-blue-dark); }
        .text-accent-orange { color: var(--color-accent-orange); }
        .bg-accent-orange { background-color: var(--color-accent-orange); }
        .hover\:bg-accent-orange-dark:hover { background-color: var(--color-accent-orange-dark); }

        /* Custom style for aspect ratio fix */
        .aspect-w-16 { --tw-aspect-w: 16; }
        .aspect-h-9 { --tw-aspect-h: 9; }
        .aspect-w-16\/9 { aspect-ratio: 16 / 9; }
    </style>
</head>
<body class="font-sans bg-light-bg text-gray-800">

    <header class="sticky top-0 z-50 bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <a href="#" class="flex items-center space-x-2 flex-shrink-0">
                    <svg class="h-8 w-8 text-primary-blue" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21.75l-4.5-7.5H4.5l7.5 7.5 7.5-7.5h-3L12 21.75zM12 2.25l4.5 7.5h3l-7.5-7.5-7.5 7.5h3l4.5-7.5z" />
                    </svg>
                    <span class="text-xl font-bold text-gray-900">SIKP <span class="text-accent-orange">UNIB</span></span>
                </a>

                <nav class="hidden md:flex space-x-10">
                    <a href="#fitur" class="text-base font-medium text-gray-500 hover:text-primary-blue transition duration-150">Fitur Utama</a>
                    <a href="#alur" class="text-base font-medium text-gray-500 hover:text-primary-blue transition duration-150">Alur KP</a>
                    <a href="#kontak" class="text-base font-medium text-gray-500 hover:text-primary-blue transition duration-150">Kontak</a>
                </nav>

                <div class="flex items-center space-x-3 sm:space-x-4">
                    <a href="/login" class="text-sm sm:text-base font-medium text-gray-500 hover:text-primary-blue transition duration-150 hidden sm:inline-block">Masuk</a>
                    <a href="/register" class="px-3 py-1.5 sm:px-4 sm:py-2 border border-transparent rounded-md shadow-sm text-sm sm:text-base font-medium text-white bg-accent-orange hover:bg-accent-orange-dark transition duration-150">
                        Daftar
                    </a>

                    <button class="md:hidden p-1 rounded-md text-gray-600 hover:text-primary-blue transition duration-150">
                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div class="hidden md:hidden absolute w-full bg-white shadow-xl py-4 border-t border-gray-100">
             <nav class="flex flex-col space-y-2 px-4">
                <a href="#fitur" class="py-2 text-gray-600 hover:text-primary-blue">Fitur Utama</a>
                <a href="#alur" class="py-2 text-gray-600 hover:text-primary-blue">Alur KP</a>
                <a href="#kontak" class="py-2 text-gray-600 hover:text-primary-blue">Kontak</a>
                <a href="/login" class="py-2 text-gray-600 hover:text-primary-blue sm:hidden">Masuk</a>
            </nav>
        </div>
    </header>

    <section class="bg-white pt-10 sm:pt-16 lg:pt-8 pb-12 sm:pb-16 lg:pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:grid lg:grid-cols-12 lg:gap-12">
                <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                    <h1 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-5xl lg:text-6xl">
                        <span class="block xl:inline">Sistem Informasi</span>
                        <span class="block text-primary-blue xl:inline">Kerja Praktek</span>
                    </h1>
                    <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg lg:text-lg xl:text-xl">
                        Kelola seluruh proses Kerja Praktek (KP) Anda, mulai dari pendaftaran, penentuan dosen pembimbing, hingga pelaporan akhir, dengan mudah dan terpusat di **Universitas Bengkulu**.
                    </p>
                    <div class="mt-8 sm:max-w-lg sm:mx-auto sm:text-center lg:text-left lg:mx-0 flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
                        <a href="/login" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-xl shadow-lg text-white bg-primary-blue hover:bg-primary-blue-dark transition duration-150 transform hover:scale-[1.03]">
                            Mulai Sekarang
                        </a>
                        <a href="#alur" class="inline-flex items-center justify-center px-6 py-3 border border-primary-blue text-base font-medium rounded-xl text-primary-blue bg-white hover:bg-light-bg transition duration-150 transform hover:scale-[1.03]">
                            Lihat Alur
                        </a>
                    </div>
                </div>

                <div class="mt-12 relative lg:mt-0 lg:col-span-6 hidden sm:block">
                    <div class="relative w-full aspect-w-16/9">
                        <div class="relative max-w-lg mx-auto lg:max-w-none">
                            <div class="bg-accent-orange rounded-[2rem] p-6 shadow-xl transform rotate-3 scale-95 opacity-50 absolute inset-0 transition duration-300 hover:rotate-2"></div>
                            <div class="bg-primary-blue rounded-[2rem] p-8 shadow-2xl relative transition duration-300 hover:-translate-y-1">
                                <svg class="h-20 w-20 mx-auto text-white opacity-80" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                </svg>
                                <p class="mt-4 text-center text-2xl font-bold text-white tracking-wider">SIKP V2.0</p>
                                <p class="text-center text-sm text-gray-200">Akses 24/7 untuk Mahasiswa & Dosen</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <hr class="max-w-7xl mx-auto border-gray-200">

    <section id="fitur" class="py-16 sm:py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center">
                <h2 class="text-base text-accent-orange font-semibold tracking-wide uppercase">Efisiensi & Transparansi</h2>
                <p class="mt-2 text-3xl font-extrabold text-gray-900 sm:text-4xl">
                    Fitur Utama SIKP UNIB
                </p>
            </div>

            <div class="mt-12 grid grid-cols-1 gap-8 md:grid-cols-3">

                <div class="pt-6">
                    <div class="flow-root bg-light-bg rounded-xl px-6 pb-8 shadow-md hover:shadow-xl h-full transition duration-300 transform hover:-translate-y-1">
                        <div class="-mt-6">
                            <div>
                                <span class="inline-flex items-center justify-center p-3 bg-primary-blue rounded-full shadow-lg">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 18.291m-1.897-4.102a.75.75 0 00.046-.013L9.585 14.85l.013.046L15.3 15.3M8.25 15.75L12 12m0 0l4.5 4.5" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="mt-8 text-xl font-medium tracking-tight text-gray-900">Pendaftaran Cepat</h3>
                            <p class="mt-5 text-base text-gray-500">
                                Proses pengajuan Kerja Praktek yang 100% digital, tanpa perlu cetak berkas di awal. Ajukan di mana saja dan kapan saja.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <div class="flow-root bg-light-bg rounded-xl px-6 pb-8 shadow-md hover:shadow-xl h-full transition duration-300 transform hover:-translate-y-1">
                        <div class="-mt-6">
                            <div>
                                <span class="inline-flex items-center justify-center p-3 bg-accent-orange rounded-full shadow-lg">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21a9 9 0 007.662-4.195 9 9 0 00-7.662 4.195z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3a9 9 0 00-7.662 4.195 9 9 0 007.662-4.195z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 3a9 9 0 00-7.662 4.195 9 9 0 007.662-4.195z" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="mt-8 text-xl font-medium tracking-tight text-gray-900">Digital Logbook & Revisi</h3>
                            <p class="mt-5 text-base text-gray-500">
                                Catatan harian KP (Logbook) dan proses revisi laporan terintegrasi langsung dengan Dosen Pembimbing.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="pt-6">
                    <div class="flow-root bg-light-bg rounded-xl px-6 pb-8 shadow-md hover:shadow-xl h-full transition duration-300 transform hover:-translate-y-1">
                        <div class="-mt-6">
                            <div>
                                <span class="inline-flex items-center justify-center p-3 bg-primary-blue rounded-full shadow-lg">
                                    <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25L12 20.25l-3.75-3.0m7.5-7.5l-1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 18.291m-1.897-4.102a.75.75 0 00.046-.013L9.585 14.85l.013.046L15.3 15.3M8.25 15.75L12 12m0 0l4.5 4.5" />
                                    </svg>
                                </span>
                            </div>
                            <h3 class="mt-8 text-xl font-medium tracking-tight text-gray-900">Status Real-Time</h3>
                            <p class="mt-5 text-base text-gray-500">
                                Pantau status pendaftaran, nama Dosen Pembimbing, dan nilai akhir KP Anda secara langsung dan akurat.
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section id="alur" class="bg-primary-blue py-16 sm:py-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-center text-base text-white font-semibold tracking-wide uppercase">Proses Digital</h2>
            <p class="mt-2 text-3xl font-extrabold text-white text-center sm:text-4xl">
                Alur Kerja Praktek di SIKP
            </p>

            <div class="mt-12 space-y-8 sm:space-y-12 max-w-xl mx-auto">

                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <span class="h-10 w-10 flex items-center justify-center rounded-full bg-accent-orange text-white text-lg font-bold shadow-md">1</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-white">Pendaftaran Online</h3>
                        <p class="mt-1 text-gray-200">Mahasiswa mengisi formulir digital dan mengunggah dokumen persyaratan awal ke sistem.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <span class="h-10 w-10 flex items-center justify-center rounded-full bg-accent-orange text-white text-lg font-bold shadow-md">2</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-white">Penentuan Dosen Pembimbing</h3>
                        <p class="mt-1 text-gray-200">Koordinator KP/Departemen menunjuk Dosen Pembimbing dan SK terbit di sistem.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <span class="h-10 w-10 flex items-center justify-center rounded-full bg-accent-orange text-white text-lg font-bold shadow-md">3</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-white">Pelaksanaan & Bimbingan</h3>
                        <p class="mt-1 text-gray-200">Mahasiswa mengisi logbook harian dan Dosen Pembimbing memvalidasi logbook serta memberikan bimbingan laporan via sistem.</p>
                    </div>
                </div>

                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <span class="h-10 w-10 flex items-center justify-center rounded-full bg-accent-orange text-white text-lg font-bold shadow-md">4</span>
                    </div>
                    <div class="ml-4">
                        <h3 class="text-xl font-bold text-white">Penilaian Akhir</h3>
                        <p class="mt-1 text-gray-200">Dosen Pembimbing dan Pihak Mitra memberikan nilai yang akan direkap otomatis oleh SIKP.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer id="kontak" class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto py-12 px-4 overflow-hidden sm:px-6 lg:px-8">
            <nav class="-mx-5 -my-2 flex flex-wrap justify-center" aria-label="Footer">
                <div class="px-5 py-2">
                    <a href="#fitur" class="text-base text-gray-400 hover:text-white transition duration-150">Fitur</a>
                </div>
                <div class="px-5 py-2">
                    <a href="#alur" class="text-base text-gray-400 hover:text-white transition duration-150">Alur KP</a>
                </div>
                <div class="px-5 py-2">
                    <a href="https://unib.ac.id" target="_blank" class="text-base text-gray-400 hover:text-white transition duration-150">Portal UNIB</a>
                </div>
            </nav>
            <p class="mt-8 text-center text-base text-gray-400">
                &copy; 2024 SIKP Universitas Bengkulu. Dikelola oleh Departemen.
            </p>
        </div>
    </footer>

</body>
</html>
