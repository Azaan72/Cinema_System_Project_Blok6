<x-base-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <h1 class="text-3xl font-bold mb-8">Nieuwe Film</h1>

        <form action="{{ route('movies.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Titel -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Filmtitel</label>
                <input type="text" name="title" id="title" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
            </div>

            <!-- Duur -->
            <div>
                <label for="duration" class="block text-sm font-medium text-gray-700">Duur (minuten)</label>
                <input type="number" name="duration" id="duration" required min="1"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
            </div>

            <!-- Leeftijd -->
            <div>
                <label for="age_limit" class="block text-sm font-medium text-gray-700">Leeftijdsgrens</label>
                <input type="number" name="age_limit" id="age_limit" required min="0"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
            </div>

            <!-- Beschrijving -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving</label>
                <textarea name="description" id="description" rows="4" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100"></textarea>
            </div>

            <!-- Genres (multi-select) -->
            <div>
                <label for="genres" class="block text-sm font-medium text-gray-700">Genres</label>
                <select name="genres[]" id="genres" multiple required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                <p class="text-xs text-gray-500 mt-1">Houd Ctrl ingedrukt om meerdere genres te selecteren.</p>
            </div>

             <div>
                <label for="performance_id" class="block text-sm font-medium text-gray-700">Uitvoering</label>
                <select name="performance_id" id="performance_id" required
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100 focus:ring-indigo-500 focus:border-indigo-500">
                    @foreach($performances as $performance)
                        <option value="{{ $performance->id }}"
                            {{ isset($movie) && $movie->performances->contains($performance->id) ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::parse($performance->datetime)->format('d-m-Y H:i') }} 
                            - Zaal: {{ $performance->hall->name ?? 'Onbekend' }}
                        </option>
                    @endforeach
                </select>
            </div>



            <!-- Submit -->
            <div>
                <button type="submit"
                    class="mt-3 w-full px-4 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                    Aanmaken
                </button>
            </div>
        </form>
    </div>

    <!-- Succes bericht -->
    @if (session('success'))
        <div class="mb-4 flex items-center justify-between rounded bg-green-100 px-4 py-3 text-green-800">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 font-bold text-green-800">&times;</button>
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
