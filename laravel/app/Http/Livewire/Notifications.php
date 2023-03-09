<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Contracts\View\View;

class Notifications extends Component
{
    public int $notificationsCount = 0;
    public bool $deleted = false;



    public function incrementNotificationsCount() {
        $this->notificationsCount++;
    }

    public function render(): View
    {
        return view('livewire.notifications');
    }
}
