<?php

namespace App\Livewire\Production;

use App\Models\Production;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Score extends Component
{
    public $loading = false;

    public $candidate;

    #[Rule('required|numeric|between:75,100')]
    public $score;

    public function render()
    {
        return view('livewire.production.score');
    }

    public function submitScore()
    {
        $input = $this->validate();

        Production::updateOrCreate(
            ['judge_id' => Auth::user()->judge->id, 'candidate_id' => $this->candidate->id],
            ['score' => $input['score']],
        );


        session()->flash('message', 'Score candidate ' . $this->candidate->number . ' - ' . $this->candidate->fullName() . ' in Production Number category successfully.');
        $this->loading = true;
        // return $this->redirect('/event', navigate: true);
        return redirect()->to('event');
    }
}
