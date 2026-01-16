<x-base-layout>
    <div class="flex flex-wrap -m-2">
        @forelse ($tickets as $ticket)
            <a href="{{ route('tickets.show', $ticket->id) }}" class="m-2 w-1/4">
                <div class="p-4 bg-gray-100 rounded shadow hover:bg-gray-200 transition cursor-pointer">
                    
                    <h2 class="text-lg font-semibold">
                        Ticket #{{ $ticket->id }}
                    </h2>

                    <p class="text-sm text-gray-600">
                        <strong>Prijs:</strong> €{{ number_format($ticket->price, 2, ',', '.') }}
                    </p>

                    <p class="text-sm text-gray-600">
                        <strong>Plaats:</strong> {{ $ticket->seat }}
                    </p>

                    <p class="text-sm text-gray-600">
                        <strong>Voorstelling:</strong>
                        @if ($ticket->performance)
                            
                        @else
                            <span class="italic text-gray-400">Geen voorstelling</span>
                        @endif
                    </p>

                </div>
            </a>
        @empty
            <p class="text-gray-500 m-4">Geen tickets gevonden.</p>
        @endforelse
    </div>

    <!-- Nieuw ticket -->
    <a href="{{ route('tickets.create') }}">
        <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Voeg nieuw ticket toe
        </button>
    </a>

    <!-- Succesmelding -->
    @if (session('success'))
        <div class="mt-4 flex items-center justify-between rounded bg-green-100 px-4 py-3 text-green-800">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 font-bold">&times;</button>
        </div>
    @endif
</x-base-layout>
