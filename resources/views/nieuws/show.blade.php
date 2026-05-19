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

                <div class="mt-6 flex gap-4">
                    <a href="{{ route('nieuws.index') }}" class="text-blue-600 hover:underline">
                        ← Terug naar nieuws
                    </a>

                    @auth
                        <a href="{{ route('nieuws.edit', $newsItem) }}" class="text-yellow-600 hover:underline">
                             Bewerken
                        </a>

                        <form action="{{ route('nieuws.destroy', $newsItem) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline"
                                onclick="return confirm('Ben je zeker dat je dit wil verwijderen?')">
                                Verwijderen
                            </button>
                        </form>
                    @endauth
                </div>

            </div>
        </div>
    </div>
</x-app-layout>