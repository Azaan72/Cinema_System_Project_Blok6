<x-base-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <h1 class="text-3xl font-bold mb-8">Film Bewerken</h1>

        <form action="{{ route('movies.update', $movie->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Titel -->
            <div>
                <label for="title" class="block text-sm font-medium text-gray-700">Titel</label>
                <input type="text" name="title" id="title" required
                       value="{{ $movie->title }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
            </div>

            <!-- Duration -->
            <div>
                <label for="duration" class="block text-sm font-medium text-gray-700">Duur (minuten)</label>
                <input type="number" name="duration" id="duration" required
                       value="{{ $movie->duration }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
            </div>

            <!-- Age limit -->
            <div>
                <label for="age_limit" class="block text-sm font-medium text-gray-700">Leeftijdsgrens</label>
                <input type="number" name="age_limit" id="age_limit" required
                       value="{{ $movie->age_limit }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
            </div>

            <!-- Description -->
            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving</label>
                <textarea name="description" id="description" rows="4"
                          class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">{{ $movie->description }}</textarea>
            </div>

            <!-- Genres dropdown (multiple select) -->
            <div>
                <label for="genres" class="block text-sm font-medium text-gray-700">Genres</label>
                <select name="genres[]" id="genres" multiple
                        class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
                    @foreach($genres as $genre)
                        <option value="{{ $genre->id }}"
                            {{ $movie->genres->contains($genre->id) ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
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
                                {{ isset($movie) && optional($movie->performances->first())->id == $performance->id ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::parse($performance->datetime)->format('d-m-Y H:i') }} 
                                - Zaal: {{ $performance->hall->name ?? 'Onbekend' }}
                            </option>
                        @endforeach
                    </select>
                </div>

    


            <!-- Knoppen -->
            <div class="flex space-x-4">
                <!-- Terug knop -->
                <a href="{{ route('movies.index') }}"
                   class="mt-3 px-4 py-3 bg-gray-300 text-gray-700 rounded-md hover:bg-gray-400 transition text-center">
                    Terug
                </a>

                <!-- Opslaan knop -->
                <button type="submit"
                        class="mt-3 px-4 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                    Opslaan
                </button>
            </div>
        </form>
    </div>

    <!-- Succesmelding -->
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
