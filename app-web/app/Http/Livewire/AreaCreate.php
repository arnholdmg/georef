<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Rules\Coordinates;
use App\Models\Area;

class AreaCreate extends Component
{
    public $name;
    public $color;
    public $coords;

    protected $messages = [
        'name.required' => 'Nome não pode ser nulo.',
        'name.min' => 'Nome deve possuir no mínimo quatro caracteres.',
        'name.regex' => 'Nome não pode conter caracteres especiais.',
        'color.required' => 'Cor não pode ser nula.',
        'color.regex' => 'Cor deve ser em formato hexadecimal.',
        'coords.required' => 'Coordenadas não podem ser nulas.'
    ];

    public function render()
    {
        return view('livewire.area-create');
    }

    public function submit()
    {
        $this->coords = str_replace(' ', '', $this->coords);
        
        $data = $this->validate([
            'name' => 'required|min:4|regex:/^[a-zA-Z0-9áàãâÁÀÃÂéêÉÊíÍóõÓÕúÚç\s]+$/',
            'color' => 'required|regex:/#[a-zA-Z0-9]{6}/i',
            'coords' => ['required', 'regex:/^[-+,.;0-9\s]+$/', new Coordinates()]
        ]);

        $area = new Area;
        $area->name = $this->name;
        $area->color = $this->color;
        $area->coords = $this->coords;

        if($area->save()){
            return redirect()->route('area');
        }
    }
}
