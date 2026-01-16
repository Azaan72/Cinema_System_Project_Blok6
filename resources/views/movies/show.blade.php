<x-base-layout>
    <div class="max-w-md mx-auto mt-12 p-6 bg-gray-100 rounded-lg shadow-md text-center">
        <h2 class="text-2xl font-bold mb-2">
            {{ $movie->title }}
        </h2>

        <p class="text-gray-600 mb-6">
            Genres:
            @forelse ($movie->genres as $genre)
                <span class="inline-block bg-gray-200 px-2 py-1 rounded text-sm mr-1">
                    {{ $genre->name }}
                </span>
            @empty
                Onbekend
            @endforelse
        </p>

        <p class="text-gray-700 mb-4"><strong>Duur:</strong> {{ $movie->duration }} minuten</p>
        <p class="text-gray-700 mb-4"><strong>Leeftijdsgrens:</strong> {{ $movie->age_limit }}+</p>
        <p class="text-gray-700 mb-6"><strong>Beschrijving:</strong> {{ $movie->description }}</p>

        <!-- Voorstellingen -->
        <div class="mt-6">
            <h3 class="text-xl font-bold mb-3">Voorstellingen</h3>

            @if ($movie->performances->isEmpty())
                <p class="text-gray-500">Geen voorstellingen gepland.</p>
            @else
                <ul class="space-y-4">
                    @foreach ($movie->performances as $performance)
                        <li class="p-3 bg-gray-200 rounded text-left">
                            <strong>Datum & Tijd:</strong> {{ $performance->datetime }} <br>
                            <strong>Zaal:</strong> {{ $performance->hall->name ?? 'Onbekend' }} <br>
                            <strong>Beschikbare stoelen:</strong> {{ $performance->available_seats }}

                            <!-- Tickets voor deze voorstelling -->
                            <div class="mt-2 bg-gray-100 p-2 rounded">
                                <strong>Tickets:</strong>
                                @if ($performance->tickets->isEmpty())
                                    <p class="text-gray-500">Geen tickets beschikbaar.</p>
                                @else
                                    <ul class="list-disc pl-5">
                                        @foreach ($performance->tickets as $ticket)
                                            <li>
                                                Stoel: {{ $ticket->seat }} — €{{ number_format($ticket->price, 2, ',', '.') }}
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>

        <!-- Bewerk en Verwijder knoppen -->
        <div class="flex justify-center space-x-4 mb-4 mt-6">
            <a href="{{ route('movies.edit', $movie->id) }}">
                <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    Bewerk
                </button>
            </a>

            <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                    Verwijder
                </button>
            </form>
        </div>

        <!-- Terug knop -->
        <a href="{{ route('movies.index') }}">
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
