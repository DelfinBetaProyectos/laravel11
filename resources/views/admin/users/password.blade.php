<x-dashboard-layout>
  <!-- Breadcrumb -->
  <nav class="flex px-5 py-3 border border-gray-200 rounded-lg bg-white shadow-md dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
    <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
      <li class="inline-flex items-center">
        <a href="{{ route('admin.dashboard') }}" class="inline-flex items-center text-sm font-medium text-blue-600 hover:underlink dark:text-gray-400 dark:hover:text-white">
          <svg aria-hidden="true" class="w-4 h-4 me-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
          </svg>
          {{ __('Dashboard') }}
        </a>
      </li>
      <li>
        <div class="flex items-center">
          <svg class="rtl:rotate-180 w-3 h-3 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
          </svg>
          <a href="{{ route('admin.users.index') }}" class="ms-1 text-sm font-medium md:ms-2 text-blue-600 hover:underlink dark:text-gray-400 dark:hover:text-white">{{ __('Users') }}</a>
        </div>
      </li>
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="rtl:rotate-180 w-3 h-3 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="ms-1 text-sm font-semibold md:ms-2 dark:text-gray-400">{{ __('Update Password') }}</span>
        </div>
      </li>
    </ol>
  </nav>

  @if ($errors->any())
    <div class="my-6 p-4 font-medium text-sm bg-red-300 text-red-600 rounded">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="my-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
      <div class="p-4">
        <h1 class="leading-tight font-semibold text-2xl dark:text-gray-400">{{ __('Update Password') }}</h1>
      </div>
      <div class="p-4 border-t border-gray-300 dark:border-gray-600">
        <form action="{{ route('admin.users.password', $user) }}" method="POST">
          @csrf

          <div class="my-6 grid grid-cols-1 lg:grid-cols-6 gap-4 lg:gap-6">
            <!-- First Name -->
            <div class="lg:col-span-3 relative z-0 w-full group">
              <x-label for="firstname" value="{{ __('First Name') }}" />
              <x-input id="firstname" type="text" name="firstname" :value="$user->firstname" placeholder=" " class="w-full" readonly />
              <x-input-error for="firstname" class="mt-2" />
            </div>
            <!-- Last Name -->
            <div class="lg:col-span-3 relative z-0 w-full group">
              <x-label for="lastname" value="{{ __('Last Name') }}" />
              <x-input id="lastname" type="text" name="lastname" :value="$user->lastname" placeholder=" " class="w-full" readonly />
              <x-input-error for="lastname" class="mt-2" />
            </div>
            <!-- Password -->
            <div class="lg:col-span-3 relative z-0 w-full group">
              <x-label for="password" value="{{ __('Password') }}" />
              <x-input id="password" type="password" name="password" placeholder=" " class="w-full" required />
              <x-input-error for="password" class="mt-2" />
            </div>
            <!-- Password Confirmation -->
            <div class="lg:col-span-3 relative z-0 w-full group">
              <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
              <x-input id="password_confirmation" type="password" name="password_confirmation" placeholder=" " class="w-full" required />
              <x-input-error for="password_confirmation" class="mt-2" />
            </div>
          </div>

          <div class="flex flex-col items-center justify-center px-4 py-3 sm:px-6">
            <x-button type="submit">
              {{ __('Save') }}
            </x-button>
          </div>
        </form>
      </div>
    </div>
  </div>
</x-dashboard-layout>