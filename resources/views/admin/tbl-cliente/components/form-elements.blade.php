<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nombres'), 'has-success': fields.nombres && fields.nombres.valid }">
    <label for="nombres" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tbl-cliente.columns.nombres') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nombres" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nombres'), 'form-control-success': fields.nombres && fields.nombres.valid}" id="nombres" name="nombres" placeholder="{{ trans('admin.tbl-cliente.columns.nombres') }}">
        <div v-if="errors.has('nombres')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nombres') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('apellidos'), 'has-success': fields.apellidos && fields.apellidos.valid }">
    <label for="apellidos" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tbl-cliente.columns.apellidos') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.apellidos" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('apellidos'), 'form-control-success': fields.apellidos && fields.apellidos.valid}" id="apellidos" name="apellidos" placeholder="{{ trans('admin.tbl-cliente.columns.apellidos') }}">
        <div v-if="errors.has('apellidos')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('apellidos') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('dui'), 'has-success': fields.dui && fields.dui.valid }">
    <label for="dui" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tbl-cliente.columns.dui') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.dui" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('dui'), 'form-control-success': fields.dui && fields.dui.valid}" id="dui" name="dui" placeholder="{{ trans('admin.tbl-cliente.columns.dui') }}">
        <div v-if="errors.has('dui')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('dui') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('fecha_nacimiento'), 'has-success': fields.fecha_nacimiento && fields.fecha_nacimiento.valid }">
    <label for="fecha_nacimiento" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tbl-cliente.columns.fecha_nacimiento') }}</label>
    <div :class="isFormLocalized ? 'col-md-4' : 'col-sm-8'">
        <div class="input-group input-group--custom">
            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
            <datetime v-model="form.fecha_nacimiento" :config="datePickerConfig" v-validate="'required|date_format:yyyy-MM-dd HH:mm:ss'" class="flatpickr" :class="{'form-control-danger': errors.has('fecha_nacimiento'), 'form-control-success': fields.fecha_nacimiento && fields.fecha_nacimiento.valid}" id="fecha_nacimiento" name="fecha_nacimiento" placeholder="{{ trans('brackets/admin-ui::admin.forms.select_a_date') }}"></datetime>
        </div>
        <div v-if="errors.has('fecha_nacimiento')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('fecha_nacimiento') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('img'), 'has-success': fields.img && fields.img.valid }">
    <label for="img" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tbl-cliente.columns.img') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.img" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('img'), 'form-control-success': fields.img && fields.img.valid}" id="img" name="img" placeholder="{{ trans('admin.tbl-cliente.columns.img') }}">
        <div v-if="errors.has('img')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('img') }}</div>
    </div>
</div>

{{-- @include('brackets/admin-ui::admin.includes.avatar-uploader', [
    'mediaCollection' => app(App\Models\TblCliente::class)->getMediaCollection('imagen_cliente'),
    'media' => $tblCliente->getThumbs200ForCollection('imagen_cliente'),
    'label' =>'Imagen'
]) --}}


