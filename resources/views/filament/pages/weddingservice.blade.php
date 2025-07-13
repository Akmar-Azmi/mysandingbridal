{{-- Section: Wedding Services --}}
<x-filament::page>


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

<div class="space-y-4">
    <div class="mb-4 flex items-center justify-between">
        <h3 class="text-lg font-semibold text-gray-900">Wedding Service Information</h3>
    </div>

    <!-- Edit Form Modal (Hidden by Default) -->
    <div id="editForm" class="hidden bg-gray-100 p-4 rounded-lg">
        <form id="editWeddingServiceForm" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST') {{-- override method via JS --}}

            <!-- Hidden ID & Cloudinary image URL -->
            <input type="hidden" name="id" id="edit-id">
            <input type="hidden" name="image" id="edit-image-url">

            <div>
                <label class="block font-semibold mb-1">Title</label>
                <input type="text" name="name" id="edit-name" class="w-full border rounded px-3 py-2" required>
            </div>

            <div>
                <label class="block font-semibold mb-1">Current Image</label>
                <img id="edit-current-image" src="#" alt="Current Image"
                    class="mt-2 w-32 h-24 object-cover rounded shadow" />
            </div>

            <div>
                <label class="block font-semibold mb-1">Change Image</label>
                <img id="preview-edit-image" src="#" alt="Preview Image"
                    class="mt-2 w-32 h-24 object-cover rounded shadow hidden" />
                <input type="file" id="edit-image" class="mt-2" onchange="uploadEditToCloudinary()" />
            </div>

            <div>
                <label class="block font-semibold mb-1">Description</label>
                <textarea name="description" id="edit-description" rows="4"
                    class="w-full border rounded px-3 py-2" required></textarea>
            </div>

            <div class="flex justify-end gap-2 mt-4">
                <button type="button" onclick="document.getElementById('editForm').classList.add('hidden')"
                    class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</button>
                <button type="submit" class="custom-btn">Update</button>
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
                            <img src="{{ $service['image'] }}" alt="Service Image"
                                class="w-24 h-16 object-cover mx-auto rounded" />
                        </td>
                        <td class="px-4 py-3 border border-gray-300 text-center">
                            <div class="inline-flex gap-2">
                                <button type="button"
                                    onclick='openEditForm(@json($service))'
                                    class="custom-btn">
                                    Update
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function openEditForm(service) {
        const form = document.getElementById('editWeddingServiceForm');
        form.action = `/admin/weddingservices/update/${service.id}`;

        document.getElementById('edit-id').value = service.id;
        document.getElementById('edit-name').value = service.name ?? '';
        document.getElementById('edit-description').value = service.description ?? '';
        document.getElementById('edit-current-image').src = service.image ?? '';
        document.getElementById('edit-image-url').value = service.image ?? '';

        // Hide preview if no new image uploaded
        document.getElementById('preview-edit-image').classList.add('hidden');

        document.getElementById('editForm').classList.remove('hidden');
    }

    function uploadEditToCloudinary() {
        const fileInput = document.getElementById('edit-image');
        const previewImage = document.getElementById('preview-edit-image');
        const hiddenImageInput = document.getElementById('edit-image-url');

        const file = fileInput.files[0];
        if (!file) return;

        const formData = new FormData();
        formData.append('file', file);
        formData.append('upload_preset', 'mysanding_preset');

        fetch('https://api.cloudinary.com/v1_1/dynonizve/image/upload', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            hiddenImageInput.value = data.secure_url;
            previewImage.src = data.secure_url;
            previewImage.classList.remove('hidden');
        })
        .catch(err => {
            alert('Image upload failed.');
            console.error(err);
        });
    }
</script>


</x-filament-panels::page>
