<x-base-layout>
    <div class="max-w-3xl mx-auto p-6 bg-white rounded-lg shadow-md mt-6">
        <h1 class="text-3xl font-bold mb-8">Nieuwe Genre</h1>

        <form action="{{ route('genres.store') }}" method="POST" class="space-y-5">
            @csrf

            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-black-300">Genre Naam</label>
                <input type="text" name="name" id="name" required
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2 focus:ring-indigo-500 focus:border-indigo-500 bg-gray-100">
            </div>

            <div>
                <button type="submit" class="mt-3 w-full px-4 py-3 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition">
                    Aanmaken
                </button>
            </div>
        </form>
    </div>
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
