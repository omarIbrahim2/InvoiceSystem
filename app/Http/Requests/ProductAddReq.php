<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddReq extends FormRequest
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
            "name" => 'required|string|max:100',
            'desc' => 'required|string',
            'price' => "required|numeric|min:1",
        ];
    }

    public function messages(){
        return [
          'required' => "هذا الحقل مطلوب",
          'max:100'=>'البيانات يجب ان لا تتعدي 100 حرف',
          'numeric' => "المدخل يجب ان يكون رقم",
          "min:1" => 'يجب السعر لا يقل عن 1',
           
        ];
    }
}
