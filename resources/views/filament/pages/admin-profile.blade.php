<x-filament::page>
    {{-- Form wrapping is needed to make Save button work --}}
    <form wire:submit.prevent="submit" id="form">
        {{ $this->form }}

        {{-- Button Row --}}
        <div class="mt-6 flex flex-col sm:flex-row sm:justify-start gap-4">
            <x-filament::button
                color="gray"
                tag="a"
                href="{{ \App\Filament\Pages\AdminProfile::getUrl() }}"
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

    {{-- Flash Message --}}
    @if (session('message'))
        <div class="mt-4 text-sm text-yellow-700 bg-yellow-100 border-l-4 border-yellow-500 p-3 rounded">
            {{ session('message') }}
        </div>
    @endif
</x-filament::page>
