<section>
    @switch($step)

        @case('index')
            @livewire('admin.comment.index', key('index'))
            @break

        @case('show')
            @livewire('admin.comment.show', ['commentId' => $commentSelected], key('admin-comment-show'))
            @break

        @default
            Nothing

    @endswitch

</section>

