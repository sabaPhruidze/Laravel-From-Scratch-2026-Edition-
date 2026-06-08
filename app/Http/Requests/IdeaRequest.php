<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Override;

class IdeaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        //return $this->user()->can('create',Idea:class); ავტორიზაციაზე გავივლი
        return true; // თუ აქ false მეწერება validationმდე ვერ მივაღწვ და 403 error გამოიწვევს
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'description' => ['required', 'min:10'] // აქ შეგვიძლია ვალიდაცია
        ];
    }
    #[Override]
    public function messages(): array
    {
        return ['description.required' => ':attribute is required'];
        //ესეც ჩვეულებრივ გმაოჩნდებ მაშინ როცა არაფერი ეწერება და button დააწვება
        //:attribute დაწერს რაზეც გვჭირდება ინფრომაციის შეყვანა
    }
}
