@extends('brackets/admin-ui::admin.layout.default')

@section('title', trans('admin.tbl-animal.actions.edit', ['name' => $tblAnimal->id]))

@section('body')

    <div class="container-xl">
        <div class="card">

            <tbl-animal-form
                :action="'{{ $tblAnimal->resource_url }}'"
                :data="{{ $tblAnimal->toJson() }}"
                :tipos_animals = {{  $tipos_animal->toJson() }}
                v-cloak
                inline-template>

                <form class="form-horizontal form-edit" method="post" @submit.prevent="onSubmit" :action="action" novalidate>


                    <div class="card-header">
                        <i class="fa fa-pencil"></i> {{ trans('admin.tbl-animal.actions.edit', ['name' => $tblAnimal->id]) }}
                    </div>

                    <div class="card-body">
                        @include('admin.tbl-animal.components.form-elements')
                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary" :disabled="submiting">
                            <i class="fa" :class="submiting ? 'fa-spinner' : 'fa-download'"></i>
                            {{ trans('brackets/admin-ui::admin.btn.save') }}
                        </button>
                    </div>

                </form>

        </tbl-animal-form>

        </div>

</div>

@endsection
