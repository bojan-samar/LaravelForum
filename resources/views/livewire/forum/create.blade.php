<section class="container py-12 max-w-3xl mx-auto">

    <x-jet-secondary-button class="mb-5" wire:click="$emitUp('back')" wire:loading.attr="disabled">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 15l-3-3m0 0l3-3m-3 3h8M3 12a9 9 0 1118 0 9 9 0 01-18 0z" />
        </svg>
        Back
    </x-jet-secondary-button>

    @auth
        <form wire:submit.prevent="store" class="w-full shadow rounded-lg p-4 bg-white">

            <div class="mb-5">
                <x-jet-label value="{{ __('Title') }}" />
                <x-jet-input class="block mt-1 w-full" type="text" name="title" wire:model.defer="state.title" />
                @error('state.title')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-5">
                <x-jet-label value="{{ __('Body') }}" />
                <textarea wire:model.defer="state.body" rows="5" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full"></textarea>
                @error('state.body')
                    <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="flex justify-between mt-5">
                <x-jet-danger-button wire:click="$emitUp('back')" wire:loading.attr="disabled">
                    Cancel
                </x-jet-danger-button>

                <x-jet-button wire:loading.attr="disabled">
                    Submit
                </x-jet-button>
            </div>
        </form>
    @else
    <div class="text-base text-center shadow rounded-lg p-4 bg-white">
        <a href="/login" class="text-blue-600">Log In</a> or <a href="/register" class="text-blue-600">Register</a> To Create a Post
    </div>
    @endauth


</section>
