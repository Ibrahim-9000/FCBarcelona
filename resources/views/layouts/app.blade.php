<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>FC Barcelona — {{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.1/dist/cdn.min.js"></script>
</head>
<body class="font-sans antialiased bg-gray-50 flex flex-col min-h-screen">

    {{-- Navigatie --}}
    <nav class="bg-[#004D98] text-white shadow-md">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-wide">
                <span class="text-[#A50044]">FC</span> <span class="text-white">Barcelona</span>
            </a>

            <div class="flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('nieuws.index') }}" class="hover:text-[#EDBB00] transition">Nieuws</a>
                <a href="{{ route('faq.index') }}" class="hover:text-[#EDBB00] transition">FAQ</a>
                <a href="{{ route('contact.create') }}" class="hover:text-[#EDBB00] transition">Contact</a>

                @auth
                    <a href="{{ route('profile.edit') }}" class="hover:text-[#EDBB00] transition">Profiel</a>

                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.users.index') }}" class="hover:text-[#EDBB00] transition">Gebruikers</a>
                        <a href="{{ route('admin.contact.index') }}" class="hover:text-[#EDBB00] transition">Berichten</a>
                    @endif

                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="bg-[#A50044] text-white px-4 py-2 rounded hover:bg-[#8a0039] transition text-sm">
                            Log uit
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="hover:text-[#EDBB00] transition">Log in</a>
                    <a href="{{ route('register') }}" class="bg-[#A50044] text-white px-4 py-2 rounded hover:bg-[#8a0039] transition">
                        Registreer
                    </a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- Page Heading --}}
    @isset($header)
        <header class="bg-[#004D98] text-white">
            <div class="max-w-7xl mx-auto py-5 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
    @endisset

    {{-- Page Content --}}
    <main class="flex-1">
        {{ $slot }}
    </main>

    {{-- Footer --}}
    <footer class="bg-[#004D98] text-gray-400 text-center py-5 text-sm">
        <p>© {{ date('Y') }} FC Barcelona Fansite — Gemaakt met ❤️ door een echte Barça fan</p>
    </footer>

</body>
</html>