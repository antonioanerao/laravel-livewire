<?php

namespace App\Http\Livewire;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public User $user;
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
        $this->user = auth()->user();
    }

    public function updateProfile() {
        $this->validate();
        $this->user->save();
        $this->success['status'] = true;
    }

    public function render()
    {
        return view('livewire.profile');
    }
}
