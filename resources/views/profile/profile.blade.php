<x-main-layout>
    <div class="main-content">
        <div class="mb-55 mt-35">
            <h1 class="text-4xl font-bold text-left text-black dark:text-white mb-8 pl-54">
                Profilom
            </h1>
            <div class="flex justify-center gap-12 flex-wrap mt-6">
                <div class="relative bg-white dark:bg-gray-800 rounded-xl shadow-md p-8 w-full max-w-3xl text-black dark:text-white">

                    {{-- Felhasználói adatok --}}
                    <div class="mb-6 space-y-1">
                        <p><strong>Név:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    </div>

                    <div class="mt-8">
                        <h2 class="text-xl font-bold mb-4">Kedvenc szolgáltatások</h2>
                        @if(auth()->user()->favoriteServices->isEmpty())
                            <p>Nincs még kedvenc szolgáltatásod.</p>
                        @else
                            <ul class="space-y-3">
                                @foreach(auth()->user()->favoriteServices as $fav)
                                    <li class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg">
                                        <a href="{{ route('services.show', $fav->slug) }}" class="text-[#187aa0] hover:underline">
                                            {{ $fav->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>


                    {{-- Gombok --}}
                    <div class="flex flex-wrap gap-3 mt-6">

                        {{-- Jelszóváltás --}}
                        <a href="{{ route('password.request') }}" class="btn btn-outline btn-sm">Jelszó megváltoztatása</a>

                        {{-- Admin Panel (csak super-adminnak) --}}
                        @if(auth()->user()->isSuperAdmin())
                            <a href="{{ url('admin') }}" class="btn btn-primary btn-sm">Admin Panel</a>
                        @endif

                        {{-- Kijelentkezés --}}
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-outline btn-sm">Kijelentkezés</button>
                        </form>

                        {{-- Fiók törlése --}}
                        <form action="{{ route('profile.destroy') }}" method="POST" onsubmit="return confirm('Biztosan törölni szeretnéd a fiókodat?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error btn-sm">Fiók törlése</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
