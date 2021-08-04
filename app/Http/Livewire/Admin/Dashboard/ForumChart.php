<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ForumChart extends Component
{
    public $dayRange = 30;
    public $chartId;
    public $state = [
        'forumCount' => null,
        'forumDate' => null,
    ];


    public function render()
    {
        $this->chartId = "myChart" . Str::random(5);
        $forums = DB::table('forums')
        ->selectRaw("count(id) as count, DATE_FORMAT(created_at,'%m/%d/%Y') as date")
        ->groupBy('date')
        ->whereDate('created_at', '>=' , now()->subDays($this->dayRange))
        ->get();

        $this->state['forumCount'] = $forums->pluck('count');
        $this->state['forumDate'] = $forums->pluck('date');

        return view('livewire.admin.dashboard.forum-chart');
    }
}
