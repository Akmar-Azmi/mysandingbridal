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
                <h3 class="text-lg font-semibold text-gray-900">Past Event Information</h3>

                <button onclick="document.getElementById('addForm').classList.toggle('hidden')" class="custom-btn">
                    + Add Past Event
                </button>
            </div>

            <!-- Add Form -->
            <div id="addForm" class="hidden bg-gray-100 p-4 rounded-lg">
                <form method="POST" action="{{ route('admin.events.store') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block font-semibold mb-1">Title</label>
                        <input type="text" name="title" class="w-full border rounded px-3 py-2" required>
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Upload Image</label>
                        <img id="preview-add-image" src="#" class="mt-2 w-32 h-24 object-cover rounded shadow hidden" />
                        <input type="file" id="cloudinaryInput" class="border rounded px-3 py-2 w-full mb-3">
                        <input type="hidden" id="cloudinaryUrl" name="image">
                    </div>
                    <div>
                        <label class="block font-semibold mb-1">Description</label>
                        <textarea name="description" rows="4" class="w-full border rounded px-3 py-2" required></textarea>
                    </div>
                    <div class="flex justify-end gap-2">
                        <button type="button" onclick="document.getElementById('addForm').classList.add('hidden')" class="bg-gray-300 px-4 py-2 rounded">Cancel</button>
                        <button type="button" onclick="handleAddEvent()" class="custom-btn">Submit</button>
                    </div>
                </form>
            </div>

            <!-- ✅ EDIT FORM (updated to weddingservice style) -->
            <div id="editForm" class="hidden bg-gray-50 border p-6 rounded-lg shadow mt-6">
                <form id="editEventForm" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <input type="hidden" name="id" id="edit-id">
                    <input type="hidden" name="image" id="edit-image-url">

                    <div>
                        <label class="block font-semibold mb-1">Title</label>
                        <input type="text" name="title" id="edit-title" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mt-4">
                        <label class="block font-semibold mb-1">Change Image</label>
                        <img id="preview-edit-image" src="#" class="w-32 h-24 object-cover rounded shadow hidden mb-2" />
                        <input type="file" id="edit-image" onchange="uploadEditToCloudinary()" />
                    </div>

                    <div class="mt-4">
                        <label class="block font-semibold mb-1">Description</label>
                        <textarea name="description" id="edit-description" rows="4"
                                  class="w-full border rounded px-3 py-2" required></textarea>
                    </div>

                    <div class="flex justify-end gap-2 mt-6">
                        <button type="button" onclick="document.getElementById('editForm').classList.add('hidden')" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</button>
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
                        @foreach ($PastEvents as $index => $gallery)
                            <tr class="hover:bg-gray-50">
                                <td class="px-4 py-3 border border-gray-300">{{ $index + 1 }}</td>
                                <td class="px-4 py-3 border border-gray-300">{{ $gallery['title'] }}</td>
                                <td class="px-4 py-3 border border-gray-300 text-center">
                                    @php
                                        $imageUrl = \Illuminate\Support\Str::startsWith($gallery['image'], 'http')
                                            ? $gallery['image']
                                            : asset('storage/' . $gallery['image']);
                                    @endphp
                                    <img src="{{ $imageUrl }}" class="w-24 h-16 object-cover mx-auto rounded"
                                         onerror="this.src='/images/default.jpg'" />
                                </td>
                                <td class="px-4 py-3 border border-gray-300 text-center">
                                    <div class="inline-flex gap-2">
                                        <button type="button" class="custom-btn bg-yellow-500"
                                            onclick='openEditForm(@json($gallery))'>
                                            Update
                                        </button>
                                        <form method="POST" action="{{ route('admin.events.destroy', $gallery->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- JS Script -->
            <script>
                async function handleAddEvent() {
                    const fileInput = document.getElementById('cloudinaryInput');
                    const file = fileInput.files[0];
                    if (!file) {
                        alert("Please choose an image.");
                        return;
                    }

                    const formData = new FormData();
                    formData.append('file', file);
                    formData.append('upload_preset', 'mysanding_preset');

                    try {
                        const res = await fetch("https://api.cloudinary.com/v1_1/dynonizve/image/upload", {
                            method: 'POST',
                            body: formData
                        });

                        const data = await res.json();
                        document.getElementById('cloudinaryUrl').value = data.secure_url;
                        document.querySelector('#addForm form').submit();

                    } catch (err) {
                        alert("Upload failed.");
                        console.error(err);
                    }
                }

                function openEditForm(event) {
                    const form = document.getElementById('editEventForm');
                    form.action = `/admin/pastevent/${event.id}`;
                    form.querySelector('input[name="_method"]').value = "PUT";

                    document.getElementById('edit-id').value = event.id;
                    document.getElementById('edit-title').value = event.title ?? '';
                    document.getElementById('edit-description').value = event.description ?? '';
                    document.getElementById('edit-image-url').value = event.image ?? '';

                    const preview = document.getElementById('preview-edit-image');
                    if (event.image) {
                        preview.src = event.image;
                        preview.classList.remove('hidden');
                    } else {
                        preview.classList.add('hidden');
                    }

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
        </div>
    </div>
</x-filament-panels::page>
