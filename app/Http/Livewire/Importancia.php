<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Importancia extends Component
{
    public $importanceLevel = 0;

    public function setImportanceLevel($level)
    {
        $this->importanceLevel = $level;
        $this->emit('importanceUpdated', $level);
    }
}
