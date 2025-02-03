@php
  $model_array = explode('.', $route);
@endphp

<div class="inline-block">
  <button type="button" wire:click="openModal" wire:loading.attr="disabled" class="inline-flex items-center justify-center mx-0.5 p-2 bg-gray-200 text-red-600 rounded-full hover:bg-gray-300 focus:ring-4 focus:ring-gray-400">
    <span class="sr-only">Delete</span>
    @if (($model_array[0] == 'users') || ($model_array[1] == 'users'))
    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
      <path fill-rule="evenodd" d="M5 8a4 4 0 1 1 8 0 4 4 0 0 1-8 0Zm-2 9a4 4 0 0 1 4-4h4a4 4 0 0 1 4 4v1a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-1Zm13-6a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-4Z" clip-rule="evenodd"/>
    </svg>
    @else
    <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
    </svg>
    @endif
  </button>

  <x-confirmation-modal :id="$model_id" wire:model="open">
    <x-slot name="title">
      Delete
    </x-slot>

    <x-slot name="content">
      Are you sure you want to delete?
    </x-slot>

    <x-slot name="footer">
      <x-secondary-button wire:click="$toggle('open')" wire:loading.attr="disabled">
        Cancel
      </x-secondary-button>

      <form method="post" action="{{ route($route, $model_id) }}" class="inline">
        {{ csrf_field() }}
        {{ method_field($method) }}
        <x-danger-button type="submit" class="ml-2" wire:click="confirmDeletion" wire:loading.attr="disabled">
          Delete
        </x-danger-button>
      </form>
    </x-slot>
  </x-confirmation-modal>
</div>
