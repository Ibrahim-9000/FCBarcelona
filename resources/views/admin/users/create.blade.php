<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gebruiker aanmaken
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Naam</label>
                        <input type="text" name="name" class="w-full border rounded p-2" value="{{ old('name') }}" required minlength="2">
                        @error('name') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Email</label>
                        <input type="email" name="email" class="w-full border rounded p-2" value="{{ old('email') }}" required>
                        @error('email') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-semibold mb-1">Wachtwoord</label>
                        <input type="password" name="password" class="w-full border rounded p-2" required minlength="8">
                        @error('password') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
                    </div>

                    <div class="mb-4 flex items-center gap-2">
                        <input type="checkbox" name="is_admin" id="is_admin" value="1">
                        <label for="is_admin" class="font-semibold">Admin rechten geven</label>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Opslaan
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>