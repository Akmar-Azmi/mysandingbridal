<x-filament-panels::page>
    <div class="p-6 space-y-10">
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


{{-- Gallery Photos --}}
<h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-white">Photos</h3>
<br>
<div class="flex flex-wrap gap-6">
    {{-- Static Gallery Items --}}
    <div class="w-32 h-32 rounded-2xl overflow-hidden">
        <img src="https://placehold.co/200x200" alt="Gallery" class="w-full h-full object-cover">
    </div>
    <div class="w-32 h-32 rounded-2xl overflow-hidden">
        <img src="https://placehold.co/200x200" alt="Gallery" class="w-full h-full object-cover">
    </div>
    <div class="w-32 h-32 rounded-2xl overflow-hidden">
        <img src="https://placehold.co/200x200" alt="Gallery" class="w-full h-full object-cover">
    </div>

    {{-- Add Image Button --}}
    <button class="w-32 h-32 bg-gray-300 rounded-2xl flex items-center justify-center text-4xl text-gray-600 hover:bg-gray-400">
        +
    </button>
</div>
<br>
<br>
<br>


        {{-- Past Events Section --}}
         <!-- Title -->
        <h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-white">Past Events</h3>

        <!-- Add Service Button -->
        <div class="mb-4">
            <a href="#" @click="showModal = true; isEdit = false;" class="custom-btn">
            + Add Events
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
                @foreach ($PastEvents as $index => $gallery)
                    <tr class="hover:bg-gray-50">
                        <td class="px-4 py-3 border border-gray-300">{{ $index + 1 }}</td>
                        <td class="px-4 py-3 border border-gray-300">{{ $gallery['name'] }}</td>
                        <td class="px-4 py-3 border border-gray-300 text-center">
                            <img src="{{ $gallery['image'] }}" alt="Service Image" class="w-24 h-16 object-cover mx-auto rounded" />
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
</x-filament-panels::page>
