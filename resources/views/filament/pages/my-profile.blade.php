<x-filament-panels::page>
    <div class="space-y-6">
        <x-filament::section>
            <x-slot name="heading">
                Personal Information
            </x-slot>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Name</p>
                    <p class="text-base text-gray-900 dark:text-white">{{ auth()->user()->name }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Email</p>
                    <p class="text-base text-gray-900 dark:text-white">{{ auth()->user()->email }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Phone</p>
                    <p class="text-base text-gray-900 dark:text-white">{{ auth()->user()->phone ?? 'Not provided' }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Role</p>
                    <p class="text-base text-gray-900 dark:text-white">
                        @if(auth()->user()->role->value === 1)
                            Admin
                        @elseif(auth()->user()->role->value === 2)
                            Customer
                        @else
                            Supplier
                        @endif
                    </p>
                </div>
            </div>
        </x-filament::section>

        @if(auth()->user()->membershipPlan)
        <x-filament::section>
            <x-slot name="heading">
                Membership Information
            </x-slot>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Plan</p>
                    <p class="text-base text-gray-900 dark:text-white">{{ auth()->user()->membershipPlan->name }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Status</p>
                    <p class="text-base">
                        @if(auth()->user()->isMembershipActive())
                            <span class="text-green-600 dark:text-green-400 font-medium">Active</span>
                        @else
                            <span class="text-red-600 dark:text-red-400 font-medium">Expired</span>
                        @endif
                    </p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</p>
                    <p class="text-base text-gray-900 dark:text-white">{{ auth()->user()->membership_start_date?->format('M d, Y') ?? 'Not set' }}</p>
                </div>

                <div>
                    <p class="text-sm font-medium text-gray-700 dark:text-gray-300">End Date</p>
                    <p class="text-base text-gray-900 dark:text-white">{{ auth()->user()->membership_end_date?->format('M d, Y') ?? 'Not set' }}</p>
                </div>
            </div>
        </x-filament::section>
        @endif
    </div>
</x-filament-panels::page>
