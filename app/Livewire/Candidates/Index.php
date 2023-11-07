<?php

namespace App\Livewire\Candidates;

use App\Models\Candidate;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.candidates.index', [
            'candidates' => Candidate::all()
        ]);
    }
}
