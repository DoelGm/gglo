<?php

namespace App\Http\Requests;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UsersUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    protected function prepareForValidation()
    {
        $this->user = User::findOrFail($this->route('id'));
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    public function rules(): array
    {

        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => 'required|string|email|max:255|unique:users,email,' . $this->user->id,
            'phone'=>['required', 'string', 'max:11'],
            'adress'=>['required', 'string', 'max:255'],
            'role'=>['string', 'max:255']
        ];
    }
}
