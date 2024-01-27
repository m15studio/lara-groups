<?php

namespace M15Studio\LaraGroups\Livewire\Gruppo;

use App\Models\User;
use Livewire\Component;
use M15Studio\LaraGroups\Models\Gruppo;

class FormAssegnaUtentiGruppo extends Component {
    public $sociGruppo      = false;
    public $sociSelezionati = [];
    public $socio;
    public $tuttiGruppi;
    public $gruppiSelezionati = [];

    protected $listeners = [
        'sociSelezionati' => 'sociSelezionati',
    ];

    public function sociSelezionati($value) {
        //dd($value);
        $this->sociSelezionati = $value;
    }

    public function mount() {
        $this->tuttiGruppi = Gruppo::all();
    }

    public function render() {
        return view('livewire.gruppo.form-assegna-utenti-gruppo');
    }

    public function submit() {
        $users = User::findMany($this->sociSelezionati);
        $users->each(function ($user) {
            $user->utenteGruppi()->sync($this->gruppiSelezionati);
        });
        $this->sociSelezionati   = [];
        $this->gruppiSelezionati = [];
        $this->emit("sociSelezionatiExt", $this->sociSelezionati);
        return $this->sociGruppo = false;

    }
}