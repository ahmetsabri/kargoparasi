<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CalculatePriceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'from' => ['required', 'exists:cities,plate'],
            'to' => ['required', 'exists:cities,plate'],
            'is_envelope' => ['required', 'boolean'],
            'weight' => ['required_if:is_envelope,true', 'numeric'],
            'length' => ['required_if:is_envelope,true', 'numeric'],
            'width' => ['required_if:is_envelope,true', 'numeric'],
            'height' => ['required_if:is_envelope,true', 'numeric'],
        ];
    }

}
