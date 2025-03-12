<?php
    use function Laravel\Folio\{middleware, name};
    use App\Models\Country;
    use Livewire\Volt\Component;
    middleware('auth');
    name('countries');

    new class extends Component{
        public $countries;

        public function mount()
        {
            $this->countries = Country::all();
        }

        public function delete(Country $country)
        {
            $country->delete();
            $this->countries = Country::all();
        }
    }
?>

<x-layouts.app>
    @volt('countries')
        <x-app.container>

            <div class="flex items-center justify-between mb-5">
                <x-app.heading
                        title="countries"
                        description="Check out your countries below"
                        :border="false"
                    />
                <x-button tag="a" href="/countries/create">New Country</x-button>
            </div>

            @if($countries->isEmpty())
                <div class="w-full p-20 text-center bg-gray-100 rounded-xl">
                    <p class="text-gray-500">You don't have any countries yet.</p>
                </div>
            @else
                <div class="overflow-x-auto border rounded-lg">
                    <table class="min-w-full bg-white">
                        <thead class="text-sm bg-gray-100">
                            <tr>
                                <th class="px-4 py-2 text-left">Name</th>
                               
                                <th class="px-4 py-2 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($countries as $country)
                                <tr>
                                    <td class="px-4 py-2">{{ $country->name }}</td>
                                    <td class="px-4 py-2">
                                        <a href="/countries/edit/{{ $country->id }}" class="mr-2 text-blue-500 hover:underline">Edit</a>
                                        <button wire:click="delete({{ $country->id }})" class="text-red-500 hover:underline">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </x-app.container>
    @endvolt
</x-layouts.app>
