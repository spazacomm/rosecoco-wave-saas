<?php
    use function Laravel\Folio\{middleware, name};
	middleware('auth');
    name('dashboard');
?>

<x-layouts.app>
	<x-app.container x-data class="lg:space-y-6" x-cloak>
        
		
        <x-app.heading
                title="Dashboard"
                description="Welcome to rosecoco."
                :border="false"
            />

        <div class="flex flex-col w-full mt-6 space-y-5 md:flex-row lg:mt-0 md:space-y-0 md:space-x-5">
            <x-app.dashboard-card
				href="/settings/profile"
			
				title="Profile"
				description="Manage and update your profile"
				link_text="manage profile"
				image="/wave/img/docs.png"
			/>
			<x-app.dashboard-card
				href="/settings/subscription"
				
				title="Subscriptions"
				description="Manage your profile subscriptions"
				link_text="manage subscriptions"
				image="/wave/img/community.png"
			/>
        </div>

		<div class="flex flex-col w-full mt-5 space-y-5 md:flex-row md:space-y-0 md:mb-0 md:space-x-5">
			<x-app.dashboard-card
				href="notifications"
				
				title="Messages"
				description="Manage you profile notifications"
				link_text="manage notifications"
				image="/wave/img/laptop.png"
			/>
			<x-app.dashboard-card
				href="#"
				
				title="Offers"
				description="View and manage offers and bookings"
				link_text="manage offers"
				image="/wave/img/globe.png"
			/>
		</div>

		<!-- <div class="mt-5 space-y-5">
			@subscriber
				<p>You are a subscribed user with the <strong>{{ auth()->user()->roles()->first()->name }}</strong> role. Learn <a href="https://devdojo.com/wave/docs/features/roles-permissions" target="_blank" class="underline">more about roles</a> here.</p>
				<x-app.message-for-subscriber />
			@else
				<p>This current logged in user has a <strong>{{ auth()->user()->roles()->first()->name }}</strong> role. To upgrade, <a href="{{ route('settings.subscription') }}" class="underline">subscribe to a plan</a>. Learn <a href="https://devdojo.com/wave/docs/features/roles-permissions" target="_blank" class="underline">more about roles</a> here.</p>
			@endsubscriber
			
			@admin
				<x-app.message-for-admin />
			@endadmin
		</div> -->
    </x-app.container>
</x-layouts.app>
