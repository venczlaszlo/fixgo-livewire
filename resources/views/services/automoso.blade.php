<x-main-layout>
    <!-- Fő tartalom -->
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-6">Szolgáltatások</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($services as $service)
                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold">{{ $service->name }}</h2>
                    <p class="text-gray-600">{{ $service->desc }}</p>
                    <a href="{{ url('/services/' . $service->slug) }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600">
                        Részletek
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</x-main-layout>
