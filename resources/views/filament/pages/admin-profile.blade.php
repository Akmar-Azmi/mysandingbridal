<x-filament::page>
    <form wire:submit.prevent="submit" id="form">
        {{ $this->form }}

        <div class="mt-6 flex flex-col sm:flex-row sm:justify-start gap-4">
            <x-filament::button
                color="gray"
                tag="a"
                href="{{ route('filament.admin.pages.admin-profile') }}"
            >
                Cancel
            </x-filament::button>

            <x-filament::button
                type="submit"
                color="primary"
            >
                Save Changes
            </x-filament::button>

            <x-filament::button
                color="danger"
                wire:click="deleteAccount"
            >
                Delete Account
            </x-filament::button>
        </div>
    </form>

    @if (session('message'))
        <div class="mt-4 text-sm text-yellow-700 bg-yellow-100 border-l-4 border-yellow-500 p-3 rounded">
            {{ session('message') }}
        </div>
    @endif
</x-filament::page>
