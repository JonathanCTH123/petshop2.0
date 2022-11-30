import AppForm from '../app-components/Form/AppForm';

Vue.component('tbl-factura-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                id_cliente:  '' ,
                fecha:  '' ,
                estado:  '' ,
                
            }
        }
    }

});