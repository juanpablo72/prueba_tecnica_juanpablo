<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'age' => 'required|integer|min:18',
            'dob' => 'required|date',
            'address' => 'required|string|max:500',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,manager',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'profile_picture.max' => 'La foto no debe pesar más de 2MB',
            'role.in' => 'El rol seleccionado es inválido'
        ];
    }
}
