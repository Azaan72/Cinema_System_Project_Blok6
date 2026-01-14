<x-base-layout>
    <div class="max-w-md mx-auto mt-12 p-6 bg-gray-100 rounded-lg shadow-md text-center">
        <h2 class="text-2xl font-bold mb-6">Genre: {{ $genre->name }}</h2>

        <!-- Bewerk en Verwijder knoppen -->
        <div class="flex justify-center space-x-4 mb-4">
            <!-- Bewerk knop -->
            <a href="{{ route('genres.edit', $genre->id) }}">
                <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    Bewerk
                </button>
            </a>

            <!-- Verwijder knop -->
            <form action="{{ route('genres.destroy', $genre->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                    Verwijder
                </button>
            </form>
        </div>

        <!-- Terug knop -->
        <a href="{{ route('genres.index') }}">
            <button class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">
                Terug
            </button>
        </a>
    </div>
</x-base-layout>
