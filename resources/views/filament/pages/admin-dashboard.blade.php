<x-filament::page>
    <!-- ✨ Fancy Appointment Summary Cards Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Appointments -->
        <div class="bg-gradient-to-br from-[#f6d365] to-[#fda085] rounded-xl shadow-lg p-6 text-black">
            <div class="flex items-center justify-between mb-4">
                <div class="text-lg font-semibold">Total Appointments</div>
                <div class="text-2xl">📊</div>
            </div>
            <div class="text-4xl font-bold">{{ \App\Models\Appointment::count() }}</div>
            <p class="text-sm mt-2">All-time total</p>
        </div>

        <!-- Upcoming Appointments -->
        <div class="bg-gradient-to-br from-[#4c8aed] to-[#c2e9fb] rounded-xl shadow-lg p-6 text-[#0f172a]">
            <div class="flex items-center justify-between mb-4">
                <div class="text-lg font-semibold">Upcoming Appointments</div>
                <div class="text-2xl">📅</div>
            </div>
            <div class="text-4xl font-bold">
                {{ \App\Models\Appointment::where('appointment_date', '>', now()->toDateString())->count() }}
            </div>
            <p class="text-sm mt-2">Future bookings</p>
        </div>

        <!-- Today's Appointments -->
        <div class="bg-gradient-to-br from-[#e0c3fc] to-[#8ec5fc] rounded-xl shadow-lg p-6 text-[#0f172a]">
            <div class="flex items-center justify-between mb-4">
                <div class="text-lg font-semibold">Today's Appointments</div>
                <div class="text-2xl">✅</div>
            </div>
            <div class="text-4xl font-bold">
                {{ \App\Models\Appointment::whereDate('appointment_date', now()->toDateString())->count() }}
            </div>
            <p class="text-sm mt-2">Booked for today</p>
        </div>
    </div>

    <!-- 📆 Calendar Widget Box -->
    <div class="bg-white rounded-2xl shadow p-6 w-full max-w-7xl mx-auto">
        <h2 class="text-xl font-semibold text-gray-800 mb-4 text-center">📆 Appointment Calendar</h2>
        @livewire(\App\Filament\Widgets\AppointmentCalendarWidget::class)
    </div>
</x-filament::page>
