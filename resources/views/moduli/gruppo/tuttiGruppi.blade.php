<x-app-layout>

     @section('header')
     @include("m15studio::moduli.gruppo.partials.gruppo_header")
     @endsection


     @section('content')
     <div class="hidden mt-8 sm:block sm:px-6 lg:px-8">
          <div class="align-middle inline-block min-w-full border-b border-gray-200">
               <livewire:gruppo.gruppi-table />
          </div>
     </div>
     @endsection

</x-app-layout>
