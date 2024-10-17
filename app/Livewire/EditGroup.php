<?php

namespace App\Livewire;

use App\Models\Group;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditGroup extends Component
{
    public Group $group;

    #[Validate('required')]
    public $name;

    public function mount()
    {
       $this->name = $this->group->name;
    }

    public function update(): void
    {
        $this->validate();

        $this->group->update([
            'name' => $this->name,
        ]);

        $this->dispatch('group-updated');
    }

    public function resetForm(bool $isEditing)
    {
        if (!$isEditing) {
           $this->name = $this->group->name;
        }
    }

    public function render()
    {
        return view('livewire.edit-group');
    }
}
