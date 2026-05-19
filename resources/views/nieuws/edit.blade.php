<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuwsbericht bewerken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('nieuws.update', $newsItem) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Titel</label>
                        <input type="text" name="title" class="w-full border rounded p-2" value="{{ $newsItem->title }}">
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Inhoud</label>
                        <textarea name="body" rows="6" class="w-full border rounded p-2">{{ $newsItem->body }}</textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Nieuwe afbeelding (optioneel)</label>
                        <input type="file" name="image" class="w-full border rounded p-2">
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
                        Opslaan
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>