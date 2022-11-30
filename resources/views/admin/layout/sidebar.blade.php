<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.content') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/tbl-tipo-animals') }}"><i class="nav-icon icon-diamond"></i> {{ trans('admin.tbl-tipo-animal.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/roles') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.role.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tbl-animals') }}"><i class="nav-icon icon-magnet"></i> {{ trans('admin.tbl-animal.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tbl-clientes') }}"><i class="nav-icon icon-star"></i> {{ trans('admin.tbl-cliente.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tbl-proveedors') }}"><i class="nav-icon icon-puzzle"></i> {{ trans('admin.tbl-proveedor.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tbl-articulos') }}"><i class="nav-icon icon-compass"></i> {{ trans('admin.tbl-articulo.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tbl-facturas') }}"><i class="nav-icon icon-umbrella"></i> {{ trans('admin.tbl-factura.title') }}</a></li>
           <li class="nav-item"><a class="nav-link" href="{{ url('admin/tbl-factura-detalles') }}"><i class="nav-icon icon-graduation"></i> {{ trans('admin.tbl-factura-detalle.title') }}</a></li>
           {{-- Do not delete me :) I'm used for auto-generation menu items --}}

            <li class="nav-title">{{ trans('brackets/admin-ui::admin.sidebar.settings') }}</li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/admin-users') }}"><i class="nav-icon icon-user"></i> {{ __('Manage access') }}</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('admin/translations') }}"><i class="nav-icon icon-location-pin"></i> {{ __('Translations') }}</a></li>
            {{-- Do not delete me :) I'm also used for auto-generation menu items --}}
            {{--<li class="nav-item"><a class="nav-link" href="{{ url('admin/configuration') }}"><i class="nav-icon icon-settings"></i> {{ __('Configuration') }}</a></li>--}}
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>
