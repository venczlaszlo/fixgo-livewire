<x-main-layout>
    <div class="main-content mt-35 mb-55">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl font-bold text-left text-black dark:text-white mb-8">Kapcsolat</h1>

            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-8 space-y-6 text-gray-800 dark:text-gray-200">
                <p>Ha kérdésed, észrevételed van vagy együttműködés iránt érdeklődnél, vedd fel velünk a kapcsolatot az alábbi űrlap segítségével vagy az elérhetőségeink egyikén.</p>

                <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                    @csrf

                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-white">Név</label>
                        <input type="text" name="name" id="name" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-[#187aa0]">
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-[#187aa0]">
                    </div>

                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700 dark:text-white">Üzenet</label>
                        <textarea name="message" id="message" rows="5" required class="mt-1 block w-full p-3 border border-gray-300 rounded-md shadow-sm dark:bg-gray-700 dark:text-white dark:border-gray-600 focus:ring-2 focus:ring-[#187aa0]"></textarea>
                    </div>

                    <div class="flex justify-end">
                        <button type="submit" class="btn btn-primary px-6 py-2">Küldés</button>
                    </div>
                </form>

                <div class="pt-6 border-t border-gray-300 dark:border-gray-700">
                    <p><strong>Email:</strong> <a href="mailto:venczlaszlo@gmail.com" class="text-[#187aa0] hover:underline">info@fixandgo.hu</a></p>
                    <p><strong>Telefon:</strong> +36 20 123 4567</p>
                    <p><strong>Cím:</strong> 5700 Gyula, Példa utca 1.</p>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
