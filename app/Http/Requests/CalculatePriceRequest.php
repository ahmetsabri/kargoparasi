<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CalculatePriceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'from' => ['required', 'exists:cities,plate'],
            'to' => ['required', 'exists:cities,plate'],
            'is_envelope' => ['required', 'boolean'],

            'weight' => [Rule::when($this->is_envelope == false, ['required', 'numeric', 'min:1'])],
            'length' => [Rule::when($this->is_envelope == false, ['required', 'numeric', 'min:1'])],
            'width' => [Rule::when($this->is_envelope == false, ['required', 'numeric', 'min:1'])],
            'height' => [Rule::when($this->is_envelope == false, ['required', 'numeric', 'min:1'])],
        ];
    }
}
