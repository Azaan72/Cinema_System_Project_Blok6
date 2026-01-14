<!doctype html>
<html lang="nl">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>{{ $title ?? 'Dashboard' }}</title>
  <script src="https://cdn.tailwindcss.com"></script>

  <style>
    .card { transition: background-color .15s ease, transform .12s ease; }
    .card:hover { transform: translateY(-2px); }
    .empty-illustration { opacity: .85; }
  </style>
</head>

<body class="min-h-screen bg-slate-50 text-slate-900 antialiased flex flex-col">

  <!-- Header -->
  <header class="bg-white border-b border-slate-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex items-center justify-between h-16">
        <div class="flex items-center gap-3">
          <div class="rounded-md bg-indigo-600 text-white px-2 py-1 font-semibold">
            Dashboard
          </div>
          <h1 class="text-lg font-semibold">
            {{ $title ?? 'Welkom' }}
          </h1>
        </div>

        <nav class="hidden sm:flex items-center gap-4 text-sm text-slate-600">
          <a href="/" class="hover:text-slate-900">Home</a>
          <a href="/movies" class="hover:text-slate-900">Movies</a>
          <a href="/performances" class="hover:text-slate-900">Performances</a>
          <a href="/tickets" class="hover:text-slate-900">Tickets</a>

          @auth
            <span class="ml-4 text-slate-700 font-medium">
              {{ auth()->user()->name }}
            </span>

            <form method="POST" action="{{ route('logout') }}">
              @csrf
              <button class="ml-2 px-3 py-1 rounded-lg bg-red-50 text-red-700 text-sm">
                Logout
              </button>
            </form>
          @else
            <a href="{{ route('login') }}"
               class="ml-4 px-3 py-1 rounded-lg bg-indigo-50 text-indigo-700 text-sm">
              Inloggen
            </a>
          @endauth
        </nav>
      </div>
    </div>
  </header>

  <!-- Main -->
  <main class="flex-1 max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 w-full">
    {{ $slot }}

  </main>

  <!-- Footer -->
  <footer class="border-t border-slate-100 mt-auto">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-sm text-slate-500 text-center">
      &copy; {{ date('Y') }} Dashboard App — Gemaakt met Tailwind CSS
    </div>
  </footer>

</body>
</html>
