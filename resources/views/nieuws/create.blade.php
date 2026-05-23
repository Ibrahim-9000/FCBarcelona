<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Nieuwsbericht aanmaken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('nieuws.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Titel</label>
                        <input type="text" name="title" class="w-full border rounded p-2" value="{{ old('title') }}" required minlength="2">
                        @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Inhoud</label>
                        <textarea name="body" rows="6" class="w-full border rounded p-2" required>{{ old('body') }}</textarea>
                        @error('body') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Afbeelding (optioneel)</label>
                        <input type="file" name="image" accept="image/*" class="w-full border rounded p-2">
                        @error('image') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Publicatiedatum</label>
                        <input type="datetime-local" name="published_at" class="w-full border rounded p-2" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
                        @error('published_at') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Opslaan
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>