<x-main-layout>
    <div class="px-[15px] py-6 text-black w-full box-border">
        <h1 class="text-4xl font-bold text-center text-black dark:text-white mb-8 mt-10">
            Profilom
        </h1>
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 w-full">
            {{-- Felhasználói adatok --}}
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-black dark:text-white mb-4">Felhasználói adatok</h2>
                <div class="grid md:grid-cols-2 gap-4">
                    <p class="text-black dark:text-white"><strong class="font-medium">Név:</strong> {{ Auth::user()->name }}</p>
                    <p class="text-black dark:text-white"><strong class="font-medium">Email:</strong> {{ Auth::user()->email }}</p>
                </div>
            </div>

            <hr class="my-6 border-gray-300 dark:border-gray-600">

            {{-- Kedvenc szolgáltatások --}}
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-black dark:text-white mb-4">Kedvenc szolgáltatások</h2>
                @if(auth()->user()->favoriteServices->isEmpty())
                    <p class="text-gray-500">Nincs még kedvenc szolgáltatásod.</p>
                @else
                    <ul class="space-y-3">
                        @foreach(auth()->user()->favoriteServices as $fav)
                            <li class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg shadow-sm flex items-center gap-3">
                                <img src="{{ $fav->image ? asset('images/' . $fav->image) : asset('images/default-image.jpg') }}" alt="{{ $fav->name }}" class="w-6 h-6 rounded-full object-cover">
                                <a href="{{ route('services.show', $fav->slug) }}" class="text-[#187aa0] dark:text-[#a2c9d9] hover:underline">
                                    {{ $fav->name }}
                                </a>
                            </li>

                        @endforeach
                    </ul>
                @endif
            </div>

            <hr class="my-6 border-gray-300 dark:border-gray-600">

            {{-- Jelszó megváltoztatása --}}
            <div class="mb-8">
                <h2 class="text-2xl font-semibold text-black dark:text-white mb-4">Jelszó megváltoztatása</h2>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('PUT')

                    {{-- Jelenlegi jelszó mező --}}
                    <div class="mb-6">
                        <label for="current_password" class="block text-sm font-medium text-gray-700 dark:text-white">Jelenlegi jelszó</label>
                        <input type="password" name="current_password" id="current_password" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-[#187aa0]" required>
                        @error('current_password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Új jelszó mező --}}
                    <div class="mb-6">
                        <label for="new_password" class="block text-sm font-medium text-gray-700 dark:text-white">Új jelszó</label>
                        <input type="password" name="new_password" id="new_password" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-[#187aa0]" required>
                        @error('new_password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Új jelszó megerősítése mező --}}
                    <div class="mb-6">
                        <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 dark:text-white">Új jelszó megerősítése</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-[#187aa0]" required>
                        @error('new_password_confirmation')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary px-6 py-2">Jelszó változtatása</button>
                    </div>
                </form>
            </div>

            {{-- Gombok --}}
            <div class="flex gap-4 justify-start mt-6">
                {{-- Admin Panel (csak super-adminnak) --}}
                @if(auth()->user()->isSuperAdmin())
                    <form method="GET" action="{{ url('admin') }}">
                        <button type="submit" class="btn btn-outline btn-sm border-black text-black hover:bg-black hover:text-white dark:border-white dark:text-white hover:dark:bg-white hover:dark:text-black">
                            Admin Panel
                        </button>
                    </form>
                @endif

                {{-- Kijelentkezés --}}
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-outline btn-sm border-black text-black hover:bg-black hover:text-white dark:border-white dark:text-white hover:dark:bg-white hover:dark:text-black">
                        Kijelentkezés
                    </button>
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
</x-main-layout>
