<x-jet-form-section submit="updateAbout">
    <x-slot name="title">
        {{ __('Shop Details') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your shop\'s information.') }}
    </x-slot>

    <x-slot name="form">

        $admin->decs = this->decs;
        $admin->monThu = this->monThu;
        $admin->friday = this->friday;
        $admin->saturday = this->saturday;
        $admin->location = this->location;
        $admin->phoneNum = this->phoneNum;
        $admin->fax = this->fax;
        <!-- Description -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="decs" value="{{ __('decs') }}" />
            <x-jet-input id="decs" type="text" class="mt-1 block w-full" wire:model.defer="state.decs" />
            <x-jet-input-error for="decs" class="mt-2" />
        </div>

        <!-- Monday to Thursday -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="monThu" value="{{ __('monThu') }}" />
            <x-jet-input id="monThu" type="email" class="mt-1 block w-full" wire:model.defer="state.monThu" />
            <x-jet-input-error for="monThu" class="mt-2" />
        </div>

        <!-- Friday -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="friday" value="{{ __('friday') }}" />
            <x-jet-input id="friday" type="text" class="mt-1 block w-full" wire:model.defer="state.friday" />
            <x-jet-input-error for="friday" class="mt-2" />
        </div>

        <!-- Saturday -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="saturday" value="{{ __('saturday') }}" />
            <x-jet-input id="saturday" type="text" class="mt-1 block w-full" wire:model.defer="state.saturday" />
            <x-jet-input-error for="saturday" class="mt-2" />
        </div>

        <!-- Location -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="location" value="{{ __('location') }}" />
            <x-jet-input id="location" type="text" class="mt-1 block w-full" wire:model.defer="state.location" />
            <x-jet-input-error for="location" class="mt-2" />
        </div>

        <!-- Contact Number -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="phoneNum" value="{{ __('phoneNum') }}" />
            <x-jet-input id="phoneNum" type="text" class="mt-1 block w-full" wire:model.defer="state.phoneNum" />
            <x-jet-input-error for="phoneNum" class="mt-2" />
        </div>

        <!-- Fax -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="fax" value="{{ __('fax') }}" />
            <x-jet-input id="fax" type="text" class="mt-1 block w-full" wire:model.defer="state.fax" />
            <x-jet-input-error for="fax" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
