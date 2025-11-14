<x-filament-panels::page.simple>
    <x-filament-panels::header
        :heading="$this->getHeading()"
        :subheading="$this->getSubheading()"
    />

    {{ \Filament\Facades\Filament::renderHook('panels::auth.login.form.before') }}

    <x-filament-panels::form wire:submit="authenticate">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getFormActions()"
        />
    </x-filament-panels::form>

    {{ \Filament\Facades\Filament::renderHook('panels::auth.login.form.after') }}
</x-filament-panels::page.simple>
