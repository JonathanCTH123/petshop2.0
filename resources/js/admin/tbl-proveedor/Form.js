import AppForm from '../app-components/Form/AppForm';

Vue.component('tbl-proveedor-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                fecha:  '' ,
                estado:  '' ,
                
            }
        }
    }

});