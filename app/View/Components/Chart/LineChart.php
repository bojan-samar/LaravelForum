<?php

namespace App\View\Components\Chart;

use Illuminate\View\Component;

class LineChart extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $chartId;
    public $chartData;
    public $labels;
    public $title;

     public function __construct($chartId, $chartData, $labels, $title)
    {
        $this->chartId = $chartId;
        $this->chartData = $chartData;
        $this->labels = $labels;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.chart.line-chart');
    }
}
