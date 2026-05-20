<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            FAQ
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @auth
                <a href="{{ route('faq.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 mb-6 inline-block">
                    + Categorie toevoegen
                </a>
            @endauth

            @forelse($categories as $category)
                <div class="bg-white shadow rounded-lg p-6 mb-4">
                    <h3 class="text-lg font-bold mb-2">{{ $category->name }}</h3>

                    @foreach($category->faqItems as $item)
                        <div class="mb-3 border-t pt-3">
                            <p class="font-semibold">{{ $item->question }}</p>
                            <p class="text-gray-600">{{ $item->answer }}</p>

                            @auth
                                <form action="{{ route('faq.items.destroy', $item) }}" method="POST" class="mt-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 text-sm hover:underline">Verwijder vraag</button>
                                </form>
                            @endauth
                        </div>
                    @endforeach

                    @auth
                        <form action="{{ route('faq.items.store', $category) }}" method="POST" class="mt-4">
                            @csrf
                            <input type="text" name="question" placeholder="Vraag" class="border rounded p-2 w-full mb-2" required>
                            <textarea name="answer" placeholder="Antwoord" class="border rounded p-2 w-full mb-2" required></textarea>
                            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Vraag toevoegen</button>
                        </form>

                        <form action="{{ route('faq.destroy', $category) }}" method="POST" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 text-sm hover:underline">Verwijder categorie</button>
                        </form>
                    @endauth
                </div>
            @empty
                <p class="text-gray-500">Nog geen FAQ categorieën.</p>
            @endforelse

        </div>
    </div>
</x-app-layout>