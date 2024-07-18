<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            "project_title" => "required|min:3|max:200",
            "description" => "required|min:3|max:255",
            "collaborators" => "required|min:3|",
            "framework" => "required",
            "thumb" => "required",
            "start_project" => "required",
            "end_project" => "required",
            "type_id" => "required",
        ];
    }
}
