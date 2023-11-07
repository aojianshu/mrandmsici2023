<?php

namespace App\Livewire\Teams;

use App\Models\Team;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.teams.index', [
            'teams' => Team::all(),
        ]);
    }
}
