<div x-sort="$wire.sort($item, $position)"
     class="flex flex-col flex-shrink-0 self-start max-h-full w-80 ring-1 bg-gray-100 dark:bg-gray-900 ring-gray-950/10 dark:ring-white/10 rounded-md"
>
    <livewire:edit-group wire:key="edit-group-{{ $group->getKey() }}" :group="$group"/>
    <div class="flex-1 min-h-0 overflow-y-auto" style="scrollbar-width: thin;">
        <div x-sort x-sort:group="groups" class="pt-1 pb-3 flex flex-col gap-3 px-3">
            @foreach($group->tasks()->inOrder()->get() as $task)
               <livewire:kanban.card :task="$task" wire:key="task-{{ $task->getKey() }}"/>
            @endforeach
        </div>
    </div>
    <livewire:add-task
        @task-created="$refresh"
        wire:key="add-task-{{ $group->getKey() }}"
        :group="$group"/>
</div>
