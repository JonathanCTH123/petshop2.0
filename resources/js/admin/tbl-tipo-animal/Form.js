import AppForm from '../app-components/Form/AppForm';

Vue.component('tbl-tipo-animal-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                id_tipo_animal:  '' ,
                nombre:  '' ,
                habilitado:  false ,
                
            }
        }
    }

});