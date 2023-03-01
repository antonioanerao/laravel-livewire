<?php

namespace App\Http\Livewire;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Profile extends Component
{
    public User $user;
    public $showHelp = false;
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

    public function render(): View
    {
        return view('livewire.profile');
    }

    /**
     * Método para aplicar validação em tempo real com wire:keydown
     *
     * @return void
     */
    public function checkFields(): void
    {
        $this->validate();
    }
}
