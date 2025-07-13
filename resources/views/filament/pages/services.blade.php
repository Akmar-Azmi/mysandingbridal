<x-filament-panels::page>
    <div class="px-8 py-6 space-y-12">

        {{-- Section: Wedding Services --}}
        <div class="space-y-4">
            <div class="mb-4 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Wedding Service</h3>

            </div>

            <!-- Edit Form-->
            <div id="addForm" class="hidden bg-gray-100 p-4 rounded-lg">
                <form method="POST" action="{{ route('admin.services.wedding-services.store') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block font-semibold mb-1">Title</label>
                        <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Upload Image</label>
                        <input type="file" name="image" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Description</label>
                        <textarea name="description" rows="4" class="w-full border rounded px-3 py-2" required></textarea>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button onclick="document.getElementById('addForm').classList.add('hidden')" type="button" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Submit</button>
                    </div>
                </form>
            </div>

            <!-- Table List -->
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
                                        <a href="#" class="custom-btn">Update</a>
                                        <form action="{{ route('admin.services.wedding-services.destroy', $service['id']) }}" method="POST">
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        </div>

       

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
</x-filament-panels::page>
