<x-base-layout>
    <div class="max-w-md mx-auto mt-12 p-6 bg-gray-100 rounded-lg shadow-md text-center">

        <h2 class="text-2xl font-bold mb-4">
            {{ $hall->name }}
        </h2>

        <p class="text-gray-700 mb-3">
            <strong>Capaciteit:</strong> {{ $hall->capacity }} stoelen
        </p>

        <p class="text-gray-700 mb-6">
            <strong>Schermgrootte:</strong> {{ $hall->screen_size }}
        </p>

        <!-- Voorstellingen -->
        <div class="mt-6">
            <h3 class="text-xl font-bold mb-3">Voorstellingen</h3>

            @if ($hall->performances->isEmpty())
                <p class="text-gray-500">Geen voorstellingen gepland.</p>
            @else
                <ul class="space-y-2">
                    @foreach ($hall->performances as $performance)
                        <li class="p-3 bg-gray-200 rounded text-left">
                            <strong>Datum & Tijd:</strong>
                            {{ \Carbon\Carbon::parse($performance->datetime)->format('d-m-Y H:i') }}<br>

                            <strong>Beschikbare stoelen:</strong>
                            {{ $performance->available_seats }}

                            <div class="mt-2">
                                <a href="{{ route('performances.show', $performance->id) }}"
                                   class="text-indigo-600 hover:underline text-sm">
                                    Bekijk voorstelling →
                                </a>
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Acties -->
        <div class="flex justify-center space-x-4 mt-6 mb-4">
            <a href="{{ route('halls.edit', $hall->id) }}">
                <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    Bewerk
                </button>
            </a>

            <form action="{{ route('halls.destroy', $hall->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                    Verwijder
                </button>
            </form>
        </div>

        <!-- Terug -->
        <a href="{{ route('halls.index') }}">
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
