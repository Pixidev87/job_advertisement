<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreJobListingRequest extends FormRequest
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
            'title' => 'required|max:255',
            'local' => 'required|max:255',
            'description' => 'required|string',
            'type' => 'required|in:full-time,part-time,remote',
            'salary' => 'nullable|integer|min:0',
            'valid_from' => 'required|date',
            'valid_to' => 'required|date|after_or_equal:valid_from',
            'category_id' => 'required|exists:job_categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Az állás megnevezése kötelező.',
            'local.required' => 'A helyszín megadása kötelező.',
            'description.required' => 'Az állás leírása kötelező.',
            'type.required' => 'Az állás típusa kötelező.',
            'type.in' => 'Az állás típusa csak full-time, part-time vagy remote lehet.',
            'salary.integer' => 'A fizetésnek egész számnak kell lennie.',
            'salary.min' => 'A fizetés nem lehet negatív.',
            'valid_from.required' => 'Az érvényesség kezdete kötelező.',
            'valid_to.required' => 'Az érvényesség vége kötelező.',
            'valid_to.after_or_equal' => 'Az érvényesség vége nem lehet korábbi, mint a kezdete.',
            'category_id.required' => 'A kategória megadása kötelező.',
            'category_id.exists' => 'A megadott kategória nem létezik.',
            'user_id.required' => 'A felhasználó megadása kötelező.',
            'user_id.exists' => 'A megadott felhasználó nem létezik.',
            'slug.required' => 'A slug megadása kötelező.',
            'slug.unique' => 'Ez a slug már használatban van. Kérem válasszon egy egyedit.',
        ];
    }
}
