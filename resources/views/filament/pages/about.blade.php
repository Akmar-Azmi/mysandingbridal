@php use Illuminate\Support\Facades\Storage; @endphp

<x-filament-panels::page>
    

    <div class="px-6 py-6 space-y-10"  x-data="{ showModal: false, isEdit: false, teamId: null, teamName: '', teamRole: '' }">


        {{-- Custom Styles --}}
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

       <div 
     x-data="{
    showModal: false,
    isEdit: false,
    teamId: null,
    teamName: '',
    teamRole: '',
    teamPhoto: '',
    photoUrl: '',

    openEditModal(team) {
        this.showModal = true;
        this.isEdit = true;
        this.teamId = team.id;
        this.teamName = team.name;
        this.teamRole = team.role;
        this.teamPhoto = team.photo;
        this.photoUrl = 'storage/' + team.photo; // ✅ SET HERE
    },

    openAddModal() {
        this.showModal = true;
        this.isEdit = false;
        this.teamId = null;
        this.teamName = '';
        this.teamRole = '';
        this.teamPhoto = '';
        this.photoUrl = '';
    }

}"

>

    <!-- Header -->
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-lg font-semibold">Teams</h3>
        <button
            @click="showModal = true; isEdit = false; teamName = ''; teamRole = ''; photoUrl = null"
            class="custom-btn">
            Add Team
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
        </button>
    </div>

    <!-- Success Toast (Optional) -->
    @if(session('success'))
        <div
            x-data="{ show: true }"
            x-show="show"
            x-init="setTimeout(() => show = false, 2000)"
            x-transition
            class="fixed top-4 right-4 z-50 bg-green-500 text-white px-4 py-2 rounded shadow-lg"
        >
            {{ session('success') }}
        </div>
    @endif

    <!-- Team Cards -->
    <div class="bg-gray-200 p-6 rounded-xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
        @foreach(\App\Models\Team::all() as $member)
            <div class="bg-white p-4 rounded-lg shadow text-center">
                <div class="flex justify-center mb-2">
                @php
                    $photoUrl = 'https://placehold.co/200x200?text=No+Image';

                    if (!empty($member->photo)) {
                        $photoUrl = filter_var($member->photo, FILTER_VALIDATE_URL)
                            ? $member->photo
                            : Storage::disk('s3')->url($member->photo);
                    }
                @endphp

                <img
                    src="{{ $member->photo? $photoUrl : 'https://placehold.co/200x200?text=No+Image' }}"
                    alt="{{ $member->name }}"
                    class="team-photo w-full object-cover rounded-t-md"
                />

                </div>
                <h4 class="font-bold text-lg">{{ $member->name }}</h4>
                <p class="text-sm text-gray-500">{{ $member->role }}</p>
                <div class="mt-3 flex justify-center gap-2">
                    <!-- Delete -->
                    <form method="POST" action="{{ route('teams.destroy', $member->id) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Delete</button>
                    </form>
                    <!-- Edit -->
                    <button
                        @click="
                            showModal = true;
                            isEdit = true;
                            teamId = {{ $member->id }};
                            teamName = '{{ $member->name }}';
                            teamRole = '{{ $member->role }}';
                            photoUrl = '{{ filter_var($member->photo, FILTER_VALIDATE_URL) ? $member->photo : ($member->photo ? Storage::disk('s3')->url($member->photo) : '') }}';
                        "
                        class="custom-btn">
                        Edit
                    </button>
                </div>
            </div>
        @endforeach
    </div>

