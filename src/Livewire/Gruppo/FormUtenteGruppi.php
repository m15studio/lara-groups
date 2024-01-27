<?php

namespace M15Studio\LaraGroups\Livewire\Gruppo;

use Livewire\Component;
use M15Studio\LaraGroups\Models\Gruppo;

class FormUtenteGruppi extends Component {
    public $utenteGruppi = false;
    public $utente_id;
    public $socio;
    public $tuttiGruppi;
    public $gruppiSelezionati;
    public $gruppiSelezionatiIniziali;
    public $tuttiGruppiSocio = [];

    public function mount($user) {
        $this->utente_id                 = $user->id;
        $this->socio                     = $user;
        $this->gruppiSelezionati         = $this->socio->utenteGruppi->pluck('id')->map(fn($item) => (string) $item)->toArray();
        $this->gruppiSelezionatiIniziali = $this->gruppiSelezionati;
        $this->tuttiGruppi               = Gruppo::all();
        $this->tuttiGruppiSocio          = $this->socio->utenteGruppi()->withPivot("created_at")->get();
        $this->tuttiGruppiSocio          = $this->tuttiGruppiSocio->toArray();
    }
    public function render() {
        return view('livewire.gruppo.form-utente-gruppi');
    }

    public function submit() {
        $user = $this->socio;
        $user->utenteGruppi()->sync($this->gruppiSelezionati);
        //return $this->utenteGruppi = false;
        $url = request()->header('Referer');
        if (!str_contains($url, "?tab")) {
            $url = $url . '?tab=2';
        }

        return redirect($url);
    }

}