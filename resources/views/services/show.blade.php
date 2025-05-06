<x-main-layout>
    <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-8 text-black">
        <!-- Szolgáltatás részletező blokkjának alapfelépítése -->
        <div class="bg-white/80 dark:bg-gray-800 shadow-lg rounded-2xl p-6 sm:p-8 space-y-6">
            <!-- Szolgáltatás neve -->
            <h1 class="text-2xl sm:text-3xl font-bold text-[#187aa0] dark:text-white">{{ $service->name }}</h1>

            <!-- Alapadatok (cím, telefon, email, weboldal, nyitvatartás) -->
            <div class="flex flex-col sm:flex-row items-center sm:items-start space-x-6">
                <div class="flex-1">
                    <div class="text-gray-700 dark:text-gray-300 space-y-2">
                        <p class="text-base sm:text-lg "><span class="font-semibold">Cím:</span> {{ $service->address }}</p>
                        @if($service->phone)
                            <p class="text-base sm:text-lg"><span class="font-semibold">Telefon:</span> {{ $service->phone }}</p>
                        @endif
                        @if($service->email)
                            <p class="text-base sm:text-lg"><span class="font-semibold">E-mail:</span> {{ $service->email }}</p>
                        @endif
                        @if($service->website)
                            <p class="text-base sm:text-lg"><span class="font-semibold">Weboldal:</span>
                                <a href="{{ $service->website }}" target="_blank" class="text-[#187aa0] hover:underline">{{ $service->website }}</a>
                            </p>
                        @endif
                        @if($service->opening_hours)
                            <p class="text-base sm:text-lg"><span class="font-semibold">Nyitvatartás:</span> {{ $service->opening_hours }}</p>
                        @endif
                    </div>

                    <!-- Értékelés megjelenítése csillagokkal -->
                    @if($service->rating)
                        <div class="flex items-center flex-wrap gap-1 dark:text-white">
                            <span class="font-semibold mr-2">Értékelés:</span>
                            @for ($i = 1; $i <= 5; $i++)
                                <svg class="w-5 h-5 {{ $i <= $service->rating ? 'text-yellow-400' : 'text-gray-300' }}" fill="currentColor" viewBox="0 0 20 20">
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

                    @if(Auth::check())
                        <form action="{{ route('services.toggleFavorite', $service) }}" method="POST">
                            @csrf
                            <button type="submit" class="mt-4 bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 transition">
                                @if(auth()->user()->favoriteServices->contains($service->id))
                                    Eltávolítás a kedvencekből
                                @else
                                    Kedvencekhez adás
                                @endif
                            </button>
                        </form>
                    @endif


                    <!-- Részletes leírás, ha van -->
                    @if($service->long_desc)
                        <div>
                            <h2 class="text-lg sm:text-xl font-semibold mt-4 mb-2 dark:text-white">Részletes leírás</h2>
                            <p class="text-gray-600 dark:text-gray-300 whitespace-pre-line">{{ $service->long_desc }}</p>
                        </div>
                    @endif

                    <!-- Térkép, ha vannak koordináták -->
                    @if($service->lat && $service->lng)
                        <div>
                            <h2 class="text-lg sm:text-xl font-semibold mt-4 mb-2 dark:text-white">Térkép</h2>
                            <div id="map" class="w-full h-[400px] rounded-lg shadow"></div>
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
                </div>

                <!-- Szolgáltatás képe, ha van -->
                @if($service->image)
                    <div class="flex-shrink-0">
                        <img src="{{ asset($service->image) }}" alt="{{ $service->name }}" class="w-[400px] h-[300px] object-cover rounded-lg shadow-lg">
                    </div>
                @endif
            </div>

            <!-- Létrehozás és frissítés időpontja -->
            <div class="text-sm text-gray-400 dark:text-gray-500">
                <p>Létrehozva: {{ $service->created_at->format('Y. m. d. H:i') }}</p>
                <p>Frissítve: {{ $service->updated_at->format('Y. m. d. H:i') }}</p>
            </div>

            <!-- Vissza gomb -->
            <a href="{{ url()->previous() }}" class="inline-block bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 transition-colors duration-300">
                Vissza
            </a>
        </div>
    </div>
</x-main-layout>
