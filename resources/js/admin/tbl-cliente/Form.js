import AppForm from '../app-components/Form/AppForm';

Vue.component('tbl-cliente-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                nombres:  '' ,
                apellidos:  '' ,
                dui:  '' ,
                fecha_nacimiento:  '' ,
                img:  '' ,
                
            }
        }
    }

});