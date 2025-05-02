<x-main-layout>
    {{-- Konténer a tartalomhoz --}}
    <div class="container mx-auto px-4 py-8 text-black ml-50 pb-40">

        {{-- Oldalcím --}}
        <h1 class="text-4xl font-bold text-left text-black dark:text-white mb-8 mt-27 ml-1">
            Szolgáltatások
        </h1>

        {{-- Szolgáltatások grid-elrendezése responsív módon --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($services as $service)
                {{-- Szolgáltatás kártya --}}
                <div class="bg-white/80 dark:bg-gray-800 shadow-lg rounded-lg p-6 text-black dark:text-white transition-transform transform hover:scale-105 hover:bg-gray-100 dark:hover:bg-gray-700 duration-300 ease-in-out">

                    {{-- Fejléc: kép és szolgáltatás neve, leírása --}}
                    <div class="flex items-center space-x-4 mb-4">
                        {{-- Szolgáltatás képe --}}
                        <div class="flex-shrink-0">
                            <img
                                src="{{ $service->image ? asset($service->image) : asset('images/default-image.jpg') }}"
                                alt="{{ $service->name }}"
                                class="w-16 h-16 rounded-full object-cover">
                        </div>

                        {{-- Név, leírás és értékelés --}}
                        <div>
                            <h2 class="text-2xl font-semibold text-black dark:text-white">
                                {{ $service->name }}
                            </h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400">
                                {{ $service->desc }}
                            </p>

                            {{-- Csillagos értékelés, ha van --}}
                            @if($service->rating)
                                <div class="flex items-center flex-wrap gap-1 mt-1">
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
                    <a
                        href="{{ url('/services/' . $service->slug) }}"
                        class="mt-4 inline-block bg-[#187aa0] text-white px-6 py-3 rounded-full hover:bg-[#125d7a] transition-colors duration-300">
                        Részletek
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-main-layout>
