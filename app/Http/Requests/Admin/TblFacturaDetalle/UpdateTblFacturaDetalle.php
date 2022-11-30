<?php

namespace App\Http\Requests\Admin\TblFacturaDetalle;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTblFacturaDetalle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.tbl-factura-detalle.edit', $this->tblFacturaDetalle);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'id_factura' => ['sometimes'],
            'id_articulo' => ['sometimes'],
            'cantidad' => ['sometimes', 'integer'],
            'precio_unitario' => ['sometimes', 'numeric'],

        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
