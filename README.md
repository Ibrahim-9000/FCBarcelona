<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FC Barcelona Fansite</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.15.1/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    {{-- Navigatie --}}
    <nav class="bg-[#004D98] text-white shadow-md">
        <div class="max-w-6xl mx-auto px-6 py-4 flex justify-between items-center">
            <a href="/" class="text-xl font-bold tracking-wide">
                <span class="text-[#A50044]">FC</span> <span class="text-white">Barcelona</span>
            </a>

            <div class="flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('nieuws.index') }}" class="hover:text-[#EDBB00] transition">Nieuws</a>
                <a href="{{ route('faq.index') }}" class="hover:text-[#EDBB00] transition">FAQ</a>
                <a href="{{ route('contact.create') }}" class="hover:text-[#EDBB00] transition">Contact</a>

                @auth
                    @if(auth()->user()->is_admin)
                        <a href="{{ route('admin.users.index') }}" class="hover:text-[#EDBB00] transition">Gebruikers</a>
                        <a href="{{ route('admin.contact.index') }}" class="hover:text-[#EDBB00] transition">Berichten</a>
                    @endif

                    <a href="{{ route('profile.edit') }}" class="hover:text-[#EDBB00] transition flex items-center gap-2">
                        @if(auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" class="w-8 h-8 rounded-full object-cover">
                        @else
                            <div class="w-8 h-8 rounded-full bg-[#A50044] flex items-center justify-center text-white text-xs font-bold">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </div>
                        @endif
                        {{ auth()->user()->name }}
                    </a>

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

    {{-- Hero --}}
    <div class="bg-[#004D98] text-white py-24 text-center px-6">
        <p class="text-[#EDBB00] text-sm uppercase tracking-widest mb-3 font-semibold">Welkom op de fansite</p>
        <h1 class="text-5xl font-bold mb-4">Més que un club</h1>
        <p class="text-gray-300 text-lg mb-8 max-w-xl mx-auto">
            Volg het laatste nieuws, stel vragen en neem contact op met onze community.
        </p>
        <div class="flex justify-center gap-4 flex-wrap">
            <a href="{{ route('nieuws.index') }}" class="bg-[#A50044] text-white px-6 py-3 rounded font-semibold hover:bg-[#8a0039] transition">
                Bekijk Nieuws
            </a>
            @guest
                <a href="{{ route('register') }}" class="border border-white text-white px-6 py-3 rounded font-semibold hover:bg-white hover:text-[#004D98] transition">
                    Word lid
                </a>
            @endguest
        </div>
    </div>

    {{-- Secties --}}
    <div class="max-w-6xl mx-auto px-6 py-16 grid grid-cols-1 md:grid-cols-3 gap-6 flex-1">
        <a href="{{ route('nieuws.index') }}" class="bg-white rounded-lg border border-gray-200 p-8 hover:shadow-md transition text-center group">
            <div class="text-3xl mb-4">📰</div>
            <h2 class="text-lg font-bold text-[#004D98] mb-2 group-hover:text-[#A50044] transition">Nieuws</h2>
            <p class="text-gray-500 text-sm">Blijf op de hoogte van het laatste Barça nieuws.</p>
        </a>

        <a href="{{ route('faq.index') }}" class="bg-white rounded-lg border border-gray-200 p-8 hover:shadow-md transition text-center group">
            <div class="text-3xl mb-4">❓</div>
            <h2 class="text-lg font-bold text-[#004D98] mb-2 group-hover:text-[#A50044] transition">FAQ</h2>
            <p class="text-gray-500 text-sm">Antwoorden op de meest gestelde vragen.</p>
        </a>

        <a href="{{ route('contact.create') }}" class="bg-white rounded-lg border border-gray-200 p-8 hover:shadow-md transition text-center group">
            <div class="text-3xl mb-4">✉️</div>
            <h2 class="text-lg font-bold text-[#004D98] mb-2 group-hover:text-[#A50044] transition">Contact</h2>
            <p class="text-gray-500 text-sm">Stuur ons een bericht, we helpen je graag.</p>
        </a>
    </div>

    {{-- Footer --}}
    <footer class="bg-[#004D98] text-gray-400 text-center py-5 text-sm">
        <p>© {{ date('Y') }} FC Barcelona Fansite — Gemaakt met ❤️ door een echte Barça fan</p>
    </footer>

</body>
</html>
