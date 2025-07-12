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


        {{-- Past Events Section --}}
         <div class="space-y-4">
            <div class="mb-4 flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Past Event</h3>

                <button onclick="document.getElementById('addForm').classList.toggle('hidden')" class="custom-btn">
                    + Add Past Event
                </button>
            </div>

            <!-- Add Form -->
            <div id="addForm" class="hidden bg-gray-100 p-4 rounded-lg">
                <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block font-semibold mb-1">Title</label>
                        <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Upload Image</label>
                        <img id="preview-add-image" src="#" alt="Image Preview" class="mt-2 w-32 h-24 object-cover rounded shadow hidden" />
                        <input type="file" name="image" id="add-image" class="w-full border rounded px-3 py-2" required>
                        
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Description</label>
                        <textarea name="description" rows="4" class="w-full border rounded px-3 py-2" required></textarea>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button onclick="document.getElementById('addForm').classList.add('hidden')" type="button" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                        <button type="submit" class="custom-btn">Submit</button>
                    </div>
                </form>
            </div>


<!-- Edit Form -->
<div id="editForm" class="hidden bg-gray-100 p-4 rounded-lg">
    <form id="editEventForm" method="POST" action="" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" id="edit-id">

        <div>
            <label class="block font-semibold mb-1">Title</label>
            <input type="text" name="title" id="edit-title" class="w-full border rounded px-3 py-2" required>
        </div>

        <div>
            <label class="block font-semibold mb-1">Current Image</label>
            <img id="edit-current-image" src="#" alt="Current Image" class="mt-2 w-32 h-24 object-cover rounded shadow" />
        </div>

        <div>
            <label class="block font-semibold mb-1">Change Image</label>
            <img id="preview-edit-image" src="#" alt="Preview Image" class="mt-2 w-32 h-24 object-cover rounded shadow hidden" />
            <input type="file" name="image" id="edit-image" class="w-full border rounded px-3 py-2">
        </div>

        <div>
            <label class="block font-semibold mb-1">Description</label>
            <textarea name="description" id="edit-description" rows="4" class="w-full border rounded px-3 py-2" required></textarea>
        </div>

        <div class="flex justify-end gap-2">
            <button type="button"
                onclick="document.getElementById('editForm').classList.add('hidden')"
                class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
            <button type="submit" class="custom-btn">Update</button>
        </div>
    </form>
</div>



<!-- Past Event Table -->
<div class="w-full bg-white shadow rounded-lg overflow-x-auto">
    <table class="w-full border border-gray-400 text-sm text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-4 py-2 border border-gray-300">Bil</th>
                <th class="px-4 py-2 border border-gray-300">Title</th>
                <th class="px-4 py-2 border border-gray-300">Image</th>
                <th class="px-4 py-2 border border-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($PastEvents as $index => $gallery)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-3 border border-gray-300">{{ $index + 1 }}</td>
                    <td class="px-4 py-3 border border-gray-300">{{ $gallery['title'] }}</td>
                    <td class="px-4 py-3 border border-gray-300 text-center">
                        @php
                            $imageUrl = \Illuminate\Support\Str::startsWith($gallery['image'], 'http')
                                ? $gallery['image']
                                : asset('storage/' . $gallery['image']);
                        @endphp

                        <img src="{{ $imageUrl }}" alt="Event Image"
                            class="w-24 h-16 object-cover mx-auto rounded"
                            onerror="this.src='/images/default.jpg'" />
                    </td>
                    <td class="px-4 py-3 border border-gray-300 text-center">
                        <div class="inline-flex gap-2">
                          <button
                            type="button"
                            class="custom-btn bg-yellow-500"
                            onclick="openEditForm({{ $gallery['id'] }}, '{{ addslashes($gallery['title']) }}', '{{ addslashes($gallery['description']) }}', '{{ $imageUrl }}')">
                            Update
                        </button>

                                <form method="POST" action="{{ route('events.destroy', $gallery->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-btn">Delete</button>
                    </form>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>


<script>
    function openEditForm(id, title, description, imageUrl) {
        document.getElementById('edit-id').value = id;
        document.getElementById('edit-title').value = title;
        document.getElementById('edit-description').value = description;
        document.getElementById('edit-current-image').src = imageUrl;
        document.getElementById('edit-current-image').classList.remove('hidden');
        document.getElementById('editForm').classList.remove('hidden');
        document.getElementById('editEventForm').action = `/admin/gallery/${id}`;
        document.getElementById('preview-edit-image').classList.add('hidden');
        document.getElementById('edit-image').value = ''; // reset file input
    }

    // Optional preview for changed image
    document.getElementById('edit-image').addEventListener('change', function (event) {
        const file = event.target.files[0];
        const preview = document.getElementById('preview-edit-image');
        if (file) {
            preview.src = URL.createObjectURL(file);
            preview.classList.remove('hidden');
        } else {
            preview.src = '#';
            preview.classList.add('hidden');
        }
    });
</script>
</script>

    </div>
</x-filament-panels::page>
