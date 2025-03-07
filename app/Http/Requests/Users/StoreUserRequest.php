<?php

namespace App\Http\Requests\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   */
  public function authorize(): bool
  {
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
   */
  public function rules(): array
  {
    return [
      'firstname' => 'required|string',
      'lastname' => 'required|string',
      'email' => 'required|email|unique:users',
      'password' => 'required|string|confirmed|min:8',
      'roles' => 'required|array',
      'roles.*' => ['required', Rule::exists('bouncer_roles', 'name')]
    ];
  }
}
