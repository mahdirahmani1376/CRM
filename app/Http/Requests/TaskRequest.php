<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'project_id' => 'required',
            'status' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
