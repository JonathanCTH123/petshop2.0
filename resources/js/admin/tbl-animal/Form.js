import AppForm from '../app-components/Form/AppForm';

Vue.component('tbl-animal-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombre:  '' ,
                id_tipo_animal:  '' ,
                
            }
        }
    }

});