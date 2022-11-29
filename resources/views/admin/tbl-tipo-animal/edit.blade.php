@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tbl-tipo-animal.actions.edit', ['name' => $tblTipoAnimal->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tbl-tipo-animal-form
                :action="'{{ $tblTipoAnimal->resource_url }}'"
                :data="{{ $tblTipoAnimal->toJson() }}"
                v-cloak
                inline-template>
            
                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tbl-tipo-animal.actions.edit', ['name' => $tblTipoAnimal->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tbl-tipo-animal.components.form-elements')
                    </div>
                    
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>
                    
                </form>

        </tbl-tipo-animal-form>

        </div>
    
</div>

@endsection