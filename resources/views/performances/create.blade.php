<x-base-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <h1 class="text-3xl font-bold mb-8">Nieuwe Voorstelling</h1>

        <form action="{{ route('performances.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Datum & Tijd -->
            <div>
                <label for="datetime" class="block text-sm font-medium text-gray-700">
                    Datum & Tijd
                </label>
                <input
                    type="datetime-local"
                    name="datetime"
                    id="datetime"
                    required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100
                           focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Beschikbare stoelen -->
            <div>
                <label for="available_seats" class="block text-sm font-medium text-gray-700">
                    Beschikbare stoelen
                </label>
                <input
                    type="number"
                    name="available_seats"
                    id="available_seats"
                    min="0"
                    required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100
                           focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Zaal -->
            <div>
                <label for="hall_id" class="block text-sm font-medium text-gray-700">
                    Zaal
                </label>
                <select
                    name="hall_id"
                    id="hall_id"
                    required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100
                           focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="">-- Kies een zaal --</option>
                    @foreach ($halls as $hall)
                        <option value="{{ $hall->id }}">
                            {{ $hall->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit -->
            <div>
                <button
                    type="submit"
                    class="mt-3 w-full px-4 py-3 bg-indigo-600 text-white rounded-md
                           hover:bg-indigo-700 transition">
                    Aanmaken
                </button>
            </div>
        </form>
    </div>

    <!-- Succes bericht -->
    @if (session('success'))
        <div class="mb-4 flex items-center justify-between rounded bg-green-100 px-4 py-3 text-green-800">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 font-bold">&times;</button>
        </div>
    @endif

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
