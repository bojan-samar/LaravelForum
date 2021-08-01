<section id="comments" class="bg-gray-100 py-12">
    <div class="container mx-auto">
        <div class="shadow rounded-lg p-4 bg-white">

            @forelse($comments as $comment)
                <div class="font-bold mb-5">Comments</div>
                @livewire('comment.comment', ['comment' => $comment], key($comment->id))

                <div class="ml-14">
                    @foreach ($comment->children as $child)
                        @livewire('comment.comment', ['comment' => $child], key(time().$child->id))
                    @endforeach
                </div>
            @empty
                <div class="font-bold">No Comments Yet</div>
            @endforelse

            @auth
                <div class="mt-10">

                    <form id="new-comment" wire:submit.prevent="postComment" class="max-w-2xl">
                        <textarea id="reply" type="text"
                                  wire:model.defer="newCommentState.body"
                                  class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm block mt-1 w-full @error('newCommentState.body') border-red-500 @enderror"
                                  name="reply"
                                  rows="5">
                        </textarea>

                        @error('newCommentState.body')
                        <p class="text-red-500 text-xs italic mt-1">{{ $message }}</p>
                        @enderror

                        <x-jet-button class="mt-3">
                            Comment
                        </x-jet-button>
                    </form>
                </div>
            @else
                <div class="text-base">
                    <a href="/login" class="text-blue-600">Log In</a> or <a href="/register" class="text-blue-600">Register</a> To Reply
                </div>
            @endauth

        </div>
    </div>
</section>
