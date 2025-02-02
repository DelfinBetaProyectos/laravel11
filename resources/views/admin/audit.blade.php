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
          <span class="ms-1 text-sm font-semibold md:ms-2 dark:text-gray-400">{{ __('Audit') }}</span>
        </div>
      </li>
    </ol>
  </nav>

  <div class="my-6 bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
    <div class="p-4 flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4">
      <h1 class="leading-tight font-semibold text-2xl dark:text-gray-400">{{ __('Audit') }}</h1>
      <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
        &nbsp;
      </div>
    </div>
    <div class="overflow-x-auto">
      <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs uppercase text-blue-800 bg-blue-100 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-4 py-3" style="width: 220px">Model</th>
            <th scope="col" class="px-4 py-3" style="width: 120px">Action</th>
            <th scope="col" class="px-4 py-3" style="width: 220px">User</th>
            <th scope="col" class="px-4 py-3 text-center" style="width: 120px">Time</th>
            <th scope="col" class="px-4 py-3">Old Values</th>
            <th scope="col" class="px-4 py-3">New Values</th>
          </tr>
        </thead>
        @if ($audits->isNotEmpty())
          <tbody>
            @foreach ($audits as $audit)
              <tr class="border-b dark:border-gray-700 odd:bg-white even:bg-gray-50 dark:odd:bg-gray-900/50 dark:even:bg-gray-950">
                <th scope="row" class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $audit->auditable_type }} (id: {{ $audit->auditable_id }})
                </th>
                <td class="px-4 py-3">{{ $audit->event }}</td>
                <td class="px-4 py-3">{{ optional($audit->user)->fullname }}</td>
                <td class="px-4 py-3 text-center">{{ $audit->created_at->format('m/d/y') }}</td>
                <td class="px-4 py-3">
                  <table class="table">
                    @foreach($audit->old_values as $attribute => $value)
                      <tr>
                        <td><b>{{ $attribute }}</b></td>
                        <td>{{ $value }}</td>
                      </tr>
                    @endforeach
                  </table>
                </td>
                <td class="px-4 py-3">
                  <table class="table">
                    @foreach($audit->new_values as $attribute => $value)
                      <tr>
                        <td><b>{{ $attribute }}</b></td>
                        <td>{{ $value }}</td>
                      </tr>
                    @endforeach
                  </table>
                </td>
              </tr>
            @endforeach
          </tbody>
        @endif
      </table>
    </div>
    <div class="p-4">{{ $audits->links() }}</div>
  </div>
</x-dashboard-layout>
