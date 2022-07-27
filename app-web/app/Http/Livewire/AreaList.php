<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Area;

class AreaList extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $areas = Area::where('id', 'like', '%'.$this->search.'%')
            ->orWhere('name', 'like', '%'.$this->search.'%')
            ->orWhere('color', 'like', '%'.$this->search.'%')
            ->orWhere('coords', 'like', '%'.$this->search.'%')
            ->orderBy('name', 'asc')
            ->paginate(10);
        
        return view('livewire.area-list', ['areas' => $areas]);
    }
}