<!-- Modal -->
<div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-40 z-50">
    <div class="bg-white p-6 rounded shadow-lg w-96" @click.away="showModal = false">
        <h2 class="text-lg font-semibold mb-4" x-text="isEdit ? 'Edit Team' : 'Add Team'"></h2>

        <!-- Form -->
        <form
            id="addTeamForm"
            :action="isEdit ? '{{ url('/admin/teams') }}/' + teamId : '{{ route('teams.store') }}'"
            method="POST"
            enctype="multipart/form-data"
        >
            @csrf
            <input type="hidden" name="photo" :value="photoUrl">

            <template x-if="isEdit">
                <input type="hidden" name="_method" value="PUT">
            </template>

            <!-- Hidden file input -->
            <input type="file" id="photoInput" class="hidden"
                x-ref="photoInput"
                @change="photoUrl = URL.createObjectURL($event.target.files[0])"
            />

            <!-- Image Preview -->
            <div class="relative flex justify-center mb-6">
                <div class="w-full max-w-xs mx-auto">
                    <img id="previewImage"
                        :src="photoUrl || 'https://placehold.co/200x200?text=Upload+Image'"
                        alt="Preview"
                        class="rounded-xl shadow-md border object-cover"/>
                </div>

                <button type="button"
                    @click.prevent="$refs.photoInput.click()"
                    class="absolute left-1/2 -translate-x-1/2 bottom-0 w-10 h-10 custom-btn border-4 border-white rounded-full flex items-center justify-center shadow-lg"
                    title="Upload Image">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.232 5.232l3.536 3.536M9 11l6.586-6.586a2 2 0 012.828 0l1.172 1.172a2 2 0 010 2.828L13 15H9v-4z" />
                    </svg>
                </button>
            </div>

            <!-- Name -->
            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
            <input type="text" name="name" x-model="teamName"
                class="w-full border border-gray-300 rounded px-3 py-2 mb-3" required>

            <!-- Role -->
            <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
            <input type="text" name="role" x-model="teamRole"
                class="w-full border border-gray-300 rounded px-3 py-2 mb-4" required>

            <!-- Buttons -->
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

<!-- JS Resize Script -->
<script>
    function resizeImage(file, maxWidth, callback) {
        const reader = new FileReader();
        reader.onload = function (event) {
            const img = new Image();
            img.onload = function () {
                const canvas = document.createElement('canvas');
                const scale = maxWidth / img.width;
                canvas.width = maxWidth;
                canvas.height = img.height * scale;
                const ctx = canvas.getContext('2d');
                ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                canvas.toBlob(callback, 'image/jpeg', 0.9);
            };
            img.src = event.target.result;
        };
        reader.readAsDataURL(file);
    }

    document.addEventListener('DOMContentLoaded', function () {
        const images = document.querySelectorAll('.team-photo');

        images.forEach(img => {
            const width = 200; // Ambil current width
            img.style.height = width + 'px'; // Set height ikut width → square
            img.style.objectFit = 'cover'; // Crop gambar supaya tak herot
        });

        // OPTIONAL: Responsive resize bila window resize
        window.addEventListener('resize', () => {
            images.forEach(img => {
                const width = 150;
                img.style.height = width + 'px';
            });
        });

            const preview = document.getElementById('previewImage');
        if (preview) {
            preview.style.width = '180px';         // ✅ ubah ikut cita rasa
            preview.style.height = '180px';        // ✅ square
            preview.style.objectFit = 'cover';     // ✅ crop gambar cantik
            preview.style.borderRadius = '12px';   // ✅ rounded
            preview.style.display = 'block';
            preview.style.margin = '0 auto';
        }

        // Bila upload baru, pastikan saiz tetap juga
        document.getElementById('photoInput')?.addEventListener('change', () => {
            if (preview) {
                preview.style.width = '180px';
                preview.style.height = '180px';
            }
        });

    });
    // Intercept the form submission
   
</script>

    </div>
    
    <script>
    const cloudinaryCloudName = 'dynonizve';
    const cloudinaryUploadPreset = 'mysanding_preset';

    const form = document.querySelector('#addTeamForm'); // ✅ fixed selector

    if (form) {
        form.addEventListener('submit', async function(e) {
            const fileInput = document.getElementById('photoInput');
            const file = fileInput?.files?.[0];

            if (!file) return; // No image? Just let Laravel handle it

            e.preventDefault(); // Stop original form

            const formData = new FormData();
            formData.append('file', file);
            formData.append('upload_preset', cloudinaryUploadPreset);

            const response = await fetch(`https://api.cloudinary.com/v1_1/${cloudinaryCloudName}/image/upload`, {
                method: 'POST',
                body: formData
            });

            const data = await response.json();

            if (!data.secure_url) {
                alert('Image upload failed');
                return;
            }

            const imageUrl = data.secure_url;

            // ✅ Update the hidden input
            let hiddenInput = document.querySelector('input[name="photo"]');
            if (!hiddenInput) {
                hiddenInput = document.createElement('input');
                hiddenInput.type = 'hidden';
                hiddenInput.name = 'photo';
                form.appendChild(hiddenInput);
            }

            hiddenInput.value = imageUrl;

            // ✅ Update Alpine.js photoUrl to show the real image preview
            if (typeof photoUrl !== 'undefined') {
                photoUrl = imageUrl;
            }

            fileInput.removeAttribute('name');
            console.log("Submitting with Cloudinary image:", imageUrl); // Avoid Laravel file conflict
            form.submit(); // ✅ Submit with Cloudinary URL
            });
        }
    </script>





</x-filament-panels::page>
