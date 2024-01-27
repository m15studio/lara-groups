<?php

namespace M15Studio\LaraGroups\Livewire\Gruppo;
use Livewire\Component;
use Livewire\WithPagination;
use M15Studio\LaraGroups\Models\Gruppo;

class GruppiTable extends Component {
    use WithPagination;
    public $perPage               = 10;
    public $search                = '';
    public $sortField             = 'utenti_appartengono_gruppo_count';
    public $sortDirection         = 'desc';
    public $gruppiSelezionati     = [];
    public $selezionaTuttiGruppi  = false;
    public $confermaEliminaGruppo = false;

    protected $listeners = ['reRenderTable'];

    public function reRenderTable() {
        $this->render();
    }

    public function sortBy($field) {
        $this->sortField     = $field;
        $this->sortDirection = $this->sortDirection == 'asc' ? 'desc' : 'asc';
    }

    public function render() {

        $gruppi = Gruppo::search($this->search)->orderBy($this->sortField, $this->sortDirection)->paginate($this->perPage);

        return view('livewire.gruppo.gruppi-table', compact([
            'gruppi',
        ]));
    }

    public function updatedSelezionaTuttiGruppi($value) {
        if ($value) {
            $this->gruppiSelezionati = Gruppo::pluck("id")->map(fn($item) => (string) $item)->toArray();
            if (($key = array_search(1, $this->gruppiSelezionati)) !== false) {
                unset($this->gruppiSelezionati[$key]);
            }
        } else {
            $this->gruppiSelezionati = [];
        }
        //dd($value);
    }

    public function eliminaGruppi() {
        Gruppo::destroy($this->gruppiSelezionati);
        //return redirect(request()->header('Referer'));
        $this->confermaEliminaGruppo = false;
        $this->gruppiSelezionati     = [];
        return $this->emit("reRenderTable");
    }

}