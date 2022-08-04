<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Rules\Coordinate;
use App\Models\Area;
use App\Models\Group;
use App\Models\Patient;

class PatientUpdate extends Component
{
    public $patientId;
    public $name;
    public $birth;
    public $cns;
    public $phone;
    public $responsible;
    public $relationship;
    public $address;
    public $coord;
    public $area_id;
    public $group_id;

    public $areas;
    public $groups;

    protected $messages = [
        'name.required' => 'Nome não pode ser nulo.',
        'name.min' => 'Nome deve possuir no mínimo quatro caracteres.',
        'name.regex' => 'Nome não pode conter caracteres especiais.',
        'birth.required' => 'Data de nascimento não pode ser nula.',
        'birth.date' => 'Data de nascimento deve seguir formato válido.',
        'cns.required' => 'CNS não pode ser nulo.',
        'cns.integer' => 'CNS deve ser formado apenas por números.',
        'cns.size' => 'CNS deve possuir quinze dígitos.',
        'cns.unique' => 'CNS não pode já ter sido cadastrado.',
        'phone.required' => 'Telefone não pode ser nulo.',
        'phone.integer' => 'Telefone deve ser formado apenas por números.',
        'phone.size' => 'Telefone deve possuir no mínimo dez dígitos (com DDD).',
        'responsible.regex' => 'Nome do responsável não pode conter caracteres especiais.',
        'relationship.regex' => 'Relação do responsável não pode conter caracteres especiais.',
        'address.required' => 'Endereço não pode ser nulo.',
        'address.min' => 'Endereço deve possuir no mínimo quatro caracteres.',
        'address.regex' => 'Endereço não pode conter caracteres especiais.',
        'coord.required' => 'Coordenadas não podem ser nulas.',
        'area_id.required' => 'Área não pode ser nula.',
        'area_id.exists' => 'Área deve ser cadastrada.',
        'group_id.required' => 'Grupo não pode ser nulo.',
        'group_id.exists' => 'Grupo deve ser cadastrado.'
    ];

    public function mount($patient)
    {
        $this->areas = Area::all()->sortBy('id');
        $this->groups = Group::all()->sortBy('id');

        $this->patientId = $patient->id;
        $this->name = $patient->name;
        $this->birth = $patient->birth;
        $this->cns = $patient->cns;
        $this->phone = $patient->phone;
        $this->responsible = $patient->responsible;
        $this->relationship = $patient->relationship;
        $this->address = $patient->address;
        $this->coord = $patient->coord;
        $this->area_id = $patient->area_id;
        $this->group_id = $patient->group_id;
    }

    public function render()
    {
        return view('livewire.patient-update');
    }

    public function submit()
    {
        $this->coord = str_replace(' ', '', $this->coord);
        
        $data = $this->validate([
            'name' => 'required|min:4|regex:/^[a-zA-Z0-9áàãâÁÀÃÂéêÉÊíÍóõÓÕúÚç\s]+$/',
            'birth' => 'required|date',
            'cns' => 'required|integer|digits:15|unique:patients,cns,'.$this->patientId,
            'phone' => 'required|integer|min:10',
            'responsible' => 'nullable|regex:/^[ a-zA-Z0-9áàãâÁÀÃÂéêÉÊíÍóõÓÕúÚç\s]+$/',
            'relationship' => 'nullable|regex:/^[a-zA-Z0-9áàãâÁÀÃÂéêÉÊíÍóõÓÕúÚç\s]+$/',
            'address' => 'required|min:4|regex:/^[-,a-zA-Z0-9áàãâÁÀÃÂéêÉÊíÍóõÓÕúÚç\s]+$/',
            'coord' => ['required', 'regex:/^[-+,.0-9\s]+$/', new Coordinate()],
            'area_id' => 'required|exists:areas,id',
            'group_id' => 'required|exists:groups,id',
        ]);

        $patient = Patient::findOrFail($this->patientId);;
        $patient->name = $this->name;
        $patient->birth = $this->birth;
        $patient->cns = $this->cns;
        $patient->phone = $this->phone;
        $patient->responsible = $this->responsible;
        $patient->relationship = $this->relationship;
        $patient->address = $this->address;
        $patient->coord = $this->coord;
        $patient->area_id = $this->area_id;
        $patient->group_id = $this->group_id;

        if($patient->save()){
            return redirect()->route('patient');
        }
    }

    public function remove()
    {
        $patient = Patient::findOrFail($this->patientId);

        $patient->delete();

        return redirect()->route('patient');
    }
}
