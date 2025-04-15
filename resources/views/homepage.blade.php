<x-main-layout>
    <!-- Fő tartalom -->
    <div class="main-content">
        <div class="mb-55 mt-35">
            <h1 class="text-4xl font-bold text-left text-black dark:text-white mb-8 pl-54">
                Találd meg a számodra megfelelő szolgáltatást!
            </h1>
            <div class="flex justify-center gap-12 flex-wrap mt-6">
                <a href="{{ route('alkatreszkereskedo') }}"
                   class="flex flex-col items-center justify-center p-8 text-center w-[250px] h-[250px] rounded-xl font-bold text-black dark:text-white shadow-md bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <img src="/images/alkatreszkereskedologo.png" alt="Alkatrészkereskedő ikon" class="w-24 h-24 mb-4">
                    Alkatrészkereskedők
                </a>
                <a href="{{ route('autoszerelo') }}"
                   class="flex flex-col items-center justify-center p-8 text-center w-[250px] h-[250px] rounded-xl font-bold text-black dark:text-white shadow-md bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <img src="/images/autoszerelologo.png" alt="Autószerelő ikon" class="w-24 h-24 mb-4">
                    Autószerelők
                </a>
                <a href="{{ route('gumiszerviz') }}"
                   class="flex flex-col items-center justify-center p-8 text-center w-[250px] h-[250px] rounded-xl font-bold text-black dark:text-white shadow-md bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <img src="/images/gumiszervizlogo.png" alt="Gumiszervíz ikon" class="w-24 h-24 mb-4">
                    Gumiszervízek
                </a>
                <a href="{{ route('automoso') }}"
                   class="flex flex-col items-center justify-center p-8 text-center w-[250px] h-[250px] rounded-xl font-bold text-black dark:text-white shadow-md bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <img src="/images/automosologo.png" alt="Autómosó ikon" class="w-24 h-24 mb-4">
                    Autómosók
                </a>
                <a href="{{ route('automentok') }}"
                   class="flex flex-col items-center justify-center p-8 text-center w-[250px] h-[250px] rounded-xl font-bold text-black dark:text-white shadow-md bg-white dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-700 transition">
                    <img src="/images/automentoklogo.png" alt="Autómentő ikon" class="w-24 h-24 mb-4">
                    Autómentők
                </a>
            </div>
        </div>
    </div>
</x-main-layout>
