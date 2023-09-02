<?php

namespace App\Http\Requests;

use App\Rules\PhoneValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CustomerAddReq extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'company_name' => 'required|string|max:100',
            'email' => 'required|email|unique:customers,email',
            'phone' => ['required' , new PhoneValidationRule],
            'country' => 'required|string|max:100',
            'state' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'postal_code' => 'required|string|max:50',
            'address'=> 'required|string',

        ];
    }


    public function messages(){

        return[
            'required' => "هذا الحقل مطلوب",
            'max:100' => 'البيانات يجب ان لا تتعدي 100 حرف',
            'max:50' => 'البيانات يجب ان لا تتعدي 50 حرف',
            'email' => 'هذا الحقل يجب ان يكون بريد الكتروني',
            "unique:customres,email"=> 'هذا البريد الالكتروني تم تسجيله من قبل',
        ];
    }
}
