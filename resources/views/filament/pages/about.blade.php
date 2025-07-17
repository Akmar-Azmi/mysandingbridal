@php use Illuminate\Support\Facades\Storage; @endphp

<x-filament-panels::page>
    <div class="px-6 py-6 space-y-10" x-data="{
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
            this.photoUrl = team.photo;
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
    }">

        {{-- Custom Button Styles --}}
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

        <!-- Header -->
        <div class="flex justify-between items-center mb-4">
            <h3 class="text-lg font-semibold">Teams</h3>
            <button @click="openAddModal()" class="custom-btn">
                Add Team
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
            </button>
        </div>

        <!-- Success Toast -->
        @if (session('success'))
            <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 2000)" x-transition
                class="fixed top-4 right-4 z-50 bg-green-500 text-black px-4 py-2 rounded shadow-lg">
                {{ session('success') }}
            </div>
        @endif

        <!-- Team Cards -->
        <div class="bg-gray-200 p-6 rounded-xl grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach (\App\Models\Team::all() as $member)
                @php
                    $photoUrl = 'https://placehold.co/200x200?text=No+Image';
                    if (!empty($member->photo)) {
                        $photoUrl = filter_var($member->photo, FILTER_VALIDATE_URL)
                            ? $member->photo
                            : Storage::disk('s3')->url($member->photo);
                    }
                @endphp

                <div class="bg-white p-4 rounded-lg shadow text-center">
                    <div class="flex justify-center mb-2">
                        <img src="{{ $photoUrl }}" alt="{{ $member->name }}"
                            class="team-photo w-full object-cover rounded-t-md" style="height: 200px;" />
                    </div>
                    <h4 class="font-bold text-lg">{{ $member->name }}</h4>
                    <p class="text-sm text-gray-500">{{ $member->role }}</p>
                    <div class="mt-3 flex justify-center gap-2">
                        <!-- Delete -->
                        <form method="POST" action="{{ route('teams.destroy', $member->id) }}">
                            @csrf @method('DELETE')
                            <button type="submit" class="delete-btn">Delete</button>
                        </form>
                        <!-- Edit -->
                        <button
                            @click="openEditModal({ id: {{ $member->id }}, name: '{{ $member->name }}', role: '{{ $member->role }}', photo: '{{ $photoUrl }}' })"
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
                <form id="addTeamForm"
                    :action="isEdit ? '{{ url('/admin/teams') }}/' + teamId : '{{ route('teams.store') }}'"
                    method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="photo" :value="photoUrl">
                    <template x-if="isEdit">
                        <input type="hidden" name="_method" value="PUT">
                    </template>

                    <!-- Hidden File Input -->
                    <input type="file" id="photoInput" class="hidden" x-ref="photoInput"
                        @change="photoUrl = URL.createObjectURL($event.target.files[0])" />

                    <!-- Image Preview -->
                    <div class="relative flex justify-center mb-6">
                        <div class="rounded-xl overflow-hidden border shadow-md cursor-pointer"
                            style="width: 180px; height: 180px;" @click="$refs.photoInput.click()">
                            <img id="previewImage" :src="photoUrl || 'https://placehold.co/200x200?text=Upload+Image'"
                                alt="Preview"
                                style="width: 100%; height: 100%; object-fit: cover; border-radius: 12px;" />
                        </div>
                    </div>

                    <!-- Name Field -->
                    <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                    <input type="text" name="name" x-model="teamName"
                        class="w-full border border-gray-300 rounded px-3 py-2 mb-3" required>

                    <!-- Role Field -->
                    <label class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                    <input type="text" name="role" x-model="teamRole"
                        class="w-full border border-gray-300 rounded px-3 py-2 mb-4" required>

                    <!-- Buttons -->
                    <div class="flex justify-end gap-2">
                        <button type="button" @click="showModal = false"
                            class="bg-gray-300 px-3 py-1 rounded text-sm hover:bg-gray-400">Cancel</button>
                        <button type="submit" class="custom-btn" x-text="isEdit ? 'Update' : 'Save'"></button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Upload Script -->
    <script>
        const cloudinaryCloudName = 'dynonizve';
        const cloudinaryUploadPreset = 'mysanding_preset';

        const form = document.querySelector('#addTeamForm');

        if (form) {
            form.addEventListener('submit', async function(e) {
                const fileInput = document.getElementById('photoInput');
                const file = fileInput?.files?.[0];
                if (!file) return;

                e.preventDefault();

                const formData = new FormData();
                formData.append('file', file);
                formData.append('upload_preset', cloudinaryUploadPreset);

                const response = await fetch(
                    `https://api.cloudinary.com/v1_1/${cloudinaryCloudName}/image/upload`, {
                        method: 'POST',
                        body: formData
                    });

                const data = await response.json();
                if (!data.secure_url) {
                    alert('Image upload failed');
                    return;
                }

                const imageUrl = data.secure_url;
                let hiddenInput = document.querySelector('input[name="photo"]');
                if (!hiddenInput) {
                    hiddenInput = document.createElement('input');
                    hiddenInput.type = 'hidden';
                    hiddenInput.name = 'photo';
                    form.appendChild(hiddenInput);
                }

                hiddenInput.value = imageUrl;
                fileInput.removeAttribute('name');
                form.submit();
            });
        }
    </script>
</x-filament-panels::page>
