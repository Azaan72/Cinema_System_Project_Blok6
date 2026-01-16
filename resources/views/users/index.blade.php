<x-base-layout>
    <x-slot name="title">Gebruikers</x-slot>

    <h1 class="text-3xl font-bold mb-6">Gebruikers</h1>

    <!-- Tabel van gebruikers -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200 rounded-md shadow-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">ID</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Naam</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Email</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Customer ID</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Acties</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr class="border-t border-gray-200 hover:bg-gray-50">
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->id }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->firstname }} {{ $user->lastname }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->email }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700">{{ $user->customer_id ?? '-' }}</td>
                        <td class="px-4 py-2 text-sm text-gray-700 flex gap-2">
                            <a href="{{ route('users.show', $user->id) }}"
                               class="px-2 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 transition text-sm">
                                Bekijk
                            </a>

                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                  onsubmit="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="px-2 py-1 bg-red-500 text-white rounded hover:bg-red-600 transition text-sm">
                                    Verwijder
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                            Geen gebruikers gevonden.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Voeg nieuwe gebruiker toe -->
    <a href="{{ route('users.create') }}">
        <button class="mt-4 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
            Voeg nieuwe gebruiker toe
        </button>
    </a>

    <!-- Succesmelding -->
    @if (session('success'))
        <div class="mb-4 flex items-center justify-between rounded bg-green-100 px-4 py-3 text-green-800 mt-4">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 font-bold text-green-800">&times;</button>
        </div>
    @endif
</x-base-layout>