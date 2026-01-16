<x-base-layout>
    <x-slot name="title">Bewerk Gebruiker</x-slot>

    <div class="max-w-xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <h1 class="text-3xl font-bold mb-6">Bewerk gebruiker</h1>

        <!-- Formulier -->
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Voornaam -->
            <div>
                <label for="firstname" class="block text-sm font-medium text-gray-700">Voornaam</label>
                <input type="text" name="firstname" id="firstname"
                       value="{{ old('firstname', $user->firstname) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100">
            </div>

            <!-- Achternaam -->
            <div>
                <label for="lastname" class="block text-sm font-medium text-gray-700">Achternaam</label>
                <input type="text" name="lastname" id="lastname"
                       value="{{ old('lastname', $user->lastname) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100">
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email"
                       value="{{ old('email', $user->email) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100">
            </div>

                        <!-- Telefoon -->
            <div>
                <label for="phonenumber" class="block text-sm font-medium text-gray-700">Telefoon</label>
                <input type="text" name="phonenumber" id="phonenumber"
                    value="{{ old('phonenumber', $user->phonenumber) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100">
            </div>

            <!-- Adres -->
            <div>
                <label for="adress" class="block text-sm font-medium text-gray-700">Adres</label>
                <input type="text" name="adress" id="adress"
                    value="{{ old('adress', $user->adress) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100">
            </div>

            <!-- Postcode -->
            <div>
                <label for="zip_code" class="block text-sm font-medium text-gray-700">Postcode</label>
                <input type="text" name="zip_code" id="zip_code"
                    value="{{ old('zip_code', $user->zip_code) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100">
            </div>

            <!-- Stad -->
            <div>
                <label for="city" class="block text-sm font-medium text-gray-700">Stad</label>
                <input type="text" name="city" id="city"
                    value="{{ old('city', $user->city) }}"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100">
            </div>

            <!-- Customer ID -->
            <div>
                <label for="customer_id" class="block text-sm font-medium text-gray-700">Customer ID</label>
                <input type="text" name="customer_id" id="customer_id"
                       value="{{ old('customer_id', $user->customer_id) }}"
                       class="mt-1 block w-full border border-gray-300 rounded-md p-2 bg-gray-100">
            </div>

            <!-- Knoppen -->
            <div class="flex space-x-4 mt-4">
                <!-- Terug knop -->
                <a href="{{ route('users.index') }}"
                   class="px-4 py-2 bg-gray-300 text-gray-700 rounded hover:bg-gray-400 transition">
                    Annuleer
                </a>

                <!-- Opslaan knop -->
                <button type="submit"
                        class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                    Opslaan
                </button>
            </div>
        </form>

        <!-- Validatie errors -->
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
</x-base-layout>
