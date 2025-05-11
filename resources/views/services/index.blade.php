<x-main-layout>
    {{-- Külső konténer: 15px padding minden oldalon, teljes szélesség kihasználása --}}
    <div class="px-[15px] py-8 text-black w-full box-border">

        {{-- Belső konténer: max. 1600px szélesség, középre igazítás --}}
        <div class="max-w-[1600px] mx-auto">

            {{-- Oldalcím --}}
            <h1 class="text-4xl font-bold text-center text-black dark:text-white mb-8 mt-10">
                Szolgáltatások
            </h1>

            {{-- Reszponzív grid: 1-4 oszlop mérettől függően --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($services as $service)
                    {{-- Szolgáltatás kártya --}}
                    <div class="bg-white/80 dark:bg-gray-800 shadow-lg rounded-lg p-6 text-black dark:text-white transition-transform transform hover:scale-105 hover:bg-gray-100 dark:hover:bg-gray-700 duration-300 ease-in-out w-full">

                        {{-- Fejléc: kép és információk --}}
                        <div class="flex items-center space-x-4 mb-4">

                            {{-- Szolgáltatás képe --}}
                            <div class="flex-shrink-0">
                                <img
                                    src="{{ asset('images/' . ($service->image ?? 'default-image.jpg')) }}"
                                    alt="{{ $service->name }}"
                                    class="w-16 h-16 rounded-full object-cover">
                            </div>

                            {{-- Szolgáltatás neve, leírása, értékelése --}}
                            <div class="flex flex-col min-w-0">

                                {{-- Név --}}
                                <h2 class="text-2xl font-semibold text-black dark:text-white leading-snug mb-1">
                                    {{ $service->name }}
                                </h2>

                                {{-- Leírás --}}
                                <p class="text-sm text-gray-600 dark:text-gray-400 leading-tight mb-2 break-words max-h-20 overflow-hidden text-center sm:text-left">
                                    {{ $service->desc }}
                                </p>

                                {{-- Értékelés csillagok --}}
                                @if($service->rating)
                                    <div class="flex gap-1 flex-wrap">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <svg
                                                class="w-5 h-5 {{ $i <= $service->rating ? 'text-yellow-400' : 'text-gray-300' }}"
                                                fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967h4.174c.969 0 1.371 1.24.588 1.81l-3.38 2.455
                                                         1.286 3.966c.3.922-.755 1.688-1.539 1.118l-3.379-2.455-3.38
                                                         2.455c-.783.57-1.838-.196-1.539-1.118l1.287-3.966-3.38-2.455c-.783-.57-.38-1.81.588-1.81h4.174L9.049
                                                         2.927z"/>
                                            </svg>
                                        @endfor
                                    </div>
                                @endif
                            </div>
                        </div>

                        {{-- Részletek gomb --}}
                        <div class="flex flex-wrap justify-between gap-2 mt-4">
                            <a
                                href="{{ url('/services/' . $service->slug) }}"
                                class="bg-[#187aa0] text-white px-6 py-3 rounded-full hover:bg-[#125d7a] transition-colors duration-300 w-full sm:w-auto text-center">
                                Részletek
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-main-layout>
