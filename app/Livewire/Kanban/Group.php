<?php

namespace App\Livewire\Kanban;

use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Group as GroupModel;

class Group extends Component
{
    public GroupModel $group;

    public function mount(GroupModel $group)
    {
        $this->group = $group;
    }

    public function render()
    {
        return view('livewire.kanban.group');
    }

    public function sort($taskId, $targetSortPosition)
    {
        $task = Task::find($taskId);
        $currentSortPosition = $task->sort;

        if($currentSortPosition == $targetSortPosition) {
            return;
        }

        DB::transaction(function () use ($task, $targetSortPosition, $currentSortPosition) {
            $group = $task->group;

            $task->update(['sort' => -1]);
            $tasks = $group->tasks()->whereBetween('sort', [
                min($currentSortPosition, $targetSortPosition),
                max($currentSortPosition, $targetSortPosition),
            ]);

            if ($currentSortPosition < $targetSortPosition) {
                $tasks->decrement('sort');
            } else {
                $tasks->increment('sort');
            }


            $task->update(['sort' => $targetSortPosition]);
        });


    }
}
