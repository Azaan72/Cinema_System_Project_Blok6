<x-base-layout>
    <div class="max-w-md mx-auto mt-12 p-6 bg-gray-100 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-4">{{ $user->firstname }} {{ $user->lastname }}</h2>

        <div class="space-y-3 text-gray-700">
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Telefoonnummer:</strong> {{ $user->phonenumber }}</p>
            <p><strong>Adres:</strong> {{ $user->adress }}</p>
            <p><strong>Postcode & Stad:</strong> {{ $user->zip_code }} {{ $user->city }}</p>
            <p><strong>Klantnummer:</strong> {{ $user->customer_id ?? 'Niet ingesteld' }}</p>
            <p><strong>Aangemaakt op:</strong> {{ $user->created_at->format('d-m-Y H:i') }}</p>
            <p><strong>Laatste update:</strong> {{ $user->updated_at->format('d-m-Y H:i') }}</p>
        </div>

        <!-- Bewerk en Verwijder knoppen -->
        <div class="flex justify-center space-x-4 mt-6">
            <a href="{{ route('users.edit', $user->id) }}">
                <button class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition">
                    Bewerk
                </button>
            </a>

            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                    Verwijder
                </button>
            </form>
        </div>

        <!-- Terug knop -->
        <a href="{{ route('users.index') }}">
            <button class="mt-4 px-4 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">
                Terug
            </button>
        </a>

    </div>

    @if (session('success'))
        <div class="mb-4 flex items-center justify-between rounded bg-green-100 px-4 py-3 text-green-800 mt-4">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 font-bold">&times;</button>
        </div>
    @endif
</x-base-layout>
