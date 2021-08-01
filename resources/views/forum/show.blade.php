<x-app-layout>
    <style>
        body {
            background: #f3f4f6 !important;
        }
    </style>
    @livewire('forum.show', ['forum' => $forum], key('forum-show'))
</x-app-layout>
