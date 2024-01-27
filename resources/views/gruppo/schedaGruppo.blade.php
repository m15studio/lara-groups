<x-app-layout>

     @section('header')
     @include("moduli.gruppo.partials.gruppo_header")
     @endsection


     @section('content')
     <div>
          <div>
               <div class="md:flex md:items-center md:justify-between md:space-x-4 xl:border-b xl:pb-6">
                    <div>

                         <h1 class="text-2xl font-bold text-bwt-blu uppercase lining-nums">
                              {{ $gruppo->gruppo_nome }}</h1>
                         <p class="text-sm font-medium text-gray-500">
                              Gruppo creato il {{ $gruppo->created_at->format('d/m/Y H:i') }}
                         </p>
                    </div>
               </div>

          </div>

          <div class="space-y-5 mt-5">

               <livewire:gruppo.form-iscrivi-utente-gruppo :id_gruppo='$gruppo->id'>

                    @livewire('gruppo.utenti-gruppo-table', ['gruppo' => $gruppo])

          </div>

     </div>
     @endsection


     @section('aside')
     zzz
     @endsection

</x-app-layout>
