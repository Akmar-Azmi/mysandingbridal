<x-filament-panels::page>
    <div class="px-6 py-6 space-y-10">

        {{-- Description Card --}}
        <div class="bg-gray-200 p-6 rounded-xl shadow-md">
            <h3 class="text-lg font-semibold mb-3">Description</h3>
            <div class="bg-white p-4 rounded-md shadow-sm">
                <p class="text-gray-800">
                    Welcome to MySanding Bridal Services! We specialize in providing personalized bridal consultations,
                    fittings, and premium makeup services to make your big day unforgettable.
                </p>
            </div>
            <div class="flex justify-end mt-3">
                <button class="flex items-center gap-1 bg-green-600 text-black px-4 py-1.5 text-sm rounded-full hover:bg-green-700 shadow">
                    Edit
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.232 5.232l3.536 3.536M9 11l6.586-6.586a2 2 0 012.828 0l1.172 1.172a2 2 0 010 2.828L13 15H9v-4z" />
                    </svg>
                </button>
            </div>
        </div>
        <br>

        {{-- Teams Section --}}
        <div>
            <div class="flex justify-between items-center mb-4">
                <h3 class="text-lg font-semibold">Teams</h3>
                <button class="text-blue-600 hover:underline text-sm">
                    + Add Team
                </button>
            </div>

            <div class="bg-gray-200 p-6 rounded-xl shadow-md grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

                {{-- Team Member 1 --}}
                <div class="bg-white p-6 rounded-xl shadow text-center w-full">
                    <div class="text-6xl mb-4">👤</div>
                    <h4 class="font-bold text-lg mb-4">Alyaa Sofea</h4>
                    <div class="flex justify-center gap-3">
                        <button class="flex items-center gap-1 bg-red-600 text-black text-sm font-semibold px-4 py-1.5 rounded-full shadow hover:bg-red-700 transition">
                            Delete
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <button class="flex items-center gap-1 bg-green-600 text-black text-sm font-semibold px-4 py-1.5 rounded-full shadow hover:bg-green-700 transition">
                            Edit
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.232 5.232l3.536 3.536M9 11l6.586-6.586a2 2 0 012.828 0l1.172 1.172a2 2 0 010 2.828L13 15H9v-4z" />
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Team Member 2 --}}
                <div class="bg-white p-6 rounded-xl shadow text-center w-full">
                    <div class="text-6xl mb-4">👤</div>
                    <h4 class="font-bold text-lg mb-4">Nur Akmar</h4>
                    <div class="flex justify-center gap-3">
                        <button class="flex items-center gap-1 bg-red-600 text-black text-sm font-semibold px-4 py-1.5 rounded-full shadow hover:bg-red-700 transition">
                            Delete
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                        <button class="flex items-center gap-1 bg-green-600 text-black text-sm font-semibold px-4 py-1.5 rounded-full shadow hover:bg-green-700 transition">
                            Edit
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M15.232 5.232l3.536 3.536M9 11l6.586-6.586a2 2 0 012.828 0l1.172 1.172a2 2 0 010 2.828L13 15H9v-4z" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>
        </div>

    </div>
</x-filament-panels::page>
