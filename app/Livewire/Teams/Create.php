<?php

namespace App\Livewire\Teams;

use App\Models\Team;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $name;

    #[Rule('required')]
    public $color;

    #[Rule('required|image')]
    public $photo;

    public function render()
    {
        return view('livewire.teams.create');
    }

    public function createTeam()
    {
        $this->validate();

        $fileName = $this->color . '-' . $this->name . '.' . $this->photo->extension();

        $this->photo->storeAs('public/teams', $fileName);
        Team::create([
            'name' => $this->name,
            'color' => $this->color,
            'photo' => $fileName,
        ]);

        session()->flash('message', 'Team successfully created');
        return $this->redirect('/teams', navigate: true);
    }
}
