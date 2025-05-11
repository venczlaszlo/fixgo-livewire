<x-main-layout>
    {{-- Fő tartalom terület --}}
    <div class="main-content">
        <div class="mb-55 mt-35">
            <div class="w-fit mx-auto">

                {{-- Oldalcím --}}
                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-center text-black dark:text-white mb-8 pl-4 sm:pl-8">
                    Találd meg a számodra megfelelő szolgáltatást!
                </h1>



                {{-- Kategóriák kártyái egy sorban, reszponzívan --}}
                <div class="flex flex-wrap justify-center gap-8 mt-6">

                    {{-- Alkatrészkereskedők kártya --}}
                    <a href="{{ route('alkatreszkereskedo') }}"
                       class="flex flex-col items-center justify-center p-8 text-center w-full sm:w-[200px] h-[250px]
                              rounded-xl font-bold text-black dark:text-white shadow-md bg-white/80 dark:bg-gray-800
                              hover:bg-gray-100 dark:hover:bg-gray-700 transition transition-transform transform
                              hover:scale-105 duration-300 ease-in-out">
                        <img src="/images/alkatreszkereskedologo.png" alt="Alkatrészkereskedő ikon" class="w-24 h-24 mb-4">
                        Alkatrészkereskedők
                    </a>

                    {{-- Autószerelők kártya --}}
                    <a href="{{ route('autoszerelo') }}"
                       class="flex flex-col items-center justify-center p-8 text-center w-full sm:w-[200px] h-[250px]
                              rounded-xl font-bold text-black dark:text-white shadow-md bg-white/80 dark:bg-gray-800
                              hover:bg-gray-100 dark:hover:bg-gray-700 transition transition-transform transform
                              hover:scale-105 duration-300 ease-in-out">
                        <img src="/images/autoszerelologo.png" alt="Autószerelő ikon" class="w-24 h-24 mb-4 dark:hidden">
                        <img src="/images/autoszerelologo_dark.png" alt="Autószerelő ikon" class="w-24 h-24 mb-4 hidden dark:block">
                        Autószerelők
                    </a>

                    {{-- Gumiszervízek kártya --}}
                    <a href="{{ route('gumiszerviz') }}"
                       class="flex flex-col items-center justify-center p-8 text-center w-full sm:w-[200px] h-[250px]
                              rounded-xl font-bold text-black dark:text-white shadow-md bg-white/80 dark:bg-gray-800
                              hover:bg-gray-100 dark:hover:bg-gray-700 transition transition-transform transform
                              hover:scale-105 duration-300 ease-in-out">
                        <img src="/images/gumiszervizlogo.png" alt="Autószerelő ikon" class="w-24 h-24 mb-4 dark:hidden">
                        <img src="/images/gumiszervizlogo_dark.png" alt="Autószerelő ikon" class="w-24 h-24 mb-4 hidden dark:block">
                        Gumiszervizek
                    </a>

                    {{-- Autómosók kártya --}}
                    <a href="{{ route('automoso') }}"
                       class="flex flex-col items-center justify-center p-8 text-center w-full sm:w-[200px] h-[250px]
                              rounded-xl font-bold text-black dark:text-white shadow-md bg-white/80 dark:bg-gray-800
                              hover:bg-gray-100 dark:hover:bg-gray-700 transition transition-transform transform
                              hover:scale-105 duration-300 ease-in-out">
                        <img src="/images/automosologo.png" alt="Autószerelő ikon" class="w-24 h-24 mb-4 dark:hidden">
                        <img src="/images/automosologo_dark.png" alt="Autószerelő ikon" class="w-24 h-24 mb-4 hidden dark:block">
                        Autómosók
                    </a>

                    {{-- Autómentők kártya --}}
                    <a href="{{ route('automentok') }}"
                       class="flex flex-col items-center justify-center p-8 text-center w-full sm:w-[200px] h-[250px]
                              rounded-xl font-bold text-black dark:text-white shadow-md bg-white/80 dark:bg-gray-800
                              hover:bg-gray-100 dark:hover:bg-gray-700 transition transition-transform transform
                              hover:scale-105 duration-300 ease-in-out">
                        <img src="/images/automentoklogo.png" alt="Autómentő ikon" class="w-24 h-24 mb-4">
                        Autómentők
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-main-layout>
