<x-dashboard-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('Dashboard') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
        <div class="grid grid-cols-1 md:grid-cols-6 gap-6">
          <div class="p-2">
            <x-application-logo class="block w-auto" />
          </div>
          <div class="md:col-span-5">
            <h1 class="text-2xl font-semibold text-gray-900 dark:text-white">¡Bienvenido al Sistema de BookX!</h1>
            <p class="text-lg font-semibold dark:text-white">Admin: {{ Auth::user()->fullname }}</p>
          </div>
        </div>
        <hr class="my-6" />
        <p class="my-3 leading-relaxed dark:text-gray-400">Accede a toda la información y reportes de tu sistema de Booking.</p>
      </div>
    </div>
  </div>
</x-dashboard-layout>
