@if($appointment)
    <div class="text-sm space-y-1">
        <p><strong>Name:</strong> {{ $appointment->name }}</p>
        <p><strong>Email:</strong> {{ $appointment->email }}</p>
        <p><strong>Phone:</strong> {{ $appointment->phone }}</p>
        <p><strong>Event Type:</strong> {{ $appointment->event_type }}</p>
        <p><strong>Date:</strong> {{ $appointment->appointment_date }}</p>
        <p><strong>Time:</strong> {{ $appointment->appointment_time }}</p>
        <p><strong>Budget:</strong> RM {{ number_format($appointment->budget ?? 0, 2) }}</p>
        <p><strong>Notes:</strong> {{ $appointment->notes }}</p>
    </div>
@else
    <div class="text-red-600">No appointment data found.</div>
@endif
