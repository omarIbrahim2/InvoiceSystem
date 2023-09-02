<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceAddReq extends FormRequest
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
            'date' =>'required|date',
            'tax' =>'decimal:1,3|min:0|nullable',
            'discount' =>'decimal:0,3|min:0',
            'customer_id' =>'required|exists:customers,id',
            'notes' =>'string|nullable',
        ];
    }



    public function messages(){
        return[
            'required' => "هذا الحقل مطلوب",
            'decimal:1,3' => "الضرية المدخلة  يجب ان يكون الرقم العشري بعد الفاصلة يتراوح بين 1 الي 3",
            'decimal:0,3' => "الضرية المدخلة  يجب ان يكون الرقم العشري بعد الفاصلة يتراوح بين 0 الي 3",
            "min:0" => 'يجب السعر لا يقل عن 0',
            'date'=> "هذا الحقل يجب ان يكون بصيغة تاريخ",
        ];
    }
}
