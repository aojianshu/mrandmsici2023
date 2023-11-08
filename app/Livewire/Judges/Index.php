<?php

namespace App\Livewire\Judges;

use App\Models\Judge;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.judges.index', [
            'judges' => Judge::all(),
        ]);
    }
}
