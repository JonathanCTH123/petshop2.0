@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tbl-articulo.actions.edit', ['name' => $tblArticulo->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tbl-articulo-form
                :action="'{{ $tblArticulo->resource_url }}'"
                :data="{{ $tblArticulo->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tbl-articulo.actions.edit', ['name' => $tblArticulo->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tbl-articulo.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tbl-articulo-form>

        </div>
    
</div>

@endsection