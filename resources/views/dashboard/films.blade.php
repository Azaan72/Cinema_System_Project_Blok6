<x-base-layout>
    <x-slot name="title">Films Dashboard</x-slot>

    <h1 class="text-3xl font-bold mb-6">Films Dashboard</h1>

    <!-- Statistieken -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6 mb-8">
        <div class="bg-indigo-600 text-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Totaal Films</h2>
            <p class="text-3xl font-bold">{{ $moviesCount }}</p>
        </div>
        <div class="bg-green-600 text-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Totaal Klanten</h2>
            <p class="text-3xl font-bold">{{ $usersCount }}</p>
        </div>
        <div class="bg-yellow-500 text-white p-6 rounded shadow">
            <h2 class="text-lg font-semibold mb-2">Totaal Tickets</h2>
            <p class="text-3xl font-bold">{{ $ticketsCount }}</p>
        </div>
    </div>

    <a href="{{ route('dashboard.films.pdf') }}" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
    Download PDF
</a>
</x-base-layout>
