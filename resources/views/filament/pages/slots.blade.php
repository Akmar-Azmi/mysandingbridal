<x-filament::page>
    <div x-data="slotModal()" x-init="init()" class="relative">
        @php
            $current = $date;
            $startOfMonth = $current->copy()->startOfMonth();
            $startDayOfWeek = $startOfMonth->dayOfWeekIso;
            $daysInMonth = $current->daysInMonth;
            $prevMonth = $current->copy()->subMonth();
            $nextMonth = $current->copy()->addMonth();
            $weekdays = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
        @endphp

        <div
            class="w-full h-screen max-h-screen overflow-hidden flex flex-col items-center justify-start px-4 sm:px-6 lg:px-8 py-4 bg-[#fcfbf7]">
            <div class="flex justify-between items-center w-full max-w-screen-xl mb-2">
                <a href="{{ url()->current() }}?month={{ $prevMonth->month }}&year={{ $prevMonth->year }}"
                    class="p-3 rounded-full bg-yellow-100 hover:bg-yellow-200 text-yellow-600 shadow transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>

                <h2 class="text-xl sm:text-2xl font-bold text-gray-800 text-center">
                    {{ strtoupper($current->format('F Y')) }}
                </h2>

                <a href="{{ url()->current() }}?month={{ $nextMonth->month }}&year={{ $nextMonth->year }}"
                    class="p-3 rounded-full bg-yellow-100 hover:bg-yellow-200 text-yellow-600 shadow transition">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>

            <div
                class="w-full max-w-screen-xl flex-1 bg-white border border-gray-300 rounded-xl shadow overflow-hidden flex flex-col">
                <div
                    class="grid grid-cols-7 bg-gradient-to-r from-yellow-50 to-yellow-100 text-yellow-700 font-semibold text-center text-xs sm:text-sm border-b border-gray-200">
                    @foreach ($weekdays as $day)
                        <div class="py-3 sm:py-4 uppercase tracking-wide">{{ $day }}</div>
                    @endforeach
                </div>

                <div class="grid grid-cols-7 grid-rows-6 flex-1">
                    @for ($i = 1; $i < $startDayOfWeek; $i++)
                        <div
                            class="border-b border-r border-gray-100 bg-gray-50 flex items-center justify-center text-gray-300 text-sm">
                            —</div>
                    @endfor

                    @for ($day = 1; $day <= $daysInMonth; $day++)
                        @php
                            $dateInstance = $current->copy()->day($day);
                            $isToday = $dateInstance->isToday();
                            $dayOfWeek = $dateInstance->dayOfWeekIso;
                            $isWeekend = $dayOfWeek >= 6;
                            $dateString = $dateInstance->format('Y-m-d');
                            $isPast = $dateInstance->lt(\Carbon\Carbon::today());

                            $slotAvailable = $slotData[$dateString] ?? null;

                        @endphp

                        <div @if (!$isPast) @click="openModal('{{ $dateString }}')" @endif
                            @if ($isPast) title="Cannot edit past slots" @endif
                            class="relative border-b border-r border-gray-200 p-2 sm:p-3 h-full
            {{ $isPast ? 'bg-gray-100 text-gray-400 cursor-not-allowed' : ($isWeekend ? 'bg-gray-50' : 'bg-white hover:bg-yellow-50 transition cursor-pointer') }}">

                            <div
                                class="absolute top-1 left-2 text-sm sm:text-base font-semibold
            {{ $isToday ? 'text-yellow-600 uppercase' : ($isPast ? 'text-gray-400' : 'text-gray-800') }}">
                                {{ $isToday ? 'Today' : $day }}

                                {{-- ✅ Slot info shown here --}}
                                @if ($slotAvailable !== null)
                                    <div class="flex items-center gap-1 mt-1">
                                        @php
                                            $dotColor = 'gray';
                                            if ($slotAvailable == 0) {
                                                $dotColor = '#ef4444'; // red-500
                                            } elseif ($slotAvailable <= 5) {
                                                $dotColor = '#facc15'; // yellow-400
                                            } else {
                                                $dotColor = '#22c55e'; // green-500
                                            }
                                        @endphp

                                        <span
                                            style="display:inline-block; width:8px; height:8px; border-radius:50%; background-color: {{ $dotColor }};">
                                        </span>
                                        <span class="text-xs font-medium text-gray-600">{{ $slotAvailable }}</span>

                                    </div>
                                @endif
                            </div>
                        </div>
                    @endfor

                    @php
                        $totalCells = $startDayOfWeek + $daysInMonth - 1;
                        $remainingCells = (7 - ($totalCells % 7)) % 7;
                    @endphp
                    @for ($i = 0; $i < $remainingCells; $i++)
                        <div
                            class="border-b border-r border-gray-100 bg-gray-50 flex items-center justify-center text-gray-300 text-sm">
                            —</div>
                    @endfor
                </div>
            </div>
        </div>

        <div x-show="showModal" x-cloak
            class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 backdrop-blur-sm">
            <div @click.away="showModal = false"
                class="bg-white border border-gray-300 rounded-2xl shadow-lg p-6 w-full max-w-md mx-4 relative transition-all duration-300 ease-out">

                <!-- Modal Header with Close Button -->
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold text-gray-800">
                        Manage Slots for <span class="text-yellow-600" x-text="selectedDate"></span>
                    </h3>
                    <button @click="showModal = false"
                        class="text-red-500 hover:text-red-600 text-2xl font-bold leading-none">
                        &times;
                    </button>
                </div>

                <!-- Form -->
                <form @submit.prevent="saveSlot">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Total Slots</label>
                            <input type="number" x-model="form.total_slots" min="0"
                                @input="syncAvailableIfEmpty"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Available Slots</label>
                            <input type="number" x-model="form.available_slots" min="0"
                                class="w-full rounded-lg border border-gray-300 px-3 py-2 shadow-sm focus:ring-2 focus:ring-yellow-400 focus:outline-none">
                        </div>
                        <div class="pt-2 flex justify-end space-x-3">
                            <button type="button" @click="showModal = false"
                                class="px-4 py-2 font-semibold rounded-lg border border-black shadow transition hover:bg-gray-100">
                                Cancel
                            </button>
                            <button type="submit" style="background-color: #facc15; color: black;"
                                class="px-4 py-2 font-semibold rounded-lg border border-black shadow transition hover:brightness-110">
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-filament::page>

<script>
    function slotModal() {
        return {
            showModal: false,
            selectedDate: '',
            loaded: false,
            form: {
                total_slots: '',
                available_slots: '',
            },
            init() {},
            openModal(date) {
                const today = new Date().toISOString().split('T')[0];
                if (date < today) return;

                this.showModal = true;
                this.selectedDate = date;
                this.loaded = false;

                fetch('/admin/slots/fetch', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            date
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        this.form.total_slots = data?.total_slots ?? '';
                        this.form.available_slots = data?.available_slots ?? data?.total_slots ?? '';
                        this.loaded = true;
                    });
            },
            syncAvailableIfEmpty() {
                if (this.form.available_slots === '' || this.form.available_slots == null) {
                    this.form.available_slots = this.form.total_slots;
                }
            },
            saveSlot() {
                fetch('/admin/slots/save', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        body: JSON.stringify({
                            date: this.selectedDate,
                            total_slots: this.form.total_slots,
                            available_slots: this.form.available_slots
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        if (data.success) {
                            alert('Slot saved successfully!');
                            this.showModal = false;
                            location.reload();
                        }
                    });
            }
        }
    }
</script>
