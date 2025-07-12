<x-filament::page>
    <section class="max-w-6xl mx-auto py-10" x-data="{ showModal: false, editingClient: null }">
        {{-- Add Button --}}
        <div class="flex items-center justify-end mb-6">
            <button @click="showModal = true; editingClient = null" class="custom-btn">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Add Client
            </button>
        </div>

        {{-- Client Cards --}}
        @php $clients = \App\Models\Client::where('is_visible', true)->latest()->get(); @endphp
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @foreach ($clients as $client)
                <div class="bg-white rounded-xl shadow p-4 relative">
                    {{-- 3-dot Dropdown --}}
                    <div class="absolute top-2 right-2">
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open"
                                class="w-8 h-8 flex items-center justify-center rounded-full transition focus:outline-none"
                                style="background-color: #fbbf24;">
                                <svg class="w-4 h-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path
                                        d="M6 10a2 2 0 11-4 0 2 2 0 014 0zm6-2a2 2 0 100 4 2 2 0 000-4zm6 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                            </button>
                            <div x-show="open" @click.away="open = false"
                                class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow z-50 text-sm py-1">
                                <button @click="showModal = true; editingClient = {{ $client->toJson() }}; open = false"
                                    class="flex items-center gap-2 px-4 py-2 text-gray-700 hover:bg-gray-100 w-full">
                                    <i class="fa-solid fa-pen"></i> Edit
                                </button>
                                <form method="POST" action="{{ route('clients.destroy', $client->id) }}"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf @method('DELETE')
                                    <button
                                        class="flex items-center gap-2 px-4 py-2 text-red-600 hover:bg-red-100 w-full">
                                        <i class="fa-solid fa-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    {{-- Card Content --}}
                    <div class="w-full aspect-square overflow-hidden rounded-lg">
                        <img src="{{ $client->image }}" alt="{{ $client->name }}" class="w-full h-full object-cover" />
                    </div>
                    <h3 class="text-lg font-bold mt-3 text-gray-800">{{ $client->name }}</h3>
                    <p class="text-sm text-gray-700">{{ $client->theme }}</p>
                    <p class="text-sm text-gray-600">{{ $client->venue }}</p>
                    <p class="text-gray-500 text-sm mt-2">Feedback</p>
                    <div class="mt-1 bg-gray-100 p-2 rounded-md text-sm text-gray-800">{{ $client->feedback }}</div>
                </div>
            @endforeach
        </div>

        {{-- Toast --}}
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 4000)"
                class="fixed top-6 right-6 z-50 flex items-center gap-3 bg-green-500 text-white px-5 py-3 rounded-lg shadow-lg shadow-green-300/50">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif
        {{-- MODAL --}}
        <div x-show="showModal" x-cloak
            class="fixed inset-0 z-50 bg-black/40 flex items-center justify-center px-4 overflow-y-auto">
            <div @click.away="showModal = false" class="bg-white w-full max-w-md rounded-xl p-6 my-8 shadow-lg">
                <h2 class="text-xl font-bold mb-1" x-text="editingClient ? 'Edit Client' : 'Add Client'"></h2>
                <form :action="editingClient ? `/admin/clients/${editingClient.id}` : '{{ route('clients.store') }}'"
                    method="POST" enctype="multipart/form-data" id="clientForm">
                    @csrf
                    <template x-if="editingClient">@method('PUT')</template>
                    <input type="hidden" name="image" id="cloudinaryImageUrl">

                    {{-- Upload --}}
                    <div class="flex justify-center mb-4" x-data="{ hovered: false }" @mouseenter="hovered = true"
                        @mouseleave="hovered = false">
                        <div class="image-upload-container" @click="$refs.imageInput.click()">
                            <input type="file" x-ref="imageInput" accept="image/*" style="display: none"
                                @change="handleUploadImage($event)">
                            <img id="previewImage" :src="editingClient?.image || ''"
                                :class="editingClient?.image ? 'preview-image block' : 'preview-image'" />
                            <div class="upload-placeholder" id="uploadPlaceholder">
                                <svg xmlns="http://www.w3.org/2000/svg" class="upload-icon" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M4 16l4.5-4.5m0 0l4.5-4.5m-4.5 4.5H20" />
                                </svg>
                                <div class="upload-text">Upload Image</div>
                                <div class="upload-subtext">Click to browse</div>
                            </div>
                            <div class="image-overlay" x-show="hovered"><span>Change Image</span></div>
                        </div>
                    </div>

                    {{-- Fields --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium">Client Name</label>
                            <input type="text" name="name" class="w-full border rounded-md p-2"
                                :value="editingClient?.name || ''" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Theme</label>
                            <input type="text" name="theme" class="w-full border rounded-md p-2"
                                :value="editingClient?.theme || ''" required>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium">Venue</label>
                            <input type="text" name="venue" class="w-full border rounded-md p-2"
                                :value="editingClient?.venue || ''" required>
                        </div>
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium">Feedback</label>
                            <textarea name="feedback" rows="3" class="w-full border rounded-md p-2" x-text="editingClient?.feedback || ''"
                                required></textarea>
                        </div>
                    </div>

                    {{-- Buttons --}}
                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" @click="showModal = false"
                            class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-4 py-2 rounded-md text-sm">
                            Cancel
                        </button>
                        <button type="submit" class="custom-btn flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            <span x-text="editingClient ? 'Update Client' : 'Add Client'"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    {{-- Styles --}}
    <style>
        .image-upload-container {
            position: relative;
            width: 100%;
            aspect-ratio: 1 / 1;
            max-width: 220px;
            border: 2px dashed #d1d5db;
            border-radius: 0.75rem;
            background: #f9fafb;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
        }

        .image-upload-container:hover {
            background: #eef2ff;
            border-color: #6366f1;
        }

        .upload-placeholder {
            text-align: center;
            color: #6b7280;
            font-size: 0.875rem;
        }

        .upload-icon {
            width: 2rem;
            height: 2rem;
            margin: 0 auto 0.5rem;
            opacity: 0.6;
        }

        .upload-text {
            font-weight: 500;
        }

        .upload-subtext {
            font-size: 0.75rem;
            opacity: 0.7;
        }

        .preview-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }

        .preview-image.block {
            display: block;
        }
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            color: white;
            display: none;
            align-items: center;
            justify-content: center;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .custom-btn {
            background-color: #fbbf24;
            color: white;
            font-weight: 600;
            padding: 0.5rem 1.25rem;
            border-radius: 0.375rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: background-color 0.3s ease;
        }

        .custom-btn:hover {
            background-color: #f59e0b;
        }
    </style>

    {{-- Script --}}
    <script>
        const cloudName = "dynonizve";
        const uploadPreset = "mysanding_preset";

        function handleUploadImage(event) {
            const file = event.target.files[0];
            if (!file) return;

            const previewImage = document.getElementById('previewImage');
            const placeholder = document.getElementById('uploadPlaceholder');

            // 1. Show local preview instantly
            const reader = new FileReader();
            reader.onload = (e) => {
                previewImage.src = e.target.result;
                previewImage.classList.add('block');
                placeholder.style.display = 'none';
            };
            reader.readAsDataURL(file);

            // 2. Upload to Cloudinary
            const formData = new FormData();
            formData.append("file", file);
            formData.append("upload_preset", uploadPreset);

            fetch(`https://api.cloudinary.com/v1_1/${cloudName}/upload`, {
                    method: "POST",
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    document.getElementById('cloudinaryImageUrl').value = data.secure_url;
                })
                .catch(err => {
                    alert("Image upload failed.");
                    console.error(err);
                });
        }
    </script>
</x-filament::page>
