<x-filament::page>
    <section class="max-w-6xl mx-auto py-10">
        {{-- Header --}}
        <div class="bg-gradient-to-r from-indigo-500 to-blue-600 text-black p-6 rounded-t-xl">
            <p class="text-sm mt-1">Fill in the details for your new client project</p>
        </div>

        {{-- FORM --}}
        <form method="POST" action="{{ route('clients.store') }}" enctype="multipart/form-data"
            class="bg-white rounded-b-xl p-6 shadow-md">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Image Upload --}}
                <div>
                    <label class="block text-sm font-semibold mb-2">Client Image</label>
                    <div class="image-upload-container" onclick="document.getElementById('imageInput').click()">
                        <input type="file" name="image" id="imageInput" accept="image/*" style="display: none;"
                            onchange="handleImageUpload(event)" required>
                        <img id="previewImage" alt="Preview" class="preview-image">
                        <div class="upload-placeholder" id="uploadPlaceholder">
                            <svg xmlns="http://www.w3.org/2000/svg" class="upload-icon" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 16l4.5-4.5m0 0l4.5-4.5m-4.5 4.5H20" />
                            </svg>
                            <div class="upload-text">Upload Image</div>
                            <div class="upload-subtext">Click to browse</div>
                        </div>
                        <div class="image-overlay">
                            <span>Change Image</span>
                        </div>
                    </div>
                </div>

                {{-- Name --}}
                <div>
                    <label class="block text-sm font-semibold mb-2">Client Name</label>
                    <input type="text" name="name" placeholder="e.g. Name" class="w-full border rounded-md p-2"
                        required>
                </div>

                {{-- Theme --}}
                <div>
                    <label class="block text-sm font-semibold mb-2">Theme</label>
                    <input type="text" name="theme" placeholder="e.g. Modern, Minimalist"
                        class="w-full border rounded-md p-2" required>
                </div>

                {{-- Venue --}}
                <div>
                    <label class="block text-sm font-semibold mb-2">Venue</label>
                    <input type="text" name="venue" placeholder="e.g. The Majestic Hall"
                        class="w-full border rounded-md p-2" required>
                </div>

                {{-- Feedback --}}
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold mb-2">Feedback</label>
                    <textarea name="feedback" placeholder="Add notes, praise, or suggestions..."
                        class="w-full border rounded-md p-2 resize-none" rows="4" required></textarea>
                </div>
            </div>

            {{-- Buttons --}}
            <div class="mt-6 flex justify-end gap-3">
                <button type="reset" onclick="clearForm()"
                    class="bg-gray-200 hover:bg-gray-300 text-gray-700 px-6 py-2 rounded-md font-medium text-sm transition">
                    Clear
                </button>

                <button type="submit" class="custom-btn flex items-center gap-2">
                    Add Client
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                </button>
            </div>
        </form>

        {{-- LIST --}}
        @php
            $clients = \App\Models\Client::where('is_visible', true)->latest()->get();
        @endphp

        @if ($clients->count())
            <div class="mt-10 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($clients as $client)
                    <div class="bg-white rounded-xl shadow p-4 hover:shadow-lg transition">
                        <div class="w-full aspect-square overflow-hidden rounded-lg">
                            <img src="{{ $client->image }}" alt="{{ $client->name }}"
                                class="w-full h-full object-cover">
                        </div>
                        <h3 class="text-lg font-bold mt-3">{{ $client->name }}</h3>
                        <p class="text-sm text-purple-600">🎨 {{ $client->theme }}</p>
                        <p class="text-sm text-blue-600">📍 {{ $client->venue }}</p>
                        <p class="text-gray-600 italic mt-2 text-sm">“{{ $client->feedback }}”</p>
                    </div>
                @endforeach
            </div>
        @endif
    </section>

    {{-- STYLE --}}
    <style>
        .image-upload-container {
            position: relative;
            width: 100%;
            aspect-ratio: 1 / 1;
            max-width: 280px;
            border: 2px dashed #d1d5db;
            border-radius: 0.75rem;
            background: #f9fafb;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            margin: 0 auto;
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

        .image-upload-container:hover .image-overlay {
            display: flex;
        }

        .custom-btn {
            background-color: #fbbf24;
            /* yellow-400 */
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
            /* yellow-500 */
        }
    </style>

    {{-- SCRIPT --}}
    <script>
        function handleImageUpload(event) {
            const file = event.target.files[0];
            const previewImage = document.getElementById('previewImage');
            const placeholder = document.getElementById('uploadPlaceholder');
            const container = document.querySelector('.image-upload-container');

            if (file) {
                if (file.size > 2 * 1024 * 1024) {
                    alert("Image size must be less than 2MB");
                    event.target.value = '';
                    return;
                }

                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewImage.style.display = 'block';
                    placeholder.style.display = 'none';
                    container.classList.add('has-image');
                };
                reader.readAsDataURL(file);
            }
        }

        function clearForm() {
            const form = document.querySelector('form');
            form.reset();

            const previewImage = document.getElementById('previewImage');
            const placeholder = document.getElementById('uploadPlaceholder');
            const container = document.querySelector('.image-upload-container');

            previewImage.src = '';
            previewImage.style.display = 'none';
            placeholder.style.display = 'block';
            container.classList.remove('has-image');
        }

        function clearForm() {
            const form = document.querySelector('form');
            form.reset();

            const previewImage = document.getElementById('previewImage');
            const placeholder = document.getElementById('uploadPlaceholder');
            const container = document.querySelector('.image-upload-container');
            const fileInput = document.getElementById('imageInput');

            // Reset image preview
            previewImage.src = '';
            previewImage.style.display = 'none';
            placeholder.style.display = 'block';
            container.classList.remove('has-image');

            // Reset file input (in case user selects the same file again)
            fileInput.value = '';
        }
    </script>
</x-filament::page>
