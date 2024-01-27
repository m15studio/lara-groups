<div>
     <div>

          <div>
               <div class="flex items-center flex-wrap" id="tuttiSoci">
                    <h3 class="lg:flex-1 text-2xl leading-6 font-semibold text-bwt-blu w-full lg:w-auto mb-4 lg:mb-0">
                         Tutti gli utenti del gruppo
                    </h3>
                    <div class="w-full lg:w-auto">
                         <div class="flex items-center items-center space-x-2 space-y-2 lg:space-y-0 mb-4">
                              <p class="text-sm text-gray-500 py-2">{{ count($utentiSelezionati) }} @if (count($utentiSelezionati) == 1) utente selezionato @else utenti selezionati @endif</p>

                              <div class="">
                                   <button wire:click="$toggle('confermaEliminaUtenti')" type="button" class="inline-flex items-center px-4 py-2  text-sm font-medium rounded-md shadow-sm text-white bg-red-600 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-700 disabled:opacity-50" @empty($utentiSelezionati) disabled @endempty>
                                        Elimina
                                   </button>
                                   <x-jet-modal wire:model="confermaEliminaUtenti">
                                        <x-slot name="content">
                                             <div class="sm:flex sm:items-start">
                                                  <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                                       <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                                       </svg>
                                                  </div>

                                                  <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                                       <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                            Eliminazione utenti
                                                       </h3>

                                                       <div class="mt-2">
                                                            <p class="text-sm text-gray-500">
                                                                 Sei sicuro di voler procedere con l'eliminazione definitiva degli utenti selezionati dal gruppo?<br />
                                                                 L'operazione è irreversibile e tutti i dati andranno persi.
                                                            </p>
                                                       </div>
                                                  </div>
                                             </div>
                                             <div class="mt-5 sm:mt-12 sm:flex sm:flex-row-reverse">
                                                  <x-jet-danger-button class="ml-2" wire:click.prevent="eliminaUtenti" wire:loading.attr="disabled">
                                                       Elimina
                                                  </x-jet-danger-button>
                                                  <x-jet-secondary-button wire:click="$toggle('confermaEliminaUtenti')" wire:loading.attr="disabled">
                                                       Cancella
                                                  </x-jet-secondary-button>
                                             </div>
                                        </x-slot>
                                   </x-jet-modal>
                              </div>
                         </div>
                    </div>
               </div>



               <div class="w-full whitespace-no-wrap mt-4">

                    {{-- sort by:{{ $sortField }}<br />
                    order by: {{ $sortDirection }}<br /><br /> --}}



                    <div class="flex flex-col mb-4">
                         <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                              <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                   <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">



                                        <div class="px-4 py-3 flex items-center items-center space-x-2 space-y-2 lg:space-y-0 bg-gray-50">

                                             {{-- cerca --}}
                                             <input wire:model="search" type="text" placeholder="Filtra risultati..." class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />


                                             <div class="w-72">
                                                  {{-- <label for="perPage" class="block text-sm font-medium text-gray-700">Per pagina</label> --}}
                                                  <select wire:model="perPage" id="perPage" name="perPage" class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                                       <option value="10">10 per pagina</option>
                                                       <option value="25">25 per pagina</option>
                                                       <option value="50">50 per pagina</option>
                                                       <option value="100">100 per pagina</option>
                                                  </select>
                                             </div>
                                        </div>




                                        <table class="min-w-full divide-y divide-gray-200">
                                             <thead class="bg-gray-50">
                                                  <tr>
                                                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            <input type="checkbox" wire:model="selezionaTuttiGruppi" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                                       </th>
                                                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex items-center">
                                                                 Nome utente <a href="#" class="ml-auto" wire:click.prevent="sortBy('utente_cognome')">
                                                                      <div class="pointer-events-none  inset-y-0 right-0  px-2 text-gray-700 {!! $sortDirection == 'asc' ? 'rotate-180' : '' !!}">
                                                                           <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                                           </svg>
                                                                      </div>
                                                                 </a>
                                                            </div>
                                                       </th>
                                                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex items-center">
                                                                 Azienda <a href="#" class="ml-auto" wire:click.prevent="sortBy('created_at')">
                                                                      <div class="pointer-events-none  inset-y-0 right-0  px-2 text-gray-700 {!! $sortDirection == 'asc' ? 'rotate-180' : '' !!}">
                                                                           <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                                           </svg>
                                                                      </div>
                                                                 </a>
                                                            </div>
                                                       </th>
                                                       <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            <div class="flex items-center">
                                                                 Iscritto il <a href="#" class="ml-auto" wire:click.prevent="sortBy('created_at')">
                                                                      <div class="pointer-events-none  inset-y-0 right-0  px-2 text-gray-700 {!! $sortDirection == 'asc' ? 'rotate-180' : '' !!}">
                                                                           <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                                           </svg>
                                                                      </div>
                                                                 </a>
                                                            </div>
                                                       </th>

                                                       <th scope="col" class="relative px-6 py-3">
                                                            <span class="sr-only">azioni</span>
                                                       </th>
                                                  </tr>
                                             </thead>
                                             <tbody class="">

                                                  @foreach ($utenti_gruppo as $utente)

                                                  <tr class="@if ($loop->iteration % 2 == 0) bg-gray-50 @else bg-white @endif hover:bg-gray-100 transition-colors transition duration-150 ease-in-out">
                                                       <td class="px-6 py-4 whitespace-nowrap">
                                                            <input type="checkbox" wire:model="utentiSelezionati" value="{{ $utente->id }}" id="check_{{ $utente->id }}" name="check_{{ $utente->id }}" class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                                       </td>
                                                       <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                 <div class="text-sm font-medium text-gray-900">
                                                                      {{ $utente->name }}
                                                                 </div>

                                                            </div>
                                                       </td>
                                                       <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                 <div class="text-sm font-medium text-gray-900">
                                                                      {{ $utente->utenteAzienda->azienda_ragione_sociale }}
                                                                 </div>
                                                            </div>
                                                       </td>
                                                       <td class="px-6 py-4 whitespace-nowrap">
                                                            <div class="flex items-center">
                                                                 <div class="text-sm font-medium text-gray-500">
                                                                      {{ $utente->created_at->format("d/m/Y H:i") }}
                                                                 </div>
                                                            </div>
                                                       </td>

                                                       <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                            <a href="{{ url('/utente') }}/{{ $utente->id }}/" class="text-bwt-blu hover:text-bwt-blu-hover">Vedi</a>
                                                       </td>
                                                  </tr>
                                                  @endforeach

                                             </tbody>
                                        </table>

                                        {{ $utenti_gruppo->links('vendor.pagination.tailwind') }}
                                   </div>
                              </div>
                         </div>
                    </div>



               </div>
          </div>


     </div>

</div>
