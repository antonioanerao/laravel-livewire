<?php

namespace App\Http\Livewire;

use App\Http\Requests\UserRequest;
use Livewire\Component;

class Profile extends Component
{
    public string $name;
    public string $email;
    public $success = [
        'status' => false,
        'msg' => 'Atualizado com sucesso'
    ];

    /**
     * Retorna as regras de validação do UserRequest
     * @return array
     */
    protected function rules(): array
    {
        return (new UserRequest())->rules();
    }

    public function mount() {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
    }

    public function updateProfile() {
        auth()->user()->update($this->validate());
        $this->success['status'] = true;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
