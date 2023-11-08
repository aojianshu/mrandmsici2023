<?php

namespace App\Livewire;

use App\Models\Candidate;
use Livewire\Component;

class Event extends Component
{
    public function render()
    {
        return view('livewire.event', [
            'candidates' => Candidate::all(),
        ]);
    }
}
