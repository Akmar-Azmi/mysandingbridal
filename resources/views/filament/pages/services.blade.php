
<x-filament-panels::page>
    <div x-data="{ showModal: false, editMode: false, service: {} }">
    <div class="px-8 py-6 space-y-6">
    

        <!-- Custom Button Style -->
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


        <!-- WEEDING SERVICE -->

        <!-- Title -->
        <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-white">Wedding Service</h3>
        

        <!-- Add Service Button -->
        <div class="mb-4">
            <a href="#" @click="showModal = true; isEdit = false;" class="custom-btn">
            + Add Wedding Services
            </a>
        </div>

 

 <!-- TABLE WRAPPER -->

    <div class="w-full bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full border border-gray-400 text-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border border-gray-300">Bil</th>
                    <th class="px-4 py-2 border border-gray-300">Services</th>
                    <th class="px-4 py-2 border border-gray-300">Image</th>
                    <th class="px-4 py-2 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($weddingServices as $index => $service)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-300">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 border border-gray-300">{{ $service['name'] }}</td>
                        <td class="px-4 py-3 border border-gray-300 text-center">
                            <img src="{{ $service['image'] }}" alt="Service Image" class="w-24 h-16 object-cover mx-auto rounded" />
                        </td>
                        <td class="px-4 py-3 border border-gray-300 text-center">
                            <div class="inline-flex gap-2">
                                <button class="custom-btn">Update</button>
                                <button class="delete-btn">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

        
        <br>
        <br>
        <br>


         <!-- OTHER SERVICE -->

        <!-- Title -->
        <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-white">Other Services</h3>

        <!-- Add Service Button -->
        <div class="mb-4">
            <a href="#" @click="showModal = true; isEdit = false;" class="custom-btn">
            + Add Other Services
            </a>
        </div>

        <!-- Other Services Table -->
    <div class="w-full bg-white shadow rounded-lg overflow-x-auto">
        <table class="w-full border border-gray-400 text-sm text-left">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 border border-gray-300">Bil</th>
                    <th class="px-4 py-2 border border-gray-300">Services</th>
                    <th class="px-4 py-2 border border-gray-300">Image</th>
                    <th class="px-4 py-2 border border-gray-300">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($otherServices as $index => $service)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-300">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 border border-gray-300">{{ $service['name'] }}</td>
                        <td class="px-4 py-3 border border-gray-300 text-center">
                            <img src="{{ $service['image'] }}" alt="Service Image" class="w-24 h-16 object-cover mx-auto rounded" />
                        </td>
                        <td class="px-4 py-3 border border-gray-300 text-center">
                            <div class="inline-flex gap-2">
                                <button class="custom-btn">Update</button>
                                <button class="delete-btn">Delete</button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Background -->
<div 
    x-show="showModal"
    class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50"
    x-transition>
    
    <!-- Modal Box -->
    <div class="bg-white rounded-lg shadow-xl w-[90%] md:w-[600px] p-6 space-y-4">
        <h2 class="text-xl font-bold mb-2" x-text="editMode ? 'Update Services' : 'Add New Service'"></h2>
        
        <form method="POST" enctype="multipart/form-data" action="#">
            @csrf
            {{-- Title --}}
            <div>
                <label class="block font-semibold mb-1">Title</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2" placeholder="Wedding Package" x-model="service.title">
            </div>

            {{-- Current Image (only on edit) --}}
            <template x-if="editMode">
                <div>
                    <label class="block font-semibold mb-1">Current Image</label>
                    <img :src="service.image_url" alt="Current Image" class="w-40 h-40 object-cover rounded">
                </div>
            </template>

            {{-- Upload New Image --}}
            <div>
                <label class="block font-semibold mb-1">Upload Image</label>
                <input type="file" name="image" class="w-full">
            </div>

            {{-- Description --}}
            <div>
                <label class="block font-semibold mb-1">Description</label>
                <textarea name="description" class="w-full border rounded px-3 py-2" rows="3" placeholder="Add description..." x-model="service.description"></textarea>
            </div>

            {{-- Action Buttons --}}
            <div class="flex justify-end space-x-2 mt-4">
                <button 
                    type="button"
                    class="bg-gray-300 text-gray-800 px-4 py-2 rounded"
                    @click="showModal = false">Cancel</button>

                <button 
                    type="submit"
                    class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                    <span x-text="editMode ? 'Update' : 'Add'"></span>
                </button>
            </div>
        </form>
    </div>
</div>

</div>

</x-filament-panels::page>


