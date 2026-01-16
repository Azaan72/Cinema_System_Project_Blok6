<x-base-layout>
    <x-slot name="title">Films</x-slot>

    <!-- Filter form -->
    <form method="GET" action="{{ route('movies.index') }}" class="mb-4 flex flex-wrap items-end gap-4">

        <!-- Genre filter -->
        <div class="flex flex-col">
            <label for="genre_id" class="font-medium">Genre</label>
            <select name="genre_id" id="genre_id" class="border border-gray-300 rounded p-2">
                <option value="">-- Alle genres --</option>
                @foreach($genres as $genre)
                    <option value="{{ $genre->id }}"
                        {{ request('genre_id') == $genre->id ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Min prijs -->
        <div class="flex flex-col">
            <label for="min_price" class="font-medium">Min prijs (€)</label>
            <input type="number" name="min_price" id="min_price" step="0.01" class="border p-2 rounded"
                   value="{{ request('min_price') }}">
        </div>

        <!-- Max prijs -->
        <div class="flex flex-col">
            <label for="max_price" class="font-medium">Max prijs (€)</label>
            <input type="number" name="max_price" id="max_price" step="0.01" class="border p-2 rounded"
                   value="{{ request('max_price') }}">
        </div>

        <!-- Submit button -->
        <div>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                Filter
            </button>
        </div>
    </form>

    <!-- Movies list -->
    <div class="flex flex-wrap -m-2">
        @foreach ($movies as $movie)
            <a href="{{ route('movies.show', $movie->id) }}" class="m-2 w-1/4">
                <div class="p-4 bg-gray-100 rounded shadow hover:bg-gray-200 transition cursor-pointer">

                    <!-- Titel film -->
                    <h2 class="text-lg font-semibold">{{ $movie->title }}</h2>

                    <!-- Genres -->
                    <p class="text-sm text-gray-600">
                        Genres:
                        @if ($movie->genres->isNotEmpty())
                            {{ $movie->genres->pluck('name')->join(', ') }}
                        @else
                            <span class="italic text-gray-400">Onbekend</span>
                        @endif
                    </p>

                    <!-- Tickets -->
                    <div class="mt-2">
                        <strong>Tickets:</strong>
                        @php
                            $tickets = $movie->performances->flatMap(fn($p) => $p->tickets);
                        @endphp

                        @if ($tickets->isEmpty())
                            <p class="text-gray-500 text-sm">Geen tickets beschikbaar.</p>
                        @else
                            <ul class="text-sm text-gray-700 list-disc list-inside">
                                @foreach ($tickets as $ticket)
                                    <li>
                                        €{{ number_format($ticket->price, 2, ',', '.') }} — Stoel: {{ $ticket->seat }}
                                        @if ($ticket->performance)
                                            ({{ date('d-m-Y H:i', strtotime($ticket->performance->datetime)) }})
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                </div>
            </a>
        @endforeach
    </div>

    <!-- Voeg nieuwe film toe -->
    <a href="{{ route('movies.create') }}">
        <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Voeg nieuwe film toe
        </button>
    </a>

    <!-- Succesmelding -->
    @if (session('success'))
        <div class="mb-4 flex items-center justify-between rounded bg-green-100 px-4 py-3 text-green-800">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 font-bold text-green-800">&times;</button>
        </div>
    @endif
</x-base-layout>
