<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $newsItem->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <h1 class="text-2xl font-bold mb-2">{{ $newsItem->title }}</h1>
                <p class="text-sm text-gray-500 mb-4">{{ $newsItem->created_at->format('d/m/Y') }}</p>

                @if($newsItem->image)
                    <img src="{{ asset('storage/' . $newsItem->image) }}" class="mb-4 rounded">
                @endif

                <p>{{ $newsItem->body }}</p>

                <a href="{{ route('nieuws.index') }}" class="mt-6 inline-block text-blue-600 hover:underline">
                    ← Terug naar nieuws
                </a>

            </div>
        </div>
    </div>
</x-app-layout>