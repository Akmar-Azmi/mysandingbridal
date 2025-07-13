<x-filament-panels::page>
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

   


    <form method="POST" action="{{ route('admin.contact.update') }}">
        @csrf

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
            <!-- Header -->
            <div class="mb-8">
                <p class="text-gray-600">Update your contact details and business information</p> <Br>
            </div>

            @if(session('success'))
                <div class="bg-green-100 text-green-800 p-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Contact Details Section -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M3 8l7.89 7.89a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg> 
                            Contact Details <Br>
                        </h2>

                        <!-- WhatsApp & Email -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <!-- WhatsApp -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">WhatsApp Number</label>
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center justify-center w-10 h-10 bg-green-100 rounded-lg flex-shrink-0">
                                        <svg class="w-5 h-5 text-green-600" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="..."/>
                                        </svg>
                                    </div>
                                    <div class="flex flex-1 gap-2">
                                        <select name="whatsapp_code" class="w-20 px-3 py-2.5 border border-gray-300 rounded-lg bg-white text-sm">
                                            @foreach(['+60', '+65', '+62', '+1', '+44'] as $code)
                                                <option value="{{ $code }}" @selected(old('whatsapp_code', $contact->whatsapp_code ?? '+60') === $code)>
                                                    {{ $code }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <input type="text" name="whatsapp_number"
                                               value="{{ old('whatsapp_number', $contact->whatsapp_number ?? '') }}"
                                               placeholder="12345678"
                                               class="...">
                                    </div>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-700">Email Address</label>
                                <div class="flex items-center gap-3">
                                    <div class="flex items-center justify-center w-10 h-10 bg-red-100 rounded-lg flex-shrink-0">
                                        <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                  d="M3 8l7.89 7.89a2 2 0 002.22 0L21 8..."/>
                                        </svg>
                                    </div>
                                    <input type="email" name="email"
                                           value="{{ old('email', $contact->email ?? '') }}"
                                           placeholder="kaklina@gmail.com"
                                           class="...">
                                </div>
                            </div>
                        </div>
                        <Br>
                        <!-- Address -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">Business Address</label>
                            <input type="text" name="address"
                                   value="{{ old('address', $contact->address ?? '') }}"
                                   placeholder="Share your address"
                                   class="...">
                        </div>
                    </div>

                    <!-- Business Hours Section -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Opening Hours <Br>
                        </h2>

                        <div class="space-y-4">
                            <div class="flex flex-wrap items-center gap-2 sm:gap-3">
                                <span class="text-sm font-medium text-gray-700 min-w-[60px]">Open:</span>

                                <!-- Start Time -->
                                <input type="text" name="open_time"
                                       value="{{ old('open_time', $contact->open_time ?? '08:00 AM') }}"
                                       placeholder="08:00 AM"
                                       class="...">

                                <span class="text-gray-400 font-medium">to</span>

                                <!-- End Time -->
                                <input type="text" name="close_time"
                                       value="{{ old('close_time', $contact->close_time ?? '06:00 PM') }}"
                                       placeholder="06:00 PM"
                                       class="...">
                            </div>

                            <div class="text-xs text-gray-500 bg-gray-50 p-3 rounded-lg">
                                <span class="font-medium">Note:</span> These hours will be displayed to your customers
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Location Section -->
                    <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                        <h2 class="text-lg font-semibold text-gray-900 mb-6 flex items-center gap-2">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618..."/>
                            </svg>
                            Set Location
                        </h2>

                        <div class="space-y-4">
                            <div class="w-full">
                                <div class="relative overflow-hidden rounded-xl border border-gray-200 shadow-sm">
                                    <div class="aspect-[4/3] bg-gray-100">
                                        <iframe
                                            class="..."
                                            src="{{ old('location_embed', $contact->location_embed ?? 'https://www.google.com/maps?q=4.2105,101.9758&hl=es;z=14&output=embed') }}"
                                            loading="lazy"
                                            style="border: 0;"></iframe>
                                    </div>
                                </div>
                            </div>

                            <label class="block text-sm font-medium text-gray-700">Location Embed Link</label>
                            <textarea name="location_embed"
                                      rows="2"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm">{{ old('location_embed', $contact->location_embed ?? '') }}</textarea>

                            <div class="text-xs text-gray-500 bg-blue-50 p-3 rounded-lg">
                                <span class="font-medium">Tip:</span> Use an iframe embed URL from Google Maps
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3 sm:justify-end">
                        <a href="{{ url()->previous() }}"
                           class="w-full sm:w-auto px-6 py-3 border border-gray-300 text-gray-700 rounded-lg font-medium hover:bg-gray-50 text-center">
                            Cancel
                        </a>
                        <button type="submit"
                           class="custom-btn w-full sm:w-auto px-6 py-3 text-white font-medium text-center flex items-center justify-center hover:bg-gray-50">
                            Save Changes
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</x-filament-panels::page>
