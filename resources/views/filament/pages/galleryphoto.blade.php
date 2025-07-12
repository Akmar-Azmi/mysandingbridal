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

<form id="uploadForm" method="POST" action="{{ route('admin.gallery.store') }}">
    @csrf
    <div x-data="{ confirmDeleteId: null }">


    {{-- File input --}}
    <input 
        type="file" 
        id="cloudinaryInput" 
        accept="image/*" 
        class="mb-4 w-full border p-2 rounded" 
        onchange="previewImage(event)"
    >

    {{-- Preview box --}}
    <div id="imagePreview" class="mb-4 hidden">
        <p class="text-sm mb-1">Preview:</p>
        <img id="previewImg" src="#" class="rounded shadow mt-2 w-32 h-24 object-cover" />
    </div>

    {{-- Cloudinary image URL --}}
    <input type="hidden" name="image" id="cloudinaryUrl">
    <div x-data="{ confirmDeleteId: null }">

    <div class="flex justify-end gap-2">
        <button type="button" @click="showModal = false" class="px-4 py-2 bg-gray-300 rounded">Cancel</button>
        <button 
            type="button" 
            onclick="uploadToCloudinary()" 
            class="custom-btn"
        >
            Upload
        </button>
    </div>
</form>

{{-- Display newly uploaded image (after success) --}}
<h2 class="mt-8 mb-4 font-semibold text-lg">Your Gallery Photos:</h2>

<div class="flex flex-wrap gap-4">
    @foreach ($images as $image)
        <div class="gallery-card relative inline-block">
            <img src="{{ $image->url }}" class="gallery-image" alt="Gallery image">
            {{-- Delete Button --}}
        <button @click="confirmDeleteId = {{ $image->id }}" class="delete-btn absolute top-0 right-1">
            🗑
        </button>
        </div>
    @endforeach
</div>

<!-- Confirm Delete Modal -->
<!-- Delete Confirmation Modal -->
<div x-show="confirmDeleteId !== null" x-cloak class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
    <div class="bg-white rounded-lg p-6 w-80 shadow text-center">
        <h2 class="text-lg font-semibold mb-4">Are you sure you want to delete this image?</h2>

        <div class="flex justify-center gap-4">
            <button @click="confirmDeleteId = null" class="w-24 px-4 py-2 bg-gray-300 text-black rounded hover:bg-gray-400">
                Cancel
            </button>

            <form :action="`/admin/gallery/delete/${confirmDeleteId}`" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="w-24 px-4 py-2 delete-btn">
                    Delete
                </button>
            </form>
        </div>
    </div>
</div>



<script>

    document.addEventListener('DOMContentLoaded', function () {
        const images = document.querySelectorAll('.gallery-image');

        images.forEach(img => {
            img.style.width = '180px';          // Responsive width
            img.style.height = '180px';        // Set height here (can change to 300px etc.)
            img.style.objectFit = 'cover';     // Crop to fit nicely
            img.style.borderRadius = '8px';    // Optional: rounded
            img.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)'; // Optional: soft shadow
        });
    });

    function previewImage(event) {
        const file = event.target.files[0];
        if (file) {
            const preview = document.getElementById('previewImg');
            preview.src = URL.createObjectURL(file);
            document.getElementById('imagePreview').classList.remove('hidden');
        }
    }

    async function uploadToCloudinary() {
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
            const res = await fetch("https://api.cloudinary.com/v1_1/dynonizve/upload", {
                method: "POST",
                body: formData
            });

            const data = await res.json();

            if (data.secure_url) {
                document.getElementById('cloudinaryUrl').value = data.secure_url;
                document.getElementById('uploadForm').submit();
            } else {
                alert("Upload failed.");
            }
        } catch (err) {
            console.error("Upload error:", err);
            alert("Upload failed.");
        }
    }
</script>


</x-filament-panels::page>
