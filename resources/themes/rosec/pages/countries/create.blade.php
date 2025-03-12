<?php
    use function Laravel\Folio\{middleware, name};
    use App\Models\Country;
    use Livewire\Attributes\Validate;
    use Livewire\Volt\Component;
    middleware('auth');
    name('countries.create');

    new class extends Component
    {
        #[Validate('required|min:3|max:255')]
        public $name = '';

        

        public function save()
        {
            $validated = $this->validate();

            $country = Country::create($validated);

            session()->flash('message', 'country created successfully.');

            $this->redirect(route('countries'));
        }
    }
?>

<x-layouts.app>
    @volt('countries.create')
        <x-app.container>

            <x-elements.back-button
                class="max-w-full mx-auto mb-3"
                text="Back to countries"
                :href="route('countries')"
            />

            <div class="flex items-center justify-between mb-3">
                <x-app.heading
                        title="New Country"
                        description=""
                        :border="false"
                    />
            </div>

            <form wire:submit="save" class="space-y-4">
                <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-700">Country name</label>
                    <input type="text" id="name" wire:model="name" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                    @error('name') <span class="text-xs text-red-500">{{ $message }}</span> @enderror
                </div>
                

                <div>
                    <x-button type="submit">
                        Create Country
                    </x-button>
                </div>
            </form>
        </x-app.container>
    @endvolt
</x-layouts.app>
