<?php

namespace App\Livewire\Formal;

use App\Models\Candidate;
use App\Models\Judge;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $sortDirection = 'asc';
    public $sortField = 'number';

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortField === $field ? $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc' : 'asc';
        $this->sortField = $field;
    }

    public function render()
    {
        $scores = DB::table('formals')->selectRaw('candidate_id, avg(score) as score')->groupBy('candidate_id');

        return view('livewire.formal.index', [
            'judges' => Judge::all(),
            'candidates' => Candidate::select('candidates.id', 'candidates.number', 'candidates.firstname', 'candidates.lastname', 'candidates.gender', 'scores.score')->leftJoinSub($scores, 'scores', function ($join) {
                $join->on('candidates.id', '=', 'scores.candidate_id');
            })->orderBy($this->sortField, $this->sortDirection)->get(),
        ]);
    }
}
