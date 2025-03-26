<!DOCTYPE html>
<html lang="hu">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Szervizkereső</title>
  <script src="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.js"></script>
  <!-- Google Maps API -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
  <style>
    /* Google Maps API custom styles, if any */
  </style>
</head>
<body class="bg-gray-100">
  <div class="flex">
    <!-- Left side: Map and Filters -->
    <div class="w-1/3 p-4 bg-white shadow-lg ml-45 mt-20">
      <!-- Map View Button -->
      <button class="w-full p-2 bg-blue-500 text-white rounded mb-4" onclick="openMap()">Térkép nézet</button>
      
      <!-- Filter Section -->
      <div class="mb-4 ml-14">
        <h3 class="font-semibold mb-2 text-black">Szűrők</h3>
        <div class="space-y-2">
          <!-- Rating Filter (csillagos szűrő) -->
          <div>
            <label for="rating" class="block text-sm text-black">Értékelés</label>
            <div class="flex space-x-1">
              <button class="text-yellow-400" onclick="filterByRating(1)">★</button>
              <button class="text-yellow-400" onclick="filterByRating(2)">★</button>
              <button class="text-yellow-400" onclick="filterByRating(3)">★</button>
              <button class="text-yellow-400" onclick="filterByRating(4)">★</button>
              <button class="text-yellow-400" onclick="filterByRating(5)">★</button>
            </div>
          </div>

          <!-- Opening Hours Filter -->
          <div>
            <label for="hours" class="block text-sm text-black">Nyitvatartás</label>
            <select id="hours" class="w-full p-2 border border-gray-300 rounded text-black">
              <option>Nyitva most</option>
              <option>0-24</option>
            </select>
          </div>

          <!-- Price Filter -->
          <div>
            <label for="price" class="block text-sm text-black">Ár</label>
            <select id="price" class="w-full p-2 border border-gray-300 rounded text-black">
              <option>Alsó</option>
              <option>Közép</option>
              <option>Felső</option>
            </select>
          </div>

          <!-- Equipment Filter -->
          <div>
            <label for="equipment" class="block text-sm text-black">Felszereltség</label>
            <div class="flex items-center space-x-2">
              <input type="checkbox" id="wifi" class="h-5 w-5" />
              <label for="wifi" class="text-black">Wifi</label>
              <input type="checkbox" id="wc" class="h-5 w-5" />
              <label for="wc" class="text-black">WC</label>
              <input type="checkbox" id="cardPayment" class="h-5 w-5" />
              <label for="cardPayment" class="text-black">Kártyás fizetés</label>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right side: Service List -->
    <div class="w-2/3 p-4 space-y-6 mt-16">
      <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        <!-- Service Card (Example) -->
        <div class="bg-white p-4 rounded-lg shadow hover:shadow-lg transition">
          <img src="service-image.jpg" alt="Szerviz" class="w-full h-32 object-cover rounded mb-4">
          <div class="text-lg font-bold text-black">Szerviz Név</div>
          <div class="text-sm text-yellow-500">
            <!-- Star Rating -->
            <span>★★★★☆</span>
          </div>
          <div class="text-sm text-black">Autómosó</div>
          <a href="/service-details" class="block mt-4 text-blue-600 hover:underline">Tovább</a>
        </div>

        <!-- Add more service cards dynamically here -->
      </div>
    </div>
  </div>

  <!-- Content wrapper -->
  <div class="flex-grow p-4 mt-20">
    {{ $slot }} <!-- A dinamikus tartalom ide kerül -->
  </div>

  <script>
    // Function to open Google Maps (use Google Maps API here)
    function openMap() {
      // Initialize your Google Map here using Google Maps API
      console.log("Google Maps API open");
    }

    // Function to filter by rating
    function filterByRating(rating) {
      console.log('Filtering by rating:', rating);
      // Add your filtering logic here, for example:
      // You could make an API call to filter services by the selected rating.
    }
  </script>
</body>
</html>
