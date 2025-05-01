<x-main-layout>
    <div class="container mx-auto px-4 py-8 text-black ml-50 pb-40 ">
        <h1 class="text-4xl font-bold text-left text-black dark:text-white mb-8 mt-27 ml-3">Szolgáltatások</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($services as $service)
                <div class="bg-white/80 dark:bg-gray-800 shadow-lg rounded-lg p-6 text-black dark:text-white transition-transform transform hover:scale-105 hover:bg-gray-100 dark:hover:bg-gray-700 duration-300 ease-in-out">
                    <div class="flex items-center space-x-4 mb-4">
                        <div class="flex-shrink-0">
                            <img src="{{ $service->image ? asset($service->image) : asset('images/default-image.jpg') }}" alt="{{ $service->name }}" class="w-16 h-16 rounded-full object-cover">
                        </div>
                        <div>
                            <h2 class="text-2xl font-semibold text-black dark:text-white">{{ $service->name }}</h2>
                            <p class="text-sm text-gray-600 dark:text-gray-400">{{ $service->desc }}</p>
                        </div>
                    </div>
                    <a href="{{ url('/services/' . $service->slug) }}" class="mt-4 inline-block bg-[#187aa0]  text-white px-6 py-3 rounded-full hover:bg-[#125d7a] transition-colors duration-300">
                        Részletek
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-main-layout>
