<?php

namespace App\Http\Requests\Admin\TblArticulo;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateTblArticulo extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.tbl-articulo.edit', $this->tblArticulo);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre' => ['sometimes', 'string'],
            'descripcion' => ['sometimes', 'string'],
            'cantidad' => ['sometimes', 'integer'],
            'precio' => ['sometimes', 'numeric'],
            'estado' => ['sometimes', 'integer'],
            'id_animal' => ['sometimes'],
            'id_proveedor' => ['sometimes'],

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
