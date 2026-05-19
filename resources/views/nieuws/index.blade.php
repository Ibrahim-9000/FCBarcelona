<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuws
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @forelse($newsItems as $item)
                <div class="bg-white shadow rounded-lg p-6 mb-4">
                    <h3 class="text-lg font-bold">{{ $item->title }}</h3>
                    <p class="text-sm text-gray-500 mb-2">{{ $item->created_at->format('d/m/Y') }}</p>
                    <p>{{ Str::limit($item->body, 150) }}</p>
                </div>
            @empty
                <p class="text-gray-500">Nog geen nieuwsberichten.</p>
            @endforelse

        </div>
    </div>
</x-app-layout>