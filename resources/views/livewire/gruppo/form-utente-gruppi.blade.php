<div>
     <button wire:click.prevent="$toggle('utenteGruppi')" class="ml-auto text-indigo-600 hover:text-indigo-900">
          Gestisci
     </button>
     <x-jet-modal wire:model="utenteGruppi" maxWidth="lg">
          <x-slot name="content">
               <form wire:submit.prevent="submit" id="form_utente_gruppi">
                    <div class="">
                         <div class="pb-5 sm:flex sm:items-start sm:justify-between">
                              <div>
                                   <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Gruppi
                                   </h3>
                                   <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                        Assegna i gruppi a cui è iscritto l'utente
                                   </p>
                              </div>

                         </div>

                         <div class="grid grid-cols-1 gap-y-6 gap-x-4 border-t border-gray-200">
                              <fieldset>
                                   <div class=" border-b border-gray-200 divide-y divide-gray-200">


                                        @foreach ($tuttiGruppi as $gruppo)
                                        <div class="relative flex items-start py-4">
                                             <div class="min-w-0 flex-1 text-sm">
                                                  <label for="check_{{ $gruppo->id_gruppo }}" class="font-medium text-gray-700 select-none">{!! $gruppo->gruppo_nome !!}</label>
                                                  @if (in_array($gruppo->id_gruppo, $gruppiSelezionatiIniziali))
                                                  @php($key = array_search($gruppo->id_gruppo, array_column($tuttiGruppiSocio, 'id')))
                                                  @if ($tuttiGruppiSocio[$key]['id'] == $gruppo->id_gruppo)
                                                  <span class="text-gray-500 text-sm block">Iscritto al gruppo il
                                                       {!! date('d/m/Y H:i', strtotime($tuttiGruppiSocio[$key]['pivot']['created_at'])) !!}
                                                  </span>
                                                  @endif
                                                  @endif
                                             </div>
                                             <div class="ml-3 flex items-center h-5">
                                                  <input type="checkbox" wire:model="gruppiSelezionati" id="check_{{ $gruppo->id_gruppo }}" value="{{ $gruppo->id_gruppo }}" name="check_{{ $gruppo->id_gruppo }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                             </div>
                                        </div>
                                        @endforeach

                                   </div>
                              </fieldset>
                         </div>
                    </div>
                    <div class="mt-5 sm:mt-12 sm:flex sm:flex-row-reverse">
                         <x-jet-button class="ml-2">
                              Aggiorna
                         </x-jet-button>
                         <x-jet-secondary-button wire:click="$toggle('utenteGruppi')" wire:loading.attr="disabled">
                              Cancella
                         </x-jet-secondary-button>
                    </div>
               </form>
          </x-slot>
     </x-jet-modal>
</div>
