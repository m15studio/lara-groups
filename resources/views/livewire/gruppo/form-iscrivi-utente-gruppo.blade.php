<div>
     <button class="text-gray-700 block px-4 py-2 text-sm active:bg-gray-100 active:text-gray-900 flex items-center disabled:opacity-50" wire:click="$toggle('apriUtenti')" tabindex="-1" id="sort-menu-item-2">
          <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
          </svg>
          Iscrivi utente</button>

     <x-jet-modal wire:model="apriUtenti" maxWidth="lg">
          <x-slot name="content">
               <form wire:submit.prevent="submit" id="form_assegna_utenti_gruppo">
                    <div class="">
                         <div class="pb-5 sm:flex sm:items-start sm:justify-between">
                              <div>
                                   <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Utenti
                                   </h3>
                                   <p class="mt-1 max-w-2xl text-sm text-gray-500">
                                        Seleziona l'utente da iscrivere
                                   </p>
                              </div>

                         </div>

                         <div class="grid grid-cols-1 gap-y-6 gap-x-4 ">
                              <fieldset class="mt-1">
                                   <select name="id_utente" wire:model="id_utente" id="id_utente" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md bg-white">
                                        <option>-</option>
                                        @foreach (\App\Models\User::all() as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->email }})</option>
                                        @endforeach
                                   </select>
                                   @error('id_utente') <span class="error">{{ $message }}</span> @enderror

                              </fieldset>
                         </div>
                    </div>

                    <div class="mt-5 sm:mt-12 sm:flex sm:flex-row-reverse">
                         <x-jet-button class="ml-2" @click="isOpenAzioni = !isOpenAzioni">
                              Aggiorna
                         </x-jet-button>
                         <x-jet-secondary-button wire:click="$toggle('apriUtenti')" wire:loading.attr="disabled" @click="isOpenAzioni = !isOpenAzioni">
                              Cancella
                         </x-jet-secondary-button>
                    </div>
               </form>
          </x-slot>
     </x-jet-modal>
</div>
