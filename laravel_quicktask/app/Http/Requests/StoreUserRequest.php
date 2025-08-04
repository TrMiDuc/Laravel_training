<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'email' => 'required|email|unique:users',
            'phone' => 'nullable|string|max:20',
            'live_at' => 'nullable|string|max:255',
            'role' => 'required|string|in:user,admin',
            'password' => 'required|string|min:8|confirmed',
        ];
    }
    
    protected function prepareForValidation(): void
    {
        $this->merge([
            'phone' => $this->phone ? format_number_with_space($this->phone) : null,
        ]);
    }
}