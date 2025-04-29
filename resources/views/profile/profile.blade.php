<x-main-layout>
    <div class="main-content">
        <div class="mb-55 mt-35">
            <h1 class="text-4xl font-bold text-left text-black dark:text-white mb-8 pl-54">
                Profilom
            </h1>
            <div class="flex justify-center gap-12 flex-wrap mt-6">

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md p-6 w-full max-w-3xl">

                    {{-- Felhasználói adatok --}}
                    <div class="mb-6 text-black dark:text-white">
                        <p><strong>Név:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
                    </div>

                    
                    {{-- Jelszóváltás --}}
                    <div class="mb-4">
                        <a href="{{ route('password.request') }}" class="btn btn-outline btn-sm">Jelszó megváltoztatása</a>
                    </div>

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
</x-main-layout>
