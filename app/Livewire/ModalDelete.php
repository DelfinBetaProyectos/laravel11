<?php

namespace App\Livewire;

use Livewire\Component;

class ModalDelete extends Component
{
  /**
   * The component's attributes.
   *
   * @var array
   */
  public $model_id;
  public $route;
  public $method;
  public $open = false;

  /**
   * Prepare the component.
   *
   * @return void
   */
  public function mount($model_id = 0, $route = 'dashboard', $method='destroy')
  {
    $this->model_id = $model_id;
    $this->route = $route;
    $this->method = $method;
  }

  /**
   * Render the component.
   *
   * @return \Illuminate\View\View
   */
  public function render()
  {
    return view('livewire.modal-delete');
  }

  public function confirmDeletion() {
    $this->open = false;
  }

  public function openModal()
  {
    $this->open = true;
  }
}
