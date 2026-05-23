<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contactberichten
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white shadow rounded-lg p-6">
                @forelse($messages as $message)
                    <div class="border-b py-4 {{ $message->is_read ? 'opacity-50' : '' }}">
                        <div class="flex justify-between items-start">
                            <div>
                                <p class="font-bold">{{ $message->name }} — <span class="text-gray-500 font-normal">{{ $message->email }}</span></p>
                                <p class="text-gray-700 mt-1">{{ $message->message }}</p>
                                <p class="text-sm text-gray-400 mt-1">{{ $message->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                            <form action="{{ route('admin.contact.markRead', $message) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <button type="submit" class="text-sm px-3 py-1 rounded {{ $message->is_read ? 'bg-gray-200 text-gray-600' : 'bg-blue-600 text-white hover:bg-blue-700' }}">
                                    {{ $message->is_read ? 'Markeer ongelezen' : 'Markeer gelezen' }}
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Nog geen contactberichten.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>