<?php

namespace M15Studio\LaraGroups\Livewire\Gruppo;

use Illuminate\Support\Str;
use Livewire\Component;
use M15Studio\LaraGroups\Models\Gruppo;

class FormNuovoGruppo extends Component {
    public $nuovoGruppo = false;
    public $gruppo_nome;

    protected $rules = [
        'gruppo_nome' => 'required',
    ];

    protected $messages = [
        'required' => 'Valore richiesto',
    ];

    public function creaGruppo() {
        $this->validate();
        Gruppo::create([
            "gruppo_nome" => $this->gruppo_nome,
            "gruppo_slug" => Str::of($this->gruppo_nome)->slug('-'),
        ]);
        $this->emit('reRenderTable');
        $this->gruppo_nome        = '';
        return $this->nuovoGruppo = false;

    }

    public function render() {
        return view('livewire.gruppo.form-nuovo-gruppo');
    }
}