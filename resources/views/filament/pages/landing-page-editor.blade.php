<x-filament::page>
    <form wire:submit.prevent="save" class="space-y-6">

        {{ $this->form }}

        <div class="flex justify-end">
            <x-filament::button type="submit" color="primary" icon="heroicon-o-check-circle">
                Save Changes
            </x-filament::button>
        </div>

    </form>
</x-filament::page>
