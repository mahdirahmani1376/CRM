<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'contact_name' => 'required|string',
            'contact_email' => 'email|required',
            'contact_phone_number' => 'required',
            'company_name' => 'required|string',
            'company_vat' => 'required|integer',
            'company_address' => 'required|string',
            'company_city' => 'required|string',
            'company_zip' => 'required|integer',
        ];
    }
}
