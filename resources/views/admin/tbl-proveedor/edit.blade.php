@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tbl-proveedor.actions.edit', ['name' => $tblProveedor->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tbl-proveedor-form
                :action="'{{ $tblProveedor->resource_url }}'"
                :data="{{ $tblProveedor->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tbl-proveedor.actions.edit', ['name' => $tblProveedor->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tbl-proveedor.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tbl-proveedor-form>

        </div>
    
</div>

@endsection