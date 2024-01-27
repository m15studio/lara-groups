<div>

<div>
    <div class="flex items-center flex-wrap" id="tuttiSoci">
            <h3 class="lg:flex-1 text-2xl leading-6 font-semibold text-bwt-blu w-full lg:w-auto mb-4 lg:mb-0">
            Tutti i gruppi
        </h3>
        <div class="w-full lg:w-auto">
            <div class="flex items-center items-center space-x-2 space-y-2 lg:space-y-0 mb-4">
                <p class="text-sm text-gray-500 py-2">{{ count($gruppiSelezionati) }} @if (count($gruppiSelezionati) == 1) gruppo selezionato @else gruppi selezionati @endif</p>

                <div class="">
                    <button wire:click="$toggle('confermaEliminaGruppo')" type="button"
                        class="button text-white bg-red-600 hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-700 disabled:opacity-50"
                        @empty($gruppiSelezionati) disabled @endempty>
                        Elimina
                    </button>
                    <x-jet-modal wire:model="confermaEliminaGruppo">
                        <x-slot name="content">
                            <div class="sm:flex sm:items-start">
                                <div
                                    class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                    <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                    </svg>
                                </div>

                                <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                        Eliminazione gruppo
                                    </h3>

                                    <div class="mt-2">
                                        <p class="text-sm text-gray-500">
                                            Sei sicuro di voler procedere con l'eliminazione definitiva dei gruppi selezionati?<br />
                                            L'operazione è irreversibile e tutti i dati andranno persi.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-5 sm:mt-12 sm:flex sm:flex-row-reverse">
                                <x-jet-danger-button class="ml-2" wire:click.prevent="eliminaGruppi"
                                    wire:loading.attr="disabled">
                                    Elimina
                                </x-jet-danger-button>
                                <x-jet-secondary-button wire:click="$toggle('confermaEliminaGruppo')"
                                    wire:loading.attr="disabled">
                                    Cancella
                                </x-jet-secondary-button>
                            </div>
                        </x-slot>
                    </x-jet-modal>
                </div>
            </div>
        </div>
    </div>



    <div class="w-full whitespace-no-wrap">

        {{-- sort by:{{ $sortField }}<br />
        order by: {{ $sortDirection }}<br /><br /> --}}



        <div class="flex flex-col mb-4">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">



                        <div
                            class="px-4 py-3 flex items-center items-center space-x-2 space-y-2 lg:space-y-0 bg-gray-50">

                            {{-- cerca --}}
                            <input wire:model="search" type="text" placeholder="Filtra risultati..."
                                class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md" />

                            {{-- filtra --}}
                            <div class="relative w-72" x-data="{ isOpenordina: false}">
                                <button type="button" @click="isOpenordina = !isOpenordina"
                                    @keydown.escape="isOpenordina = false"
                                    class="w-full bg-white border border-gray-300 rounded-md shadow-sm px-4 py-2 inline-flex justify-center text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                                    id="sort-menu-button" aria-expanded="false" aria-haspopup="true">
                                    <!-- Heroicon name: solid/sort-ascending -->
                                    <svg class="mr-3 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path
                                            d="M3 3a1 1 0 000 2h11a1 1 0 100-2H3zM3 7a1 1 0 000 2h5a1 1 0 000-2H3zM3 11a1 1 0 100 2h4a1 1 0 100-2H3zM13 16a1 1 0 102 0v-5.586l1.293 1.293a1 1 0 001.414-1.414l-3-3a1 1 0 00-1.414 0l-3 3a1 1 0 101.414 1.414L13 10.414V16z" />
                                    </svg>
                                    Ordina per
                                    <!-- Heroicon name: solid/chevron-down -->
                                    <svg class="ml-2.5 -mr-1.5 h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </button>
                                <!-- Dropdown menu, show/hide based on menu state. -->
                                <div class="origin-top-right z-10 absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none"
                                    role="menu" aria-orientation="vertical" aria-labelledby="sort-menu-button"
                                    tabindex="-1" x-show="isOpenordina" @click.away="isOpenordina = false"
                                    x-transition:enter="transition ease-out duration-100"
                                    x-transition:enter-start="transform opacity-0 scale-95"
                                    x-transition:enter-end="transform opacity-100 scale-100"
                                    x-transition:leave="transition ease-in duration-75"
                                    x-transition:leave-start="transform opacity-100 scale-100"
                                    x-transition:leave-end="transform opacity-0 scale-95">
                                    <div class="py-1" role="none">
                                        <!-- Active: "bg-gray-100 text-gray-900", Not Active: "text-gray-700" -->
                                        <a href="#"
                                            class="text-gray-700 block px-4 py-2 text-sm active:bg-gray-100 active:text-gray-900"
                                            role="menuitem" tabindex="-1" id="sort-menu-item-0">Name</a>
                                        <a href="#"
                                            class="text-gray-700 block px-4 py-2 text-sm active:bg-gray-100 active:text-gray-900"
                                            role="menuitem" tabindex="-1" id="sort-menu-item-1">Date modified</a>
                                        <a href="#"
                                            class="text-gray-700 block px-4 py-2 text-sm active:bg-gray-100 active:text-gray-900"
                                            role="menuitem" tabindex="-1" id="sort-menu-item-2">Date created</a>
                                    </div>
                                </div>
                            </div>
                            <div class="w-72">
                                {{-- <label for="perPage" class="block text-sm font-medium text-gray-700">Per pagina</label> --}}
                                <select wire:model="perPage" id="perPage" name="perPage"
                                    class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
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
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <input type="checkbox" wire:model="selezionaTuttiGruppi"
                                            class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            Nome gruppo <a href="#" class="ml-auto"
                                                wire:click.prevent="sortBy('gruppo_nome')">
                                                <div
                                                    class="pointer-events-none  inset-y-0 right-0  px-2 text-gray-700 {!! $sortDirection == 'asc' ? 'rotate-180' : '' !!}">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                                    </svg>
                                                </div>
                                            </a>
                                        </div>
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div class="flex items-center">
                                            Utenti contenuti <a href="#" class="ml-auto"
                                                wire:click.prevent="sortBy('utenti_appartengono_gruppo_count')">
                                                <div
                                                    class="pointer-events-none  inset-y-0 right-0  px-2 text-gray-700 {!! $sortDirection == 'asc' ? 'rotate-180' : '' !!}">
                                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
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

                                @foreach ($gruppi as $gruppo)

                                    <tr
                                        class="@if ($loop->iteration % 2 == 0) bg-gray-50 @else bg-white @endif hover:bg-gray-100 transition-colors transition duration-150 ease-in-out">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                           @if($gruppo->id != 1)
                                            <input type="checkbox" wire:model="gruppiSelezionati"
                                                value="{{ $gruppo->id }}" id="check_{{ $gruppo->id }}"
                                                name="check_{{ $gruppo->id }}"
                                                class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded" />
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-900">
                                                        #{{ $gruppo->id }} {{ $gruppo->gruppo_nome }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                                <div class="ml-4">
                                                    <div class="text-sm font-medium text-gray-500">
                                                        {{ $gruppo->utenti_appartengono_gruppo_count }}                                                         
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <a href="{{ url('/gruppo') }}/{{ $gruppo->id }}/"
                                                class="text-indigo-600 hover:text-indigo-900">Vedi</a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                        {{ $gruppi->links('vendor.pagination.tailwind') }}
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>


</div>
