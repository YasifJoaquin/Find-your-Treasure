{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                @livewire('profile.update-profile-information-form')

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.update-password-form')
                </div>

                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-10 sm:mt-0">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <x-section-border />
            @endif

            <div class="mt-10 sm:mt-0">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <x-section-border />

                <div class="mt-10 sm:mt-0">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout> --}}

<x-guest-layout>
    
    @livewire('menu')

    <div class="flex items-center justify-center w-screen h-screen bg-cover bg-center" style="background-image: url(<img src=({{ asset('src/cartel.png') }})>
        <div class="w-4/5 h-4/5 bg-green-400 grid grid-cols-5 gap-2">
            <div class="col-span-5 border">hello</div>
            <div class="border col-span-2 row-span-6">waza</div>
            <div class="border col-span-2 row-span-3">a</div>
            <div class="border row-span-2"></div>
            <div class="border row-span-2">c</div>
            <div class="border col-span-2 row-span-3">d</div>
            <div class="border row-span-2"></div>
            <div class="border col-span-5"></div>
        </div>
    </div>
    

</x-guest-layout>
