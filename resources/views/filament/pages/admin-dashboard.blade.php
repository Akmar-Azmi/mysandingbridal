<x-filament::page>
    <div class="space-y-6">
        <!-- Total Appointments Box -->
        <div class="bg-white rounded-2xl shadow p-6 w-full max-w-md mx-auto text-center">
            @livewire(\App\Filament\Widgets\TotalAppointmentsWidget::class)
        </div>

        <!-- Calendar Widget Box -->
        <div class="bg-white rounded-2xl shadow p-4 w-full max-w-5xl mx-auto">
            @livewire(\App\Filament\Widgets\FullCalendarWidget::class)
        </div>
    </div>
</x-filament::page>
