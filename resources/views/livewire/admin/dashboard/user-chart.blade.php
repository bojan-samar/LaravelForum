<section>
    <div class="flex items-center justify-end mb-4">
        <x-jet-dropdown align="right" width="48">
            <x-slot name="trigger">
                <x-jet-secondary-button>
                    Day Range
                    <svg class="-mr-1 ml-2 h-5 w-5" x-description="Heroicon name: chevron-down"
                         xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                         aria-hidden="true">
                        <path fill-rule="evenodd"
                              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </x-jet-secondary-button>
            </x-slot>

            <x-slot name="content">

                <x-jet-dropdown-link href="#" x-on:click="open = false" wire:click="$set('dayRange', 10)">
                    10
                </x-jet-dropdown-link>

                <x-jet-dropdown-link href="#" x-on:click="open = false" wire:click="$set('dayRange', 20)">
                    20
                </x-jet-dropdown-link>

                <x-jet-dropdown-link href="#" x-on:click="open = false" wire:click="$set('dayRange', 30)">
                    30
                </x-jet-dropdown-link>


            </x-slot>
        </x-jet-dropdown>
    </div>

    <div class="shadow rounded-lg p-4 bg-white">

        <x-bar-chart chartId="{{ $chartId }}"
                     title="{{ $dayRange }} Day User Sign Ups"
                     labels="{!! $state['date'] !!}"
                     chartData="{!! $state['count'] !!}"
        ></x-bar-chart>

    </div>


</section>


