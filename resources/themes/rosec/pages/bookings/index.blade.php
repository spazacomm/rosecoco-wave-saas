<?php
    use function Laravel\Folio\{middleware, name};
    use App\Models\Booking;
    use Livewire\Volt\Component;
    middleware('auth');
    name('bookings');

    new class extends Component{
        public $bookings;

        public function mount()
        {
            $this->bookings = auth()->user()->bookings()->latest()->get();
        }

        
    }
?>

<x-layouts.app>
    @volt('bookings')
        <x-app.container>

            <div class="flex items-center justify-between mb-5">
                <x-app.heading
                        title="Bookings"
                        description="Manage your bookings"
                        :border="false"
                    />
            </div>

            @if($bookings->isEmpty())
                <div class="w-full p-20 text-center bg-gray-100 rounded-xl">
                    <p class="text-gray-500">You don't have any bookings yet.</p>
                </div>
            @else
                <!-- Desktop Table (Hidden on Mobile) -->
                <div class="overflow-x-auto border rounded-lg hidden md:block">
                    <table class="w-full min-w-[800px] bg-white">
                        <thead class="text-sm bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">Customer Name</th>
                                <th class="px-4 py-2 text-left">Customer Phone</th>
                                <th class="px-4 py-2 text-left">Booking Date</th>
                                <th class="px-4 py-2 text-left">Duration</th>
                                <th class="px-4 py-2 text-left">Amount</th>
                                <th class="px-4 py-2 text-left">Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr class="border-b">
                                    <td class="px-4 py-2">{{ $booking->customer_name }}</td>
                                    <td class="px-4 py-2">{{ $booking->customer_phone }}</td>
                                    <td class="px-4 py-2">{{ $booking->booking_time ? $booking->booking_time->format('Y-m-d') : 'N/A' }}</td>
                                    <td class="px-4 py-2">{{ $booking->duration }} hrs</td>
                                    <td class="px-4 py-2">${{ $booking->amount }}</td>
                                    <td class="px-4 py-2">{{ $booking->message }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mobile View (Cards) - Hidden on Desktop -->
                <div class="space-y-4 md:hidden">
                    @foreach($bookings as $booking)
                        <div class="p-4 bg-white border rounded-lg shadow">
                            <p class="text-lg font-semibold">{{ $booking->customer_name }}</p>
                            <p class="text-sm text-gray-500">{{ $booking->customer_phone }}</p>
                            <p class="text-sm">📅 <strong>Booking Date:</strong> {{ $booking->booking_time ? $booking->booking_time->format('Y-m-d') : 'N/A' }}</p>
                            <p class="text-sm">⏳ <strong>Duration:</strong> {{ $booking->duration }} hrs</p>
                            <p class="text-sm">💰 <strong>Amount:</strong> ${{ $booking->amount }}</p>
                            <p class="text-sm">💬 <strong>Message:</strong> {{ $booking->message }}</p>
                        </div>
                    @endforeach
                </div>

            @endif
        </x-app.container>
    @endvolt
</x-layouts.app>


