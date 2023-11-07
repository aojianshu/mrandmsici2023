<?php

namespace App\Livewire\Candidates;

use App\Models\Candidate;
use App\Models\Team;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    #[Rule('required')]
    public $firstname;

    #[Rule('required')]
    public $lastname;

    #[Rule('required|integer')]
    public $number;

    #[Rule('required')]
    public $team_id;

    #[Rule('required')]
    public $gender;

    #[Rule('required|image')]
    public $photo;

    public function render()
    {
        return view('livewire.candidates.create', [
            'teams' => Team::all(),
        ]);
    }

    public function createCandidate()
    {
        $this->validate();

        $fileName = $this->lastname . '.' . $this->photo->extension();
        $this->photo->storeAs('public/candidates', $fileName);
        Candidate::create([
            'firstname' => $this->firstname,
            'lastname' => $this->lastname,
            'gender' => $this->gender,
            'team_id' => $this->team_id,
            'number' => $this->number,
            'photo' => $fileName,
        ]);

        session()->flash('message', 'Candidate successfully created');
        return $this->redirect('/candidates', navigate: true);
    }
}
