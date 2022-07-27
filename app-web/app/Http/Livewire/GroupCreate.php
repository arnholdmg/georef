<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Group;

class GroupCreate extends Component
{
    public $name;
    public $color;

    protected $messages = [
        'name.required' => 'Nome não pode ser nulo.',
        'name.min' => 'Nome deve possuir no mínimo quatro caracteres.',
        'name.regex' => 'Nome não pode conter caracteres especiais.',
        'color.required' => 'Cor não pode ser nula.',
        'color.regex' => 'Cor deve ser em formato hexadecimal.'
    ];

    public function render()
    {
        return view('livewire.group-create');
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|min:4|regex:/^[a-zA-Z0-9áàãâÁÀÃÂéêÉÊíÍóõÓÕúÚç\s]+$/',
            'color' => 'required|regex:/#[a-zA-Z0-9]{6}/i'
        ]);

        $group = new Group;
        $group->name = $this->name;
        $group->color = $this->color;

        if($group->save()){
            return redirect()->route('group');
        }
    }
}