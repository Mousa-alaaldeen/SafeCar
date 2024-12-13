<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true; // إذا كنت تريد السماح للجميع بالوصول
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:15',
            'car_size' => 'required|string',
            'car_type' => 'required|string',
            'car_model' => 'required|string',
            'car_license_plate' => 'required|string',
            'car_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    /**
     * Get custom messages for validation errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'email.required' => 'The email field is required.',
          
        ];
    }
}
