<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubscriptionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true; // Allow this request (you can add authorization logic here if needed)
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id', // Validate that the user exists
            'package_id' => 'required|exists:packages,id', // Validate that the package exists
            'start_date' => 'required|date', // Validate that the start date is a valid date
            'end_date' => 'required|date|after:start_date', // Validate that the end date is after the start date
        ];
    }
}
