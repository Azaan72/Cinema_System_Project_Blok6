<x-base-layout>
    <div class="flex flex-wrap -m-2">
        @foreach ($performances as $performance)
            <a href="{{ route('performances.show', $performance->id) }}" class="m-2 w-1/4">
                <div class="p-4 bg-gray-100 rounded shadow hover:bg-gray-200 transition cursor-pointer">
                    <h2 class="text-lg font-semibold">
                        {{ \Carbon\Carbon::parse($performance->datetime)->format('d-m-Y H:i') }}
                    </h2>

                    <p class="text-sm text-gray-600">
                        Zaal:
                        {{ $performance->hall->name ?? 'Onbekend' }}
                    </p>

                    <p class="text-sm text-gray-600">
                        Beschikbare stoelen: {{ $performance->available_seats }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>

    <a href="{{ route('performances.create') }}">
        <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Voeg nieuwe voorstelling toe
        </button>
    </a>

    @if (session('success'))
        <div class="mt-4 flex items-center justify-between rounded bg-green-100 px-4 py-3 text-green-800">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 font-bold">&times;</button>
        </div>
    @endif
</x-base-layout>
