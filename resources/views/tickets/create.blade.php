<x-base-layout>
    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <h1 class="text-3xl font-bold mb-6">Ticket aanmaken</h1>

        <form action="{{ route('tickets.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Prijs -->
            <div>
                <label for="price" class="block text-sm font-medium text-gray-700">
                    Prijs (€)
                </label>
                <input
                    type="number"
                    step="0.01"
                    name="price"
                    id="price"
                    required
                    value="{{ old('price') }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500"
                >
            </div>

            <!-- Stoel -->
            <div>
                <label for="seat" class="block text-sm font-medium text-gray-700">
                    Stoel
                </label>
                <input
                    type="text"
                    name="seat"
                    id="seat"
                    required
                    value="{{ old('seat') }}"
                    placeholder="Bijv. Rij 3B"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500"
                >
            </div>

            <!-- Voorstelling -->
            <div>
                <label for="performance_id" class="block text-sm font-medium text-gray-700">
                    Voorstelling
                </label>
                <select
                    name="performance_id"
                    id="performance_id"
                    required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500"
                >
                    <option value="">-- Kies een voorstelling --</option>

                    @foreach ($performances as $performance)
                        <option value="{{ $performance->id }}"
                            {{ old('performance_id') == $performance->id ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::parse($performance->datetime)->format('d-m-Y H:i') }}
                            — Zaal: {{ $performance->hall->name ?? 'Onbekend' }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Knoppen -->
            <div class="flex space-x-4">
                <a href="{{ route('tickets.index') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
                    Terug
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                    Opslaan
                </button>
            </div>
        </form>
    </div>

    <!-- Validatie errors -->
        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

    
</x-base-layout>
