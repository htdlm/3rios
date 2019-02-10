<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdiUpdateRequest extends FormRequest
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
     * @return array
     */
     public function rules()
     {
         return [
             'DesAdi' => 'required',
             'UniAdi' => 'required',
             'CosAdi' => 'required|numeric'
         ];
     }

     public function messages()
     {
       return [
           'DesAdi.required' => 'El campo Descripcion es obligatorio',
           'UniAdi.required' => 'El campo Unidad es obligatorio',
           'CosAdi.required' => 'El campo Costo es obligatorio',
       ];
     }
}
