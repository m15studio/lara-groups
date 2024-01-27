<div>
     <button class="text-gray-700 block px-4 py-2 text-sm active:bg-gray-100 active:text-gray-900 flex items-center disabled:opacity-50" wire:click="$toggle('sociGruppo')" @empty($sociSelezionati) disabled @endempty role="menuitem" tabindex="-1" id="sort-menu-item-2">
          <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
          Assegna gruppi</button>

     <x-jet-modal wire:model="sociGruppo" maxWidth="lg">
          <x-slot name="content">
               <form wire:submit.prevent="submit" id="form_assegna_soci_gruppo">
                    <div class="">
                         <div class="pb-5 sm:flex sm:items-start sm:justify-between">
                              <div>
                                   <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Gruppi
                                   </h3>
                                   <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                        Assegna i gruppi ai soci selezionati
                                   </p>
                              </div>

                         </div>

                         <div class="grid grid-cols-1 gap-y-6 gap-x-4 border-t border-gray-200">
                              <fieldset>
                                   <div class=" border-b border-gray-200 divide-y divide-gray-200">


                                        @foreach ($tuttiGruppi as $gruppo)
                                        <div class="relative flex items-start py-4">
                                             <div class="min-w-0 flex-1 text-sm">
                                                  <label for="check_{{ $gruppo->id }}" class="font-medium text-gray-700 select-none">{!! $gruppo->gruppo_nome !!}</label>
                                             </div>
                                             <div class="ml-3 flex items-center h-5">
                                                  <input type="checkbox" wire:model="gruppiSelezionati" id="check_{{ $gruppo->id }}" value="{{ $gruppo->id }}" name="check_{{ $gruppo->id }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
                                             </div>
                                        </div>
                                        @endforeach

                                   </div>
                              </fieldset>
                         </div>
                    </div>
                    <div class="mt-5 sm:mt-12 sm:flex sm:flex-row-reverse">
                         <x-jet-button class="ml-2" @click="isOpenAzioni = !isOpenAzioni">
                              Aggiorna
                         </x-jet-button>
                         <x-jet-secondary-button wire:click="$toggle('sociGruppo')" wire:loading.attr="disabled" @click="isOpenAzioni = !isOpenAzioni">
                              Cancella
                         </x-jet-secondary-button>
                    </div>
               </form>
          </x-slot>
     </x-jet-modal>
</div>
