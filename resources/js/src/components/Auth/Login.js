import api from "../../services/api";
import {store} from "../../store/vuejx";
import router from "../../router";
import {mapActions} from "vuex";

export default {
    name: "Login",

    data() {
        return {
            form: {
                email: '',
                password: ''
            },
            errors: {}
        }
    },

    methods: {
        ...mapActions(['UPDATE_TOKEN']),

        login() {
            api.post('api/login', this.form).then(r => {
                store.commit('UPDATE_TOKEN', r.data.token);
                router.push('home')
            }).catch(e => {
                this.errors = e.response.data.errors
            })
        }
    }
}
