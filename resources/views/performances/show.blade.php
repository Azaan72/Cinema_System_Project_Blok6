<x-base-layout>
    <div class="max-w-md mx-auto mt-12 p-6 bg-gray-100 rounded-lg shadow-md text-center">

        <h2 class="text-2xl font-bold mb-4">
            Voorstelling
        </h2>

        <p class="text-gray-700 mb-4">
            <strong>Datum & Tijd:</strong><br>
            {{ \Carbon\Carbon::parse($performance->datetime)->format('d-m-Y H:i') }}
        </p>

        <p class="text-gray-700 mb-4">
            <strong>Zaal:</strong><br>
            {{ $performance->hall->name ?? 'Onbekend' }}
        </p>

        <p class="text-gray-700 mb-6">
            <strong>Beschikbare stoelen:</strong><br>
            {{ $performance->available_seats }}
        </p>

    

        <!-- Bewerk / Verwijder -->
        <div class="flex justify-center space-x-4 mt-6 mb-4">
            <a href="{{ route('performances.edit', $performance->id) }}">
                <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    Bewerk
                </button>
            </a>

            <form action="{{ route('performances.destroy', $performance->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                    Verwijder
                </button>
            </form>
        </div>

        <!-- Terug -->
        <a href="{{ route('performances.index') }}">
            <button class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">
                Terug
            </button>
        </a>
    </div>

    @if (session('success'))
        <div class="mb-4 flex items-center justify-between rounded bg-green-100 px-4 py-3 text-green-800">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 font-bold text-green-800">&times;</button>
        </div>
    @endif
</x-base-layout>
