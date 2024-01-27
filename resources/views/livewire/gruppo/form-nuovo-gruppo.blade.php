<div>
     <button wire:click.prevent="$toggle('nuovoGruppo')" class="button  text-white bg-bwt-pink hover:bg-bwt-pink-hover focus:ring-purple-500">
          Aggiungi gruppo
     </button>
     <x-dialog-modal wire:model="nuovoGruppo" maxWidth="md">
          <x-slot name="content" id="creaGruppoContent">
               <form wire:submit.prevent="creaGruppo" id="form_nuovo_gruppo" name="form_nuovo_gruppo">
                    <div class="">
                         <div class="pb-5 sm:flex sm:items-start sm:justify-between">
                              <div>
                                   <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Crea nuovo gruppo
                                   </h3>
                                   <p class="mt-1 max-w-2xl text-sm text-gray-500">

                                   </p>
                              </div>
                         </div>

                         <div class="grid grid-cols-1 gap-y-6 gap-x-4">
                              <fieldset>
                                   <div class=" border-b border-gray-200 divide-y divide-gray-200">
                                        <div class="sm:col-span-3">
                                             <label for="gruppo_nome" class="block text-sm font-medium text-gray-700">
                                                  Nome del gruppo
                                             </label>
                                             <div class="mt-1">
                                                  <input type="text" name="gruppo_nome" id="gruppo_nome" wire:model="gruppo_nome" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md">
                                             </div>
                                             @error('gruppo_nome') <span class="error">{{ $message }}</span>
                                             @enderror
                                        </div>
                                   </div>
                              </fieldset>
                         </div>
                    </div>
                    <div class="mt-5 sm:mt-12 sm:flex sm:flex-row-reverse">
                         <button class="ml-2 button button  text-white bg-bwt-pink hover:bg-bwt-pink-hover focus:ring-purple-500" form="form_nuovo_gruppo">
                              Aggiorna
                         </button>
                         <button wire:click="$toggle('nuovoGruppo')" wire:loading.attr="disabled" class="button border-gray-200  text-gray-700 bg-white hover:bg-gray-50 focus:ring-purple-500">
                              Cancella
                         </button>
                    </div>
               </form>
          </x-slot>
     </x-dialog-modal>
</div>
