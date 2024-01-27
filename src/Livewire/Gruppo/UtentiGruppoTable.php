<?php

namespace M15Studio\LaraGroups\Livewire\Gruppo;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UtentiGruppoTable extends Component {
    use WithPagination;
    public $perPage               = 10;
    public $search                = '';
    public $sortField             = 'name';
    public $sortDirection         = 'desc';
    public $utentiSelezionati     = [];
    public $selezionaTuttiUtenti  = false;
    public $confermaEliminaUtenti = false;
    public $gruppo;
    public $gruppo_id;
    public $test;

    public function sortBy($field) {
        $this->sortField     = $field;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

    public function mount($gruppo) {
        $this->gruppo_id = $gruppo->id;
    }

    public function eliminaUtenti() {
        foreach ($this->utentiSelezionati as $user) {
            \App\Models\User::find($user)->utenteAppartieneGruppo()->detach($this->gruppo_id);
            return redirect(request()->header('Referer'));

        }
    }

    public function render() {

        return view('livewire.gruppo.utenti-gruppo-table', ['utenti_gruppo' => User::select("users.id", "name", "utente_appartiene_gruppo.created_at", "utente_IDAzienda_fk")
                ->join("utente_appartiene_gruppo", "users.id", "=", "utente_appartiene_gruppo.user_id")
                ->with(["utenteAzienda" => function ($query) {$query->select("id", "azienda_ragione_sociale");}])
                ->where("utente_appartiene_gruppo.gruppo_id", "=", $this->gruppo_id)
                ->where('name', 'like', '%' . $this->search . '%')
                ->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage),
        ]);

    }

}