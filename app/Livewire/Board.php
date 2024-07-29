<?php

namespace App\Livewire;

use App\Models\Group;
use App\Models\Task;
use App\View\Components\KanbanLayout;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Board extends Component
{
    public $groups;

    public function mount()
    {
        $this->groups = Group::all();
    }

    #[Layout(KanbanLayout::class)]
    public function render()
    {
        return view('livewire.board');
    }

    public function sort($taskId, $targetSortPosition)
    {
        $task = Task::find($taskId);
        $task->update(['sort' => $targetSortPosition]);
    }
}
