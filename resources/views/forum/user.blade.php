<x-app-layout>
    <style>
        body {
            background: #f3f4f6 !important;
        }
    </style>

    <section class="max-w-3xl mx-auto pt-8">
        <div class="flex items-center">
            <div class="p-4">
                <img class="h-24 w-24 rounded-full object-cover" src="{{ $user['profile_photo_url'] }}" alt="{{ $user['name'] }}">
            </div>
            <div class="p-4">
                <div><b>Name:</b> {{ $user->alias }}</div>
                <div><b>Posts: </b> {{ $user->forums->count() }}</div>
            </div>
        </div>
    </section>


    <section class="max-w-3xl mx-auto py-5 px-4">
        <h2 class="font-black text-3xl mb-5 text-center">Latest Posts</h2>
        @forelse ($user->forums as $forum)
            <div class="shadow rounded-lg p-4 bg-white mb-5">

                <x-forum.post limitBody="true" :user="$user" :post="$forum"></x-forum.post>

            </div>

        @empty

            <div class="shadow rounded-lg p-4 bg-white mb-5 text-center font-bold text-2xl">
                No Posts
            </div>

        @endforelse
    </section>

</x-app-layout>
