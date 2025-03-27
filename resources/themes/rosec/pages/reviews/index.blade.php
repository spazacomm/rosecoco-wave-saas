<?php
    use function Laravel\Folio\{middleware, name};
    use App\Models\Review;
    use Livewire\Volt\Component;
    middleware('auth');
    name('reviews');

    new class extends Component{
        public $reviews;

        public function mount()
        {
            $this->reviews = auth()->user()->reviews()->latest()->get();
        }

        
    }
?>

<x-layouts.app>
    @volt('reviews')
        <x-app.container>

            <div class="flex items-center justify-between mb-5">
                <x-app.heading
                        title="Reviews"
                        description="Manage your reviews"
                        :border="false"
                    />
            </div>

            @if($reviews->isEmpty())
                <div class="w-full p-20 text-center bg-gray-100 rounded-xl">
                    <p class="text-gray-500">You don't have any reviews yet.</p>
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
                                <th class="px-4 py-2 text-left">Rating</th>
                                <th class="px-4 py-2 text-left">Review</th>
                                <th class="px-4 py-2 text-left"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reviews as $review)
                                <tr class="border-b">
                                    <td class="px-4 py-2">{{ $review->name }}</td>
                                    <td class="px-4 py-2">{{ $review->phone }}</td>
                                    <td class="px-4 py-2">{{ $review->booking_date ? $review->booking_date : 'N/A' }}</td>
                                    <td class="px-4 py-2">{{ $review->rating }} </td>
                                    <td class="px-4 py-2">{{ $review->review }}</td>
                                    <td class="px-4 py-2"></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Mobile View (Cards) - Hidden on Desktop -->
                <div class="space-y-4 md:hidden">
                    @foreach($reviews as $review)
                        <div class="p-4 bg-white border rounded-lg shadow">
                            <p class="text-lg font-semibold">{{ $review->name }}</p>
                            <p class="text-sm text-gray-500">{{ $review->phone }}</p>
                            <p class="text-sm">📅 <strong>Booking Date:</strong> {{ $review->booking_date ? $review->booking_date : 'N/A' }}</p>
                            <p class="text-sm">⏳ <strong>Rating:</strong> {{ $review->rating }} </p>
                            <p class="text-sm">💰 <strong>Review:</strong> {{ $review->review }}</p>
                        </div>
                    @endforeach
                </div>

            @endif
        </x-app.container>
    @endvolt
</x-layouts.app>


