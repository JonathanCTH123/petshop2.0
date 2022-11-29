
<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombre'), 'has-success': fields.nombre && fields.nombre.valid }">
    <label for="nombre" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tbl-tipo-animal.columns.nombre') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombre" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombre'), 'form-control-success': fields.nombre && fields.nombre.valid}" id="nombre" name="nombre" placeholder="{{ trans('admin.tbl-tipo-animal.columns.nombre') }}">
        <div v-if="errors.has('nombre')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombre') }}</div>
    </div>
</div>

<div class="form-check row" :class="{'has-danger': errors.has('habilitado'), 'has-success': fields.habilitado && fields.habilitado.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="habilitado" type="checkbox" v-model="form.habilitado" v-validate="''" data-vv-name="habilitado"  name="habilitado_fake_element">
        <label class="form-check-label" for="habilitado">
            {{ trans('admin.tbl-tipo-animal.columns.habilitado') }}
        </label>
        <input type="hidden" name="habilitado" :value="form.habilitado">
        <div v-if="errors.has('habilitado')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('habilitado') }}</div>
    </div>
</div>


