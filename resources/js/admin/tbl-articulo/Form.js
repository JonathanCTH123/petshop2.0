import AppForm from '../app-components/Form/AppForm';

Vue.component('tbl-articulo-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                descripcion:  '' ,
                cantidad:  '' ,
                precio:  '' ,
                estado:  '' ,
                id_animal:  '' ,
                id_proveedor:  '' ,
                
            }
        }
    }

});