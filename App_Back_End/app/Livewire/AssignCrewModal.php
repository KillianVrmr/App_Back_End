<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Project;
use App\Models\Shift;

class AssignCrewModal extends Component
{
    public $workDate;
    public $project_id;
    public $user_ids = []; // for multiple selected users

    protected $listeners = ['openAssignmentModal'];

    public function openAssignmentModal($date)
    {
        $this->workDate = $date;
        $this->project_id = null;
        $this->user_ids = [];
        $this->dispatchBrowserEvent('openModal');
    }

    public function assign()
    {
        if (!$this->project_id || empty($this->user_ids)) {
            $this->addError('project_id', 'Please select a project and at least one user.');
            return;
        }

        foreach ($this->user_ids as $userId) {
            Shift::create([
                'user_id' => $userId,
                'project_id' => $this->project_id,
                'planned_start' => $this->workDate . ' 08:00:00', // example start time
                'planned_end' => $this->workDate . ' 17:00:00',   // example end time
            ]);
        }

        $this->reset(['project_id', 'user_ids', 'workDate']);
        $this->dispatchBrowserEvent('closeModal');
        $this->emit('refreshPlanner'); // trigger calendar refresh
    }

    public function render()
    {
        return view('livewire.assign-crew-modal', [
            'projects' => Project::all(),
            'users' => User::all(),
        ]);
    }
}