<x-base-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <h1 class="text-3xl font-bold mb-8">Voorstelling Bewerken</h1>

        <form action="{{ route('performances.update', $performance->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Datum & Tijd -->
            <div>
                <label for="datetime" class="block text-sm font-medium text-gray-700">Datum & Tijd</label>
                <input type="datetime-local" name="datetime" id="datetime" required
                       value="{{ \Carbon\Carbon::parse($performance->datetime)->format('Y-m-d\TH:i') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Beschikbare stoelen -->
            <div>
                <label for="available_seats" class="block text-sm font-medium text-gray-700">Beschikbare stoelen</label>
                <input type="number" name="available_seats" id="available_seats" min="0" required
                       value="{{ $performance->available_seats }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Zaal -->
            <div>
                <label for="hall_id" class="block text-sm font-medium text-gray-700">Zaal</label>
                <select name="hall_id" id="hall_id" required
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach($halls as $hall)
                        <option value="{{ $hall->id }}"
                            {{ $performance->hall_id == $hall->id ? 'selected' : '' }}>
                            {{ $hall->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Knoppen -->
            <div class="flex space-x-4">
                <a href="{{ route('performances.index') }}"
                   class="mt-3 px-4 py-3 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition text-center">
                    Terug
                </a>

                <button type="submit"
                        class="mt-3 px-4 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                    Opslaan
                </button>
            </div>
        </form>
    </div>

    @if (session('success'))
        <div class="mb-4 flex items-center justify-between rounded bg-green-100 px-4 py-3 text-green-800">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 font-bold text-green-800">&times;</button>
        </div>
    @endif
</x-base-layout>
