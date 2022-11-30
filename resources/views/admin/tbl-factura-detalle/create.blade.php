@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tbl-factura-detalle.actions.create'))

@section('body')

    <div class="container-xl">

                <div class="card">
        
        <tbl-factura-detalle-form
            :action="'{{ url('admin/tbl-factura-detalles') }}'"
            v-cloak
            inline-template>

            <form class="form-horizontal form-create" method="post" @submit.prevent="onSubmit" :action="action" novalidate>
                
                <div class="card-header">
                    <i class="fa fa-plus"></i> {{ trans('admin.tbl-factura-detalle.actions.create') }}
                </div>

                <div class="card-body">
                    @include('admin.tbl-factura-detalle.components.form-elements')
                </div>
                                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" :disabled="submiting">
                        <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                        {{ trans('brackets/admin-ui::admin.btn.save') }}
                    </button>
                </div>
                
            </form>

        </tbl-factura-detalle-form>

        </div>

        </div>

    
@endsection