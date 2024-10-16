<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\Task;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $group = Group::factory()->state(['name' => 'To-Do'])->create();
        Task::factory(8)
            ->state(new Sequence(
                ['sort' => 0, 'description' => 'Task 1'],
                ['sort' => 1, 'description' => 'Task 2'],
                ['sort' => 2, 'description' => 'Task 3'],
                ['sort' => 3, 'description' => 'Task 4'],
                ['sort' => 4, 'description' => 'Task 5'],
                ['sort' => 5, 'description' => 'Task 6'],
                ['sort' => 6, 'description' => 'Task 7'],
                ['sort' => 7, 'description' => 'Task 8']
            ))
            ->for($group)
            ->create();
    }
}
