<x-main-layout>
    <div class="px-[15px] py-6 text-black w-full box-border">
        <!-- Szolgáltatás neve -->
        <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold text-center text-black dark:text-white mb-8 pl-4 sm:pl-8">
            {{ $service->name }}
        </h1>

        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 space-y-6 text-gray-800 dark:text-gray-200">
            <!-- Alapadatok (cím, telefon, email, weboldal, nyitvatartás) -->
            <div class="flex flex-col sm:flex-row items-center sm:items-start space-x-6">
                <div class="flex-1">
                    <div class="text-gray-700 dark:text-gray-300 space-y-2">
                        <!-- Cím -->
                        <p class="text-base sm:text-lg">
                            <span class="font-semibold">Cím:</span>
                            <a href="https://www.google.com/maps?q={{ urlencode($service->address) }}" target="_blank" class="text-[#187aa0] dark:text-[#a2c9d9] hover:underline">
                                {{ $service->address }}
                            </a>
                        </p>

                        <!-- Telefon -->
                        @if($service->phone)
                            <p class="text-base sm:text-lg">
                                <span class="font-semibold">Telefon:</span>
                                <a href="tel:{{ preg_replace('/[^0-9+]/', '', $service->phone) }}" class="text-[#187aa0] dark:text-[#a2c9d9] hover:underline">
                                    {{ $service->phone }}
                                </a>
                            </p>
                        @endif

                        <!-- Email -->
                        @if($service->email)
                            <p class="text-base sm:text-lg">
                                <span class="font-semibold">E-mail:</span>
                                <a href="mailto:{{ $service->email }}" class="text-[#187aa0] dark:text-[#a2c9d9] hover:underline">
                                    {{ $service->email }}
                                </a>
                            </p>
                        @endif

                        <!-- Weboldal -->
                        @if($service->website)
                            <p class="text-base sm:text-lg">
                                <span class="font-semibold">Weboldal:</span>
                                <a href="{{ $service->website }}" target="_blank" class="text-[#187aa0] dark:text-[#a2c9d9] hover:underline">
                                    {{ $service->website }}
                                </a>
                            </p>
                        @endif

                        <!-- Nyitvatartás -->
                        @if($service->opening_hours)
                            <div class="mt-6">
                                <p class="text-lg font-semibold mb-2">Nyitvatartás:</p>
                                <div class="overflow-x-auto">
                                    <table class="w-full text-left text-base border border-gray-300 rounded-lg overflow-hidden">
                                        <tbody>
                                        @foreach(explode("\n", $service->opening_hours) as $line)
                                            @php
                                                $parts = explode(' ', $line, 2);
                                                $day = ucfirst($parts[0] ?? '');
                                                $hours = $parts[1] ?? '';
                                            @endphp
                                            <tr class="odd:bg-gray-100 even:bg-white">
                                                <td class="px-4 py-2 font-medium text-gray-700 whitespace-nowrap">{{ $day }}</td>
                                                <td class="px-4 py-2 text-gray-800">{{ $hours }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Szolgáltatás képe -->
                @if($service->image)
                    <div class="flex-shrink-0 hidden lg:block lg:w-[300px] lg:h-[200px]">
                        <img src="{{ $service->image ? asset('images/' . $service->image) : asset('images/default-image.jpg') }}" alt="{{ $service->name }}" class="w-full h-full object-contain rounded-lg shadow-lg">
                    </div>
                @endif
            </div>

            <!-- Értékelés -->
            @if($service->rating)
                <div class="flex items-center flex-wrap gap-1 dark:text-white mt-4">
                    <span class="font-semibold mr-2">Értékelés:</span>
                    @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-4 h-4 {{ $i <= $service->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.286 3.967h4.174c.969 0 1.371 1.24.588 1.81l-3.38 2.455 1.286 3.966c.3.922-.755 1.688-1.539 1.118l-3.379-2.455-3.38 2.455c-.783.57-1.838-.196-1.539-1.118l1.287-3.966-3.38-2.455c-.783-.57-.38-1.81.588-1.81h4.174L9.049 2.927z"/>
                        </svg>
                    @endfor
                    <span class="ml-2 text-sm text-gray-500">{{ number_format($service->rating, 1) }}/5</span>
                </div>
            @endif

            <!-- Felszereltség lista -->
            @if($service->features)
                <div>
                    <h2 class="text-lg sm:text-xl font-semibold mt-4 mb-2 dark:text-white">Felszereltség</h2>
                    <ul class="list-disc list-inside text-gray-600 dark:text-gray-300">
                        @foreach(explode(',', $service->features) as $feature)
                            <li>{{ trim($feature) }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Rövid leírás -->
            <div>
                <h2 class="text-lg sm:text-xl font-semibold mt-4 mb-2 dark:text-white">Rövid leírás</h2>
                <p class="text-gray-600 dark:text-gray-300">{{ $service->desc }}</p>
            </div>

            <!-- Részletes leírás -->
            @if($service->long_desc)
                <div>
                    <h2 class="text-lg sm:text-xl font-semibold mt-4 mb-2 dark:text-white">Részletes leírás</h2>
                    <p class="text-gray-600 dark:text-gray-300 whitespace-pre-line text-justify">{{ $service->long_desc }}</p>
                </div>
            @endif

            <!-- Térkép -->
            @if($service->lat && $service->lng)
                <div>
                    <h2 class="text-lg sm:text-xl font-semibold mt-4 mb-2 dark:text-white">Térkép</h2>
                    <div id="map" class="w-full h-[300px] rounded-lg shadow"></div>
                </div>
                <script>
                    // Google Maps térkép inicializálása
                    function initMap() {
                        const location = { lat: {{ $service->lat }}, lng: {{ $service->lng }} };
                        const map = new google.maps.Map(document.getElementById("map"), {
                            zoom: 15,
                            center: location,
                        });
                        const marker = new google.maps.Marker({
                            position: location,
                            map: map,
                        });
                    }
                </script>
                <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDdGjOLHKGW3gKfP9hA0B_bvRDxgAwwB0g&callback=initMap" async defer></script>
            @endif

            <!-- Létrehozás és frissítés időpontja -->
            <div class="text-sm text-gray-400 dark:text-gray-500">
                <p>Létrehozva: {{ $service->created_at->format('Y. m. d. H:i') }}</p>
                <p>Frissítve: {{ $service->updated_at->format('Y. m. d. H:i') }}</p>
            </div>

            <div class="flex space-x-4 justify-center">
                <!-- Vissza gomb -->
                <a href="{{ url()->previous() }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-300">
                    Vissza
                </a>

                <!-- Kedvencekhez adás -->
                @if(Auth::check())
                    <form action="{{ route('services.toggleFavorite', $service) }}" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                            @if(auth()->user()->favoriteServices->contains($service->id))
                                Eltávolítás a kedvencekből
                            @else
                                Kedvencekhez adás
                            @endif
                        </button>
                    </form>
                @endif
            </div>

        </div>
    </div>
</x-main-layout>
