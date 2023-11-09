<?php

namespace App\Livewire;

use App\Models\Candidate;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Total extends Component
{
    public $sortField = 'number';
    public $sortDirection = 'asc';

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortField === $field ? $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc' : 'asc';
        $this->sortField = $field;
    }

    public function render()
    {
        $photogenics = DB::table('photogenics')->selectRaw('candidate_id, score');
        $populars = DB::table('populars')->selectRaw('candidate_id, score');
        $uniforms = DB::table('uniforms')->selectRaw('candidate_id, avg(score) as score')->groupBy('candidate_id');
        $productions = DB::table('productions')->selectRaw('candidate_id, avg(score) as score')->groupBy('candidate_id');
        $sports = DB::table('sports')->selectRaw('candidate_id, avg(score) as score')->groupBy('candidate_id');
        $formals = DB::table('formals')->selectRaw('candidate_id, avg(score) as score')->groupBy('candidate_id');
        $questions = DB::table('questions')->selectRaw('candidate_id, avg(score) as score')->groupBy('candidate_id');

        return view('livewire.total', [
            'candidates' => Candidate::selectRaw('candidates.id, candidates.number, candidates.firstname, candidates.lastname, candidates.gender, (photogenics.score) + (populars.score) + (uniforms.score * .15) + (productions.score * .10) + (sports.score * .15) + (formals.score * .20) + (questions.score * .30) as score')->leftJoinSub($photogenics, 'photogenics', function ($join) {
                $join->on('candidates.id', '=', 'photogenics.candidate_id');
            })->leftJoinSub($populars, 'populars', function ($join) {
                $join->on('candidates.id', '=', 'populars.candidate_id');
            })->leftJoinSub($uniforms, 'uniforms', function ($join) {
                $join->on('candidates.id', '=', 'uniforms.candidate_id');
            })->leftJoinSub($productions, 'productions', function ($join) {
                $join->on('candidates.id', '=', 'productions.candidate_id');
            })->leftJoinSub($sports, 'sports', function ($join) {
                $join->on('candidates.id', '=', 'sports.candidate_id');
            })->leftJoinSub($formals, 'formals', function ($join) {
                $join->on('candidates.id', '=', 'formals.candidate_id');
            })->leftJoinSub($questions, 'questions', function ($join) {
                $join->on('candidates.id', '=', 'questions.candidate_id');
            })->orderBy($this->sortField, $this->sortDirection)->get(),
        ]);
    }
}
