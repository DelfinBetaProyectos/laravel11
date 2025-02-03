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
      <li aria-current="page">
        <div class="flex items-center">
          <svg class="rtl:rotate-180 w-3 h-3 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
          </svg>
          <span class="ms-1 text-sm font-semibold md:ms-2 dark:text-gray-400">{{ __('Users') }}</span>
        </div>
      </li>
    </ol>
  </nav>

  @if (session('status'))
    <div class="my-6 p-4 font-medium text-sm bg-green-300 text-green-600">
      {{ session('status') }}
    </div>
  @endif

  @if ($errors->any())
    <div class="my-6 p-4 font-medium text-sm bg-red-300 text-red-600">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="my-6 bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
    <div class="p-4 flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
      <h1 class="leading-tight font-semibold text-2xl dark:text-gray-400">{{ __('Users') }}</h1>
      <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
        <a href="{{ route('admin.users.create') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-50 dark:bg-blue-800 dark:hover:bg-blue-700 transition ease-in-out duration-150">
          <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
            <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
          </svg>
          <span>{{ __('Add User') }}</span>
        </a>
      </div>
    </div>
    <div class="p-4 border-t border-gray-300 dark:border-gray-600">
      <form action="{{ route('admin.users.index') }}" method="get">
        @csrf
        <div class="grid gap-4 grid-cols-1 md:grid-cols-4">
          <div class="md:col-span-2">
            <label for="search" class="sr-only">Search</label>
            <div class="relative w-full">
              <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                </svg>
              </div>
              <input type="text" id="search" name="search" value="{{ request('search') }}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" />
            </div>
          </div>
          <div>
            <x-button type="submit">{{ __('Search') }}</x-button>
          </div>
        </div>
      </form>
    </div>
    <div class="overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs uppercase text-blue-800 bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-4 py-3 text-center" style="width: 80px">{{ __('Code') }}</th>
            <th scope="col" class="px-4 py-3">{{ __('User Name') }}</th>
            <th scope="col" class="px-4 py-3">{{ __('Email') }}</th>
            <th scope="col" class="px-4 py-3">{{ __('Mobile') }}</th>
            <th scope="col" class="px-4 py-3 text-center" style="width: 90px">{{ __('Role') }}</th>
            <th scope="col" class="px-4 py-3 text-center" style="width: 80px">{{ __('Since') }}</th>
            <th scope="col" class="px-4 py-3 text-center" style="width: 180px">{{ __('Actions') }}</th>
          </tr>
        </thead>
        @if ($users->isNotEmpty())
          <tbody>
            @foreach ($users as $user)
              <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700 border-gray-200">
                <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                  <a href="{{ route('admin.users.edit', $user) }}" class="font-semibold text-blue-600 hover:underlink hover:underline">
                    {{ str_pad($user->id, 6, "0", STR_PAD_LEFT) }}
                  </a>
                </th>
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $user->fullname }}
                </th>
                <td class="px-4 py-3">
                  <p>{{ $user->email }}</p>
                  <p>Verified: {{ optional($user->email_verified_at)->format('d/m/Y') }}</p>
                </td>
                <td class="px-4 py-3">
                  <p>{{ $user->mobile_mask }}</p>
                </td>
                <td class="px-4 py-3 text-center">{{ $user->getRoles() }}</td>
                <td class="px-4 py-3 text-center">{{ $user->created_at->format('d/m/Y') }}</td>
                <td class="px-4 py-3 text-center">
                  <a href="{{ route('admin.users.password', $user) }}" class="inline-flex items-center justify-center mx-0.5 p-2 bg-gray-200 text-yellow-400 rounded-full hover:bg-gray-300 focus:ring-4 focus:ring-gray-400">
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                      <path fill-rule="evenodd" d="M8 10V7a4 4 0 1 1 8 0v3h1a2 2 0 0 1 2 2v7a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2v-7c0-1.1.9-2 2-2h1Zm2-3a2 2 0 1 1 4 0v3h-4V7Zm2 6c.6 0 1 .4 1 1v3a1 1 0 1 1-2 0v-3c0-.6.4-1 1-1Z" clip-rule="evenodd"/>
                    </svg>
                  </a>
                  <a href="{{ route('admin.users.edit', $user) }}" class="inline-flex items-center justify-center mx-0.5 p-2 bg-gray-200 text-indigo-400 rounded-full hover:bg-gray-300 focus:ring-4 focus:ring-gray-400">
                    <span class="sr-only">Edit</span>
                    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                      <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 7.8 1.3l-2.5 2.5A4 4 0 0 1 5 8Zm4 5H7a4 4 0 0 0-4 4v1c0 1.1.9 2 2 2h2.2a3 3 0 0 1-.1-1.6l.6-3.4a3 3 0 0 1 .9-1.5L9 13Zm9-5a3 3 0 0 0-2 .9l-6 6a1 1 0 0 0-.3.5L9 18.8a1 1 0 0 0 1.2 1.2l3.4-.7c.2 0 .3-.1.5-.3l6-6a3 3 0 0 0-2-5Z" clip-rule="evenodd"/>
                    </svg>
                  </a>
                  @livewire('modal-delete', [
                    'model_id' => $user->id,
                    'route' => 'admin.users.destroy',
                    'method' => 'delete'
                  ])
                </td>
              </tr>
            @endforeach
          </tbody>
        @endif
      </table>
    </div>
    <div class="p-4">{{ $users->links() }}</div>
  </div>
</x-dashboard-layout>