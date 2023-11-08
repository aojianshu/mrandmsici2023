<?php

namespace App\Livewire\Judges;

use App\Models\Judge;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Str;

class Create extends Component
{
    #[Rule('required')]
    public $firstname;

    #[Rule('required')]
    public $lastname;

    public function render()
    {
        return view('livewire.judges.create');
    }

    public function createJudge()
    {
        $validatedData = $this->validate();

        $user = User::create([
            'username' => Str::slug($validatedData['firstname'], ''),
            'password' => Hash::make('ici'),
        ]);

        Judge::create([
            'firstname' => $validatedData['firstname'],
            'lastname' => $validatedData['lastname'],
            'user_id' => $user->id,
        ]);

        session()->flash('message', 'Judge successfully created');
        return $this->redirect('/judges', navigate: true);
    }
}
