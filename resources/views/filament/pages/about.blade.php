<x-filament-panels::page>
    <div class="px-6 py-6 space-y-10">

        {{-- Custom Button Style --}}
        <style>
    .custom-btn {
        background-color: #F6B83D !important;
        border: none;
        color: white !important;
        padding: 0.3rem 0.8rem;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        transition: background-color 0.3s ease;
    }

    .custom-btn:hover {
        background-color: #e5a734 !important;
    }

    .delete-btn {
        background-color: #e74c3c !important;
        border: none;
        color: white !important;
        padding: 0.3rem 0.8rem;
        border-radius: 6px;
        font-size: 0.8rem;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        transition: background-color 0.3s ease;
    }

    .delete-btn:hover {
        background-color: #c0392b !important;
    }
</style>


        {{-- Description Card --}}
        @php
            $initialDescription = 'Welcome to MySanding Bridal Services! We specialize in providing personalized bridal consultations, fittings, and premium makeup services to make your big day unforgettable.';
        @endphp

        <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-white">Description</h3>
        <br>
        <div x-data="{ editing: false, description: @js($initialDescription) }" class="bg-gray-200 dark:bg-gray-700 p-6 rounded-xl shadow-md">
        
            <!-- Show mode -->
            <div x-show="!editing" class="bg-white dark:bg-gray-900 p-4 rounded-md shadow-sm text-gray-800 dark:text-gray-200">
                <p x-text="description"></p>
            </div>

            <!-- Edit mode -->
            <div x-show="editing" class="bg-white dark:bg-gray-900 p-4 rounded-md shadow-sm">
                <textarea x-model="description" rows="5"
                          class="w-full p-3 rounded-md text-sm dark:bg-gray-900 dark:text-white dark:border-gray-600 border border-gray-300 focus:ring focus:ring-blue-300 resize-none"></textarea>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end mt-3 space-x-2">
                <template x-if="!editing">
                    <button @click="editing = true" class="custom-btn">
                        Edit
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                             viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M15.232 5.232l3.536 3.536M9 11l6.586-6.586a2 2 0 012.828 0l1.172 1.172a2 2 0 010 2.828L13 15H9v-4z" />
                        </svg>
                    </button>
                </template>

                <template x-if="editing">
                    <div class="space-x-2">
                        <button @click="editing = false" class="custom-btn">Cancel</button>
                        <button @click="editing = false" class="custom-btn">Save</button>
                    </div>
                </template>
            </div>
        </div>
        <br>
        <br>
        <br>
        <br>
        
        {{-- Teams Section --}}
        
<div>
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Teams</h3>
        <a href="/team/update" class="custom-btn inline-flex items-center gap-1">
            Add Team
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                 viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 4v16m8-8H4" />
            </svg>
        </a>
    </div>

    <div class="bg-gray-200 dark:bg-gray-700 p-6 rounded-xl shadow-md grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

        {{-- Team Member 1 --}}
        <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow text-center w-full">
            <div class="text-6xl mb-4 text-purple-700 dark:text-purple-300">👤</div>
            <h4 class="font-bold text-lg mb-4 text-gray-800 dark:text-white">Alyaa Sofea</h4>
            <div class="flex justify-center gap-3 mt-3">
                {{-- Delete --}}
                <button class="delete-btn inline-flex items-center gap-1">
                    Delete
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                {{-- Edit --}}
                <a href="/team/update" class="custom-btn inline-flex items-center gap-1">
                    Edit
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.232 5.232l3.536 3.536M9 11l6.586-6.586a2 2 0 012.828 0l1.172 1.172a2 2 0 010 2.828L13 15H9v-4z" />
                    </svg>
                </a>
            </div>
        </div>

        {{-- Team Member 2 --}}
        <div class="bg-white dark:bg-gray-900 p-6 rounded-xl shadow text-center w-full">
            <div class="text-6xl mb-4 text-purple-700 dark:text-purple-300">👤</div>
            <h4 class="font-bold text-lg mb-4 text-gray-800 dark:text-white">Nur Akmar</h4>
            <div class="flex justify-center gap-3 mt-3">
                <button class="delete-btn inline-flex items-center gap-1">
                    Delete
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
                <a href="/team/update" class="custom-btn inline-flex items-center gap-1">
                    Edit
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M15.232 5.232l3.536 3.536M9 11l6.586-6.586a2 2 0 012.828 0l1.172 1.172a2 2 0 010 2.828L13 15H9v-4z" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>
</x-filament-panels::page>
