<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class UserCreate extends Component
{
    public $name;
    public $email;
    public $isAdmArea;
    public $isAdmGroup;
    public $isAdmPatient;
    public $isAdmUser;

    protected $messages = [
        'name.required' => 'Nome não pode ser nulo.',
        'name.min' => 'Nome deve possuir no mínimo quatro caracteres.',
        'name.regex' => 'Nome não pode conter caracteres especiais.',
        'email.required' => 'e-Mail não pode ser nulo.',
        'email.email' => 'e-Mail deve ser um endereço válido.',
        'email.unique' => 'e-Mail não pode ter sido já cadastrado.',
    ];

    public function mount()
    {
        $this->isAdmArea = false;
        $this->isAdmGroup = false;
        $this->isAdmPatient = false;
        $this->isAdmUser = false;
    }

    public function render()
    {
        return view('livewire.user-create');
    }

    public function submit()
    {
        $data = $this->validate([
            'name' => 'required|min:4|regex:/^[a-zA-Z0-9áàãâÁÀÃÂéêÉÊíÍóõÓÕúÚç\s]+$/',
            'email' => 'required|email|unique:users,email',
        ]);

        $user = new User;
        $user->name = $this->name;
        $user->email = $this->email;
        $user->email_verified_at = now();
        $user->password = "NOT VALID";
        $user->isAdmArea = $this->isAdmArea;
        $user->isAdmGroup = $this->isAdmGroup;
        $user->isAdmPatient = $this->isAdmPatient;
        $user->isAdmUser = $this->isAdmUser;

        if($user->save()){
            return redirect()->route('user');
        }
    }

    public function toggleAdmArea()
    {
        $this->isAdmArea = !$this->isAdmArea;
    }

    public function toggleAdmGroup()
    {
        $this->isAdmGroup = !$this->isAdmGroup;
    }

    public function toggleAdmPatient()
    {
        $this->isAdmPatient = !$this->isAdmPatient;
    }

    public function toggleAdmUser()
    {
        $this->isAdmUser = !$this->isAdmUser;
    }
}
