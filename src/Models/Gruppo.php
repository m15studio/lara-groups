<?php

namespace M15Studio\LaraGroups\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gruppo extends Model {
    use HasFactory;
    protected $table      = "gruppo";
    protected $primaryKey = "id_gruppo";

    protected $fillable = [
        'gruppo_nome',
        'gruppo_slug',
    ];

    /**
     *   ritorna tutti gli utenti a cui piace la categoria relazione m:n
     */

    public function utentiAppartengonoGruppo() {
        return $this->belongsToMany(User::class, 'utente_appartiene_gruppo', 'gruppo_id', 'user_id', 'id_gruppo', 'id')->withTimestamps();
    }

    public static function search($search) {
        // query x eloquent
        $query = Gruppo::select("gruppo.id_gruppo", "gruppo_nome")->withCount("UtentiAppartengonoGruppo");

        // query x sql
        //$query = \DB::select('select "gruppo"."id", "gruppo_nome", (select count(*) from "users" inner join "utente_appartiene_gruppo" on "users"."id" = "utente_appartiene_gruppo"."user_id" where "gruppo"."id" = "utente_appartiene_gruppo"."gruppo_id") as "utenti_appartengono_gruppo_count", (select sum("ordine_importo_totale") from "ordine" inner join "utente_appartiene_gruppo" on "ordine"."ordine_IDUtente_fk" = "utente_appartiene_gruppo"."user_id" where "ordine"."ordine_IDUtente_fk" = "utente_appartiene_gruppo"."user_id" AND "gruppo"."id" = "utente_appartiene_gruppo"."gruppo_id") as "fatturato" from "gruppo"');

        /*return empty($search) ? $query
        : $query->where('gruppo_nome', 'like', '%' . $search . '%');*/
        return $query;

    }

    public static function isInGruppo($gruppo_slug, $IDUtente) {
        $IDGruppo = Gruppo::select("id")->where("gruppo_slug", $gruppo_slug)->first();
        if ($IDGruppo) {
            $in_gruppo = Gruppo::find($IDGruppo->id)->utentiAppartengonoGruppo()->select("id_gruppo")->get()->toArray();
            if (in_array($IDUtente, array_column($in_gruppo, 'id'))) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public static function getGruppoUtenti($gruppo_slug) {
        return Gruppo::with(["utentiAppartengonoGruppo" => function ($query) {$query->select("utente_nome", "utente_cognome");}])->where("gruppo_slug", $gruppo_slug)->get();
    }

    public static function getGruppoBySlug($gruppo_slug) {
        return Gruppo::where("gruppo_slug", $gruppo_slug)->first();
    }
}