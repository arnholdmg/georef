<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Group;

class GroupUpdate extends Component
{
    public $groupId;
    public $name;
    public $color;

    protected $messages = [
        'name.required' => 'Nome não pode ser nulo.',
        'name.min' => 'Nome deve possuir no mínimo quatro caracteres.',
        'name.regex' => 'Nome não pode conter caracteres especiais.',
        'color.required' => 'Cor não pode ser nula.',
        'color.regex' => 'Cor deve ser em formato hexadecimal.'
    ];

    public function mount($group)
    {
        $this->groupId = $group->id;
        $this->name = $group->name;
        $this->color = $group->color;
    }

    public function render()
    {
        return view('livewire.group-update');
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|min:4|regex:/^[a-zA-Z0-9áàãâÁÀÃÂéêÉÊíÍóõÓÕúÚç\s]+$/',
            'color' => 'required|regex:/#[a-zA-Z0-9]{6}/i'
        ]);

        $group = Group::findOrFail($this->groupId);
        $group->name = $this->name;
        $group->color = $this->color;

        if($group->save()){
            return redirect()->route('group');
        }
    }

    public function remove()
    {
        $group = Group::findOrFail($this->groupId);

        foreach($group->patients as $patient){
            $patient->delete();
        }

        $group->delete();

        return redirect()->route('group');
    }
}
