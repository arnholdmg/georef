<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Group;

class GroupList extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $groups = Group::where('id', 'like', '%'.$this->search.'%')
            ->orWhere('name', 'like', '%'.$this->search.'%')
            ->orWhere('color', 'like', '%'.$this->search.'%')
            ->orderBy('name', 'asc')
            ->paginate(10);
        
        return view('livewire.group-list', ['groups' => $groups]);
    }
}
