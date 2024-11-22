<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookingRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'user_id'  => ['required', 'exists:users,id'], 
            'service_id' => ['required', 'exists:services,id'], 
            'booking_date' => ['required', 'date', 'after:today'], 
            'status' => ['required', 'string', 'in:pending,confirmed,cancelled'], 
        ];
    }
}
