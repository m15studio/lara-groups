<div class="border-b border-gray-200 px-4 py-4 sm:flex sm:items-center sm:justify-between sm:px-6 lg:px-8">
     <div class="flex-1 min-w-0">
          <h1 class="text-lg font-medium leading-6 text-bwt-pink sm:truncate">
               <a href="{{-- route('fornitori-dashboard') --}}#">{{ __("Amministrazione") }} / {{ __("Gruppi") }}</a>
          </h1>
     </div>
     <div class="mt-4 flex sm:mt-0 sm:ml-4">
          @livewire('gruppo.form-nuovo-gruppo')
     </div>
</div>
