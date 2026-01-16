<x-base-layout>
    <div class="max-w-md mx-auto mt-12 p-6 bg-gray-100 rounded-lg shadow-md text-center">

        <h2 class="text-2xl font-bold mb-4">
            Ticket #{{ $ticket->id }}
        </h2>

        <p class="text-gray-700 mb-3">
            <strong>Prijs:</strong>
            €{{ number_format($ticket->price, 2, ',', '.') }}
        </p>

        <p class="text-gray-700 mb-3">
            <strong>Stoel:</strong>
            {{ $ticket->seat }}
        </p>

        <p class="text-gray-700 mb-6">
            <strong>Aangemaakt op:</strong>
            {{ $ticket->created_at->format('d-m-Y H:i') }}
        </p>

        <!-- Voorstelling -->
        <div class="mt-6 text-left">
            <h3 class="text-xl font-bold mb-3">Voorstelling</h3>

            @if ($ticket->performance)
                <div class="p-3 bg-gray-200 rounded">
                    <p>
                        <strong>Datum & Tijd:</strong>
                        {{ \Carbon\Carbon::parse($ticket->performance->datetime)->format('d-m-Y H:i') }}
                    </p>

                    <p>
                        <strong>Zaal:</strong>
                        {{ $ticket->performance->hall->name ?? 'Onbekend' }}
                    </p>

                    <p>
                        <strong>Beschikbare stoelen:</strong>
                        {{ $ticket->performance->available_seats }}
                    </p>
                </div>
            @else
                <p class="text-gray-500 italic">Geen voorstelling gekoppeld.</p>
            @endif
        </div>

        <!-- Knoppen -->
        <div class="flex justify-center space-x-4 mt-6">
            <!-- Bewerk -->
            <a href="{{ route('tickets.edit', $ticket->id) }}">
                <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    Bewerk
                </button>
            </a>

            <!-- Verwijder -->
            <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('Weet je zeker dat je dit ticket wilt verwijderen?')"
                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                    Verwijder
                </button>
            </form>
        </div>

        <!-- Terug -->
        <div class="mt-4">
            <a href="{{ route('tickets.index') }}">
                <button class="px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">
                    Terug
                </button>
            </a>
        </div>
    </div>

    <!-- Succesmelding -->
    @if (session('success'))
        <div class="mt-4 flex items-center justify-between rounded bg-green-100 px-4 py-3 text-green-800">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 font-bold">&times;</button>
        </div>
    @endif
</x-base-layout>
