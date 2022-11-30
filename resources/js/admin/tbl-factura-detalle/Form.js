import AppForm from '../app-components/Form/AppForm';

Vue.component('tbl-factura-detalle-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                id_factura:  '' ,
                id_articulo:  '' ,
                cantidad:  '' ,
                precio_unitario:  '' ,
                
            }
        }
    }

});