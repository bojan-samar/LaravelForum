<section>
    @switch($step)

        @case('index')
            @livewire('admin.forum.index', key('index'))
            @break

        @case('show')
            @livewire('admin.forum.show', ['forumId' => $forumSelected], key('admin-forum-show'))
            @break

        @default
            Nothing

    @endswitch

</section>

