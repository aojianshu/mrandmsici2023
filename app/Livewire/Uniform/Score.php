<?php

namespace App\Livewire\Uniform;

use App\Models\Uniform;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Score extends Component
{

    public $candidate;

    #[Rule('required|numeric|between:75,100')]
    public $score;

    public function render()
    {
        return view('livewire.uniform.score');
    }

    public function submitScore()
    {
        $input = $this->validate();

        Uniform::updateOrCreate(
            ['judge_id' => Auth::user()->judge->id, 'candidate_id' => $this->candidate->id],
            ['score' => $input['score']],
        );

        session()->flash('message', 'Score candidate ' . $this->candidate->fullName() . ' in Uniform Attire category successfully.');
        return $this->redirect('/event', navigate: true);
    }
}
