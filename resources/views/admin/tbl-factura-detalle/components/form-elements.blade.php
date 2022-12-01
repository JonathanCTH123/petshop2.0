<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_factura'), 'has-success': fields.id_factura && fields.id_factura.valid }">
    <label for="id_factura" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tbl-factura-detalle.columns.id_factura') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.id_factura" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_factura'), 'form-control-success': fields.id_factura && fields.id_factura.valid}" id="id_factura" name="id_factura" placeholder="{{ trans('admin.tbl-factura-detalle.columns.id_factura') }}">
        <div v-if="errors.has('id_factura')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_factura') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('id_articulo'), 'has-success': fields.id_articulo && fields.id_articulo.valid }">
    <label for="id_articulo" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tbl-factura-detalle.columns.id_articulo') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        {{-- <input type="text" v-model="form.id_articulo" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('id_articulo'), 'form-control-success': fields.id_articulo && fields.id_articulo.valid}" id="id_articulo" name="id_articulo" placeholder="{{ trans('admin.tbl-factura-detalle.columns.id_articulo') }}"> --}}
        <multiselect v-model="form.id_articulo"
        :options="{{ $articulos->map(function($articulo) { return ['key' => $articulo->id, 'label' =>  $articulo->nombre]; })->toJson() }}"
        label="label"
        track-by="key"
        placeholder="{{ __('Buscar articulo') }}"
        :limit="1"
        :multiple="false"
        :allowEmpty="false"
        ></multiselect>
        <div v-if="errors.has('id_articulo')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('id_articulo') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('cantidad'), 'has-success': fields.cantidad && fields.cantidad.valid }">
    <label for="cantidad" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tbl-factura-detalle.columns.cantidad') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.cantidad" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('cantidad'), 'form-control-success': fields.cantidad && fields.cantidad.valid}" id="cantidad" name="cantidad" placeholder="{{ trans('admin.tbl-factura-detalle.columns.cantidad') }}">
        <div v-if="errors.has('cantidad')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('cantidad') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('precio_unitario'), 'has-success': fields.precio_unitario && fields.precio_unitario.valid }">
    <label for="precio_unitario" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.tbl-factura-detalle.columns.precio_unitario') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.precio_unitario" v-validate="'required|decimal'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('precio_unitario'), 'form-control-success': fields.precio_unitario && fields.precio_unitario.valid}" id="precio_unitario" name="precio_unitario" placeholder="{{ trans('admin.tbl-factura-detalle.columns.precio_unitario') }}">
        <div v-if="errors.has('precio_unitario')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('precio_unitario') }}</div>
    </div>
</div>


