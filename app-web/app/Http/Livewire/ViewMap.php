<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Area;
use App\Models\Group;
use App\Models\Patient;

class ViewMap extends Component
{
    public $areas;
    public $groups;
    public $coords;
    public $sa;

    public $search;

    public $clat;
    public $clon;

    public $area_id = [];
    public $group_id = [];

    public function mount()
    {
        $this->areas = Area::all();
        $this->groups = Group::all();

        $this->area_id = $this->areas->map(function ($item, $key){
            return $item->id;
        })->all();

        $this->group_id = $this->groups->map(function ($item, $key){
            return $item->id;
        })->all();

        $this->sa = $this->areas->whereIn('id', $this->area_id)->toArray();

        //$this->submit();
    }
    
    public function render()
    {
        $patients = Patient::whereIn('area_id', $this->area_id)
            ->whereIn('group_id', $this->group_id)
            ->where(function($query){
                $query->orwhere('id', 'ilike', '%'.$this->search.'%')
                    ->orWhere('name', 'ilike', '%'.$this->search.'%')
                    ->orWhere('cns', 'ilike', '%'.$this->search.'%')
                    ->orWhere('phone', 'ilike', '%'.$this->search.'%');
            })         
            ->get()
            ->sortBy('name');

        $patients->each(function ($item, $key) {
            $item['groupName'] = $item->group->name;
            $item['age'] = date_diff(date_create($item->birth), date_create("today"))->format("%y anos e %m meses");
            $item['birthbr'] = date_format(date_create($item->birth), "d/m/Y");
        });

        $buffer = $patients->mapToGroups(function ($item, $key) {
            return [$item['coord'] => $item];
        });

        $this->coords = [];

        foreach($buffer as $key => $coord){
            $size = $coord->count();
            $color = '#000000';

            if($coord->countBy(function ($item) {
                return $item->group_id;
            })->count() == 1){
                $color = $coord[0]->group->color;
            }

            $this->coords[] = ["coord" => explode(',', $key),"size" => $size, "color" => $color, "patients" => $coord];
        }
        
        if($this->coords){
            $this->clat = array_sum(array_map(function($item){
                return $item['coord'][0];
            }, $this->coords))/count($this->coords);

            $this->clon = array_sum(array_map(function($item){
                return $item['coord'][1];
            }, $this->coords))/count($this->coords);
        }

        return view('livewire.view-map');
    }

    public function submit()
    {
        $this->sa = $this->areas->whereIn('id', $this->area_id)->toArray();

        $this->emit('reloadMap');
    }
}
