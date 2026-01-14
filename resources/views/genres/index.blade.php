<x-base-layout>
    <div class="flex flex-wrap -m-2">
        @foreach ($genres as $genre)
            <a href="{{ route('genres.show', $genre->id) }}" class="m-2 w-1/4">
                <div class="p-4 bg-gray-100 rounded shadow hover:bg-gray-200 transition cursor-pointer">
                    <h2 class="text-lg font-semibold">{{ $genre->name }}</h2>
                </div>
            </a>
        @endforeach
    </div>

    <a href="{{ route('genres.create') }}">
        <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Voeg nieuwe genre toe
        </button>
    </a>

    @if (session('success'))
     <div class="mb-4 flex items-center justify-between rounded bg-green-100 px-4 py-3 text-green-800">
         <span>{{ session('success') }}</span>
         <button onclick="this.parentElement.remove()" class="ml-4 font-bold text-green-800">&times;</button>
     </div>
    @endif
</x-base-layout>
