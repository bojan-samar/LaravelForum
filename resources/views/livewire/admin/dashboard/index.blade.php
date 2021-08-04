<div class="flex flex-wrap -mx-4">
    <div class="w-full md:w-1/2 p-4">
        @livewire('admin.dashboard.forum-chart', key('forum-chart'))
    </div>
    <div class="w-full md:w-1/2 p-4">
        @livewire('admin.dashboard.comments-chart', key('comments-chart'))
    </div>
    <div class="w-full p-4">
        @livewire('admin.dashboard.user-chart', key('user-chart'))
    </div>
</div>
