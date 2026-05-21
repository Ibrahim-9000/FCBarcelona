<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuws
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('nieuws.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-6 inline-block">
                        + Nieuwsbericht toevoegen
                    </a>
                @endif
            @endauth

            @forelse($newsItems as $item)
                <a href="{{ route('nieuws.show', $item) }}" class="block mb-4">
                    <div class="bg-white shadow rounded-lg p-6 hover:shadow-md transition">
                        <h3 class="text-lg font-bold">{{ $item->title }}</h3>
                        <p class="text-sm text-gray-500 mb-2">{{ $item->created_at->format('d/m/Y') }}</p>
                        <p>{{ Str::limit($item->body, 150) }}</p>
                    </div>
                </a>
            @empty
                <p class="text-gray-500">Nog geen nieuwsberichten.</p>
            @endforelse

        </div>
    </div>
</x-app-layout>