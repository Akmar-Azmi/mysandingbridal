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
        
<div x-data="{ showModal: false, isEdit: false, teamName: '' }">
    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">Teams</h3>
        <button
            @click="showModal = true; isEdit = false; teamName = ''"
            class="custom-btn">
            Add Team
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
        </button>
    </div>

    <!-- Team Cards -->
    <div class="bg-gray-200 p-6 rounded-xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        <!-- Example Card -->
        <div class="bg-white p-4 rounded-lg shadow text-center">
            <div class="flex justify-center">
    <img src="https://placehold.co/100x100?text=+" alt="Profile"
        class="w-20 h-20 rounded-full object-cover border-2 border-gray-300">
</div>
            <h4 class="font-bold mt-2">Alyaa Sofea</h4>
            <div class="mt-3 flex justify-center gap-2">
               <button class="delete-btn">
                    Delete
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
                <button
                    @click="showModal = true; isEdit = true; teamName = 'Alyaa Sofea'"
                    class="custom-btn">
                    Edit
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M15.232 5.232l3.536 3.536M9 11l6.586-6.586a2 2 0 012.828 0l1.172 1.172a2 2 0 010 2.828L13 15H9v-4z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
    <div class="bg-white p-6 rounded shadow-lg w-96" @click.away="showModal = false">
        <h2 class="text-lg font-semibold mb-4" x-text="isEdit ? 'Edit Team' : 'Add Team'"></h2>

   <!-- Profile Image -->
<div class="relative flex justify-center mb-6">
    <img src="https://placehold.co/150x150?text=+" 
         alt="Profile"
         class="w-36 h-36 rounded-full object-cover shadow-lg bg-white border-4 border-white">

    
<!-- Floating Pencil Icon (perfect circle, centered at bottom, uses custom-btn color) -->
<button type="button"
    class="absolute left-1/2 -translate-x-1/2 bottom-0 w-12 h-12 custom-btn border-4 border-white rounded-full flex items-center justify-center shadow-lg"
    title="Edit Image">
    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24"
         stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round"
              d="M15.232 5.232l3.536 3.536M9 11l6.586-6.586a2 2 0 012.828 0l1.172 1.172a2 2 0 010 2.828L13 15H9v-4z" />
    </svg>
</button>
</div>
        <form>
            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" x-model="teamName"
                   class="w-full border border-gray-300 rounded px-3 py-2 mb-3">

            <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
            <input type="text" x-model="teamRole"
                   class="w-full border border-gray-300 rounded px-3 py-2 mb-4">

            <div class="flex justify-end gap-2">
                <button type="button" @click="showModal = false"
                        class="bg-gray-300 px-3 py-1 rounded text-sm hover:bg-gray-400">Cancel</button>
                <button type="submit"
                        class="custom-btn"
                        x-text="isEdit ? 'Update' : 'Save'"></button>
            </div>
        </form>
    </div>
</div>

</div>
</x-filament-panels::page>
