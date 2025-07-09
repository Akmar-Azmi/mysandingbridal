<x-filament-panels::page>
    <div class="px-6 py-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">Team</h2>

        <div class="bg-gray-300 dark:bg-gray-800 p-6 rounded-xl shadow max-w-3xl mx-auto">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Update Teams</h3>

            <div class="flex justify-center mb-6">
                <div class="w-28 h-28 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center shadow">
                    <svg class="w-16 h-16 text-gray-500 dark:text-gray-300" fill="none" stroke="currentColor" stroke-width="1.5"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M5.121 17.804A9 9 0 1119 12.9m0 0a3 3 0 100-6 3 3 0 000 6zm0 0v.1zM12 6a6 6 0 100 12 6 6 0 000-12z" />
                    </svg>
                </div>
            </div>

            <form>
                <div class="grid grid-cols-1 gap-6">
                    <div class="flex items-center">
                        <label class="w-20 text-gray-700 dark:text-white font-medium">Name:</label>
                        <input type="text" class="flex-1 p-2 rounded-md border border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white"
                               placeholder="e.g. kakLina@gmail.com">
                    </div>

                    <div class="flex items-center">
                        <label class="w-20 text-gray-700 dark:text-white font-medium">Role:</label>
                        <input type="text" class="flex-1 p-2 rounded-md border border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white"
                               placeholder="e.g. kakLina77">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="bg-blue-600 hover:bg-blue-700 text-white font-semibold text-sm px-4 py-2 rounded-full shadow flex items-center gap-1">
                            Update
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2"
                                 viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M5 13l4 4L19 7" />
                            </svg>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-filament-panels::page>
