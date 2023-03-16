<?php

namespace App\Http\Livewire;

use App\Models\Profile;
use Livewire\Component;

class ScenarioWorkflow extends Component
{
    public $count = 1;
    public $profiles;
    public $approvers = [];

    public function mount()
    {
        $this->profiles = Profile::all();
    }

    public function addApprover()
    {
        $this->count++;
        $this->approvers[] = [
            []
        ];
    }

    public function render()
    {
        return view('livewire.scenario-workflow');
    }
}
