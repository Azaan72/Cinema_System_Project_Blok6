<x-base-layout>
    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <h1 class="text-3xl font-bold mb-6">Nieuwe gebruiker aanmaken</h1>

        <form action="{{ route('users.store') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Voornaam -->
            <div>
                <label for="firstname" class="block text-sm font-medium text-gray-700">Voornaam</label>
                <input type="text" name="firstname" id="firstname" required
                       value="{{ old('firstname') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100
                              focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Achternaam -->
            <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700">Achternaam</label>
                <input type="text" name="lastname" id="lastname" required
                       value="{{ old('lastname') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100
                              focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" required
                       value="{{ old('email') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100
                              focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Telefoon -->
            <div>
                <label for="phonenumber" class="block text-sm font-medium text-gray-700">Telefoonnummer</label>
                <input type="text" name="phonenumber" id="phonenumber" required
                       value="{{ old('phonenumber') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100
                              focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Adres -->
            <div>
                <label for="adress" class="block text-sm font-medium text-gray-700">Adres</label>
                <input type="text" name="adress" id="adress" required
                       value="{{ old('adress') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100
                              focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Postcode -->
            <div>
                <label for="zip_code" class="block text-sm font-medium text-gray-700">Postcode</label>
                <input type="text" name="zip_code" id="zip_code" required
                       value="{{ old('zip_code') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100
                              focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Stad -->
            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">Stad</label>
                <input type="text" name="city" id="city" required
                       value="{{ old('city') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100
                              focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Customer ID -->
            <div>
                <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer ID</label>
                <input type="text" name="customer_id" id="customer_id"
                       value="{{ old('customer_id') }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100
                              focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Wachtwoord -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Wachtwoord</label>
                <input type="password" name="password" id="password" required
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100
                              focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Knoppen -->
            <div class="flex gap-4">
                <a href="{{ route('users.index') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
                    Terug
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                    Opslaan
                </button>
            </div>
        </form>

        <!-- Validatie fouten -->
        @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-600">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>

    <!-- Succesmelding -->
    @if (session('success'))
        <div class="mb-4 flex items-center justify-between rounded bg-green-100 px-4 py-3 text-green-800 mt-4">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()" class="ml-4 font-bold text-green-800">&times;</button>
        </div>
    @endif
</x-base-layout>
