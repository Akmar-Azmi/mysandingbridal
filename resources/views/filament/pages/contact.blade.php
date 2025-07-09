<x-filament-panels::page>
    <div class="px-10 py-8 space-y-6">


        {{-- WhatsApp & Email --}}
        <div class="flex flex-col md:flex-row gap-4">
            <div class="flex items-center gap-2 w-full md:w-1/2">
                <img src="https://cdn-icons-png.flaticon.com/512/733/733585.png" class="w-6 h-6" alt="WhatsApp">
                <div class="flex gap-2 w-full">
                    <select class="border rounded bg-gray-100 px-2 py-1">
                        <option>+60</option>
                        <option>+65</option>
                        <option>+62</option>
                    </select>
                    <input type="text" placeholder="12345678" class="flex-1 p-2 border rounded bg-gray-100">
                </div>
            </div>

            <div class="flex items-center gap-2 w-full md:w-1/2">
                <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" class="w-6 h-6" alt="Email">
                <input type="email" placeholder="kaklina@gmail.com" class="w-full p-2 border rounded bg-gray-100" />
            </div>
        </div>

        {{-- Address --}}
        <div>
            <label class="block font-semibold">Address</label>
            <input type="text" placeholder="Share your address" class="w-full mt-1 p-2 border rounded bg-gray-100" />
        </div>

        {{-- Opening Hours --}}
        <div>
            <label class="block font-semibold">Opening Hours</label>
            <div class="flex gap-2 items-center">
                <!-- Start Time -->
                <select class="border rounded px-2 py-1 bg-gray-100">
                    @for ($i = 1; $i <= 12; $i++) <option>{{ $i }}</option> @endfor
                </select>
                <select class="border rounded px-2 py-1 bg-gray-100">
                    @for ($i = 0; $i < 60; $i += 15) <option>{{ sprintf("%02d", $i) }}</option> @endfor
                </select>
                <select class="border rounded px-2 py-1 bg-gray-100">
                    <option>AM</option>
                    <option>PM</option>
                </select>

                <span class="px-2">-</span>

                <!-- End Time -->
                <select class="border rounded px-2 py-1 bg-gray-100">
                    @for ($i = 1; $i <= 12; $i++) <option>{{ $i }}</option> @endfor
                </select>
                <select class="border rounded px-2 py-1 bg-gray-100">
                    @for ($i = 0; $i < 60; $i += 15) <option>{{ sprintf("%02d", $i) }}</option> @endfor
                </select>
                <select class="border rounded px-2 py-1 bg-gray-100">
                    <option>AM</option>
                    <option>PM</option>
                </select>
            </div>
        </div>

        {{-- Set Location --}}
        <div>
            <label class="block font-semibold mb-2">Set Location</label>
            <div class="w-40 h-40 border rounded overflow-hidden">
                <iframe
                    class="w-full h-full"
                    src="https://www.google.com/maps?q=4.2105,101.9758&hl=es;z=14&output=embed"
                    loading="lazy"
                ></iframe>
            </div>
        </div>

        {{-- Edit Button --}}
        <div class="text-right">
            <button class="bg-green-600 text-white px-4 py-2 rounded-full text-sm hover:bg-green-700 flex items-center gap-2">
                Edit <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536M9 13l6-6 3 3-6 6H9v-3z" />
                </svg>
            </button>
        </div>
    </div>
</x-filament-panels::page>
