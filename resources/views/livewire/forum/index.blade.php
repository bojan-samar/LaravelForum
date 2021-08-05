<section>
    <div id="auto-delete-search" class="md:max-w-lg mx-auto mb-8">
        <form
            class="rounded-lg overflow-hidden flex border">
            <input wire:model.debounce.500ms="search" type=" text" name="search"
                class="leading-snug shadow block w-full appearance-none bg-white text-sm text-gray-600 py-3 outline-none focus:outline-none px-4"
                placeholder="Search...">
            <button type="submit"
                class="inline-flex px-3 items-center text-sm border border-transparent font-semibold tracking-widest bg-gray-300 hover:bg-gray-400 active:bg-gray-400 focus:outline-none focus:border-gray-400 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">Search</button>
        </form>
    </div>

    @forelse ($forums as $forum)

        <div class="shadow rounded-lg p-4 bg-white mb-5">

            <x-forum.post limitBody="true" :user="$forum['user']" :post="$forum"></x-forum.post>

        </div>


    @empty

        <div class="shadow rounded-lg p-4 bg-white mb-5 text-center font-bold text-2xl">
            No Posts
        </div>

    @endforelse
</section>
