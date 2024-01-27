<?php

namespace M15Studio\LaraGroups\Livewire\Gruppo;
use App\Traits\Livewire\WithLockedPublicPropertiesTrait;
use Livewire\Component;

class FormIscriviUtenteGruppo extends Component {

    use WithLockedPublicPropertiesTrait;

    /** @locked */
    public $id_gruppo;

    public $id_utente;

    public $apriUtenti = false;

    public function mount($id_gruppo) {
        $this->id_gruppo = $id_gruppo;
    }

    public function rules() {
        return [
            'id_utente' => 'required',
        ];
    }

    protected $messages = [
        'required' => 'Il valore è obbligatorio',
    ];

    public function submit() {
        $this->validate();

        \App\Models\User::find($this->id_utente)->utenteAppartieneGruppo()->attach($this->id_gruppo);

        return redirect(request()->header('Referer'));
    }

    public function render() {
        return view('livewire.gruppo.form-iscrivi-utente-gruppo');
    }
}