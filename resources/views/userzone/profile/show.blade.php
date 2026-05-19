<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Profiel van {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                {{-- Profielfoto --}}
                @if($user->avatar)
                    <img src="{{ asset('storage/' . $user->avatar) }}" alt="Profielfoto" class="w-32 h-32 rounded-full mb-4">
                @else
                    <div class="w-32 h-32 rounded-full bg-gray-300 mb-4 flex items-center justify-center">
                        <span class="text-gray-500">Geen foto</span>
                    </div>
                @endif

                {{-- Naam en username --}}
                <h1 class="text-2xl font-bold">{{ $user->name }}</h1>
                @if($user->username)
                    <p class="text-gray-500">@{{ $user->username }}</p>
                @endif

                {{-- Verjaardag --}}
                @if($user->birthday)
                    <p class="mt-2"> {{ $user->birthday->format('d/m/Y') }}</p>
                @endif

                {{-- Bio --}}
                @if($user->bio)
                    <p class="mt-4">{{ $user->bio }}</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>