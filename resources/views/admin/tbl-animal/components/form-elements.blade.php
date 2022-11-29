<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tbl-animal.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.tbl-animal.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_tipo_animal'), 'has-success': fields.id_tipo_animal && fields.id_tipo_animal.valid }">
    <label for="id_tipo_animal" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tbl-animal.columns.id_tipo_animal') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
            <multiselect v-model="form.id_tipo_animal"
             :options="{{ $tipos_animal->map(function($tipo) { return ['key' => $tipo->id, 'label' =>  $tipo->nombre]; })->toJson() }}"
             label="label"
             track-by="key"
             placeholder="{{ __('Buscar tipo de animal') }}"
             :limit="1"
             :multiple="false"
             :allowEmpty="false"
             ></multiselect>
        {{-- <input type="text" v-model="form.id_tipo_animal"  @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_tipo_animal'), 'form-control-success': fields.id_tipo_animal && fields.id_tipo_animal.valid}" id="id_tipo_animal" name="id_tipo_animal" placeholder="{{ trans('admin.tbl-animal.columns.id_tipo_animal') }}"> --}}
        <div v-if="errors.has('form.id_tipo_animal')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_tipo_animal') }}</div>
    </div>
</div>

{{-- <div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_tipo_animal'), 'has-success': fields.id_tipo_animal && fields.id_tipo_animal.valid }" >
    <div class="col-sm-auto form-group">
        <p>{{ __('Select author/s') }}</p>
    </div>
    <div class="col col-lg-12 col-xl-12 form-group">

    </div>
</div> --}}


