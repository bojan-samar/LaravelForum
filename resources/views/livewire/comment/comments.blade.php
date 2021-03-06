<section id="comments" class="bg-gray-100 py-12">
    <div class="container px-4 md:px-0 mx-auto">
        <div class="shadow rounded-lg p-4 bg-white">

            <div class="font-bold mb-5 text-xl">Comments</div>

            @auth
                <div class="mb-8">
                    <form id="new-comment" wire:submit.prevent="postComment">
                        <x-resizable-textarea class="mt-1" wire:model.defer="newCommentState.body"></x-resizable-textarea>
                        @error('newCommentState.body')
                            <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror
                        <x-jet-button class="mt-3">
                            Comment
                        </x-jet-button>
                    </form>
                </div>
            @else
                <div class="text-base mb-8">
                    <a href="/login" class="text-blue-600">Log In</a> or <a href="/register" class="text-blue-600">Register</a> To Reply
                </div>
            @endauth

            @forelse($comments as $comment)
                @livewire('comment.comment', ['comment' => $comment], key($comment->id))

                <div class="ml-14">
                    @foreach ($comment->children as $child)
                        @livewire('comment.comment', ['comment' => $child], key(time().$child->id))
                    @endforeach
                </div>
            @empty
                <div class="font-bold mt-5">No Comments Yet</div>
            @endforelse

        </div>
    </div>
</section>
