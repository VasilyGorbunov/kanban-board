<?php

use App\Livewire\AddTask;
use App\Models\Group;
use App\Models\Task;
use Illuminate\Database\Eloquent\Factories\Sequence;
use function Pest\Laravel\assertDatabaseHas;

it('it can create tasks', function () {
    $group = Group::factory()->create();
    $newTask = Task::factory()->make();

    Livewire::test(AddTask::class, ['group' => $group])
        ->set('description', $newTask->description)
        ->call('store');

    assertDatabaseHas('tasks', [
        'description' => $newTask->description
    ]);
});

it('properly sort new tasks', function () {
    $group = Group::factory()->create();
    Task::factory()
        ->state(['sort' => 0])
        ->for($group)
        ->create();

    $newTask = Task::factory()->make();

    Livewire::test(AddTask::class, ['group' => $group])
        ->set('description', $newTask->description)
        ->call('store');

    assertDatabaseHas('tasks', [
        'description' => $newTask->description,
        'sort' => 0
    ]);
});
