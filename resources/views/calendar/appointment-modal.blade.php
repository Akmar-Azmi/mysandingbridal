
{{-- Just for test --}}
<pre>{{ var_dump($appointment) }}</pre>

@if($appointment)
    <div class="space-y-2 text-sm">
        <p><b>Name:</b> {{ $appointment->name }}</p>
        <p><b>Email:</b> {{ $appointment->email }}</p>
        <p><b>Phone:</b> {{ $appointment->phone }}</p>
        <p><b>Event Type:</b> {{ $appointment->event_type }}</p>
        <p><b>Budget:</b> RM {{ number_format($appointment->budget ?? 0, 2) }}</p>
        <p><b>Date:</b> {{ $appointment->appointment_date }}</p>
        <p><b>Time:</b> {{ $appointment->appointment_time }}</p>
        <p><b>Notes:</b> {{ $appointment->notes ?? '-' }}</p>
    </div>
@else
    <div class="text-red-500">No appointment found.</div>
@endif
