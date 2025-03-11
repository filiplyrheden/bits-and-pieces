<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveProductRequest extends FormRequest
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
            'name' => 'required|max:100',
            'console_id' => 'required|exists:consoles,id',
            'description' => 'nullable|min:3',
            'color' => 'required|max:20',
            'connection' => 'required|max:20',
            'price' => 'required|numeric|min:0.01'
        ];
    }
}
