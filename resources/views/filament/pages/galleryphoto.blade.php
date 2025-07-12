<x-filament-panels::page>
{{-- Gallery Photos --}}
<h3 class="text-lg font-semibold mb-3 text-gray-900 dark:text-white">Photos</h3>
<br>
<div class="flex flex-wrap gap-6">
    {{-- Static Gallery Items --}}
    <div class="w-32 h-32 rounded-2xl overflow-hidden">
        <img src="https://placehold.co/200x200" alt="Gallery" class="w-full h-full object-cover">
    </div>
    <div class="w-32 h-32 rounded-2xl overflow-hidden">
        <img src="https://placehold.co/200x200" alt="Gallery" class="w-full h-full object-cover">
    </div>
    <div class="w-32 h-32 rounded-2xl overflow-hidden">
        <img src="https://placehold.co/200x200" alt="Gallery" class="w-full h-full object-cover">
    </div>

    {{-- Add Image Button --}}
    <button class="w-32 h-32 bg-gray-300 rounded-2xl flex items-center justify-center text-4xl text-gray-600 hover:bg-gray-400">
        +
    </button>
</div>
<br>
<br>
<br>
</x-filament-panels::page>
