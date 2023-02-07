import api from "../../services/api";
import {mapGetters} from "vuex";

export default {
    name: "UploadPDF",

    data() {
        return {
            pdf: '',
            error: ''
        }
    },

    mounted() {
        window.Echo.channel('upload-pdf')
            .listen('PDFUploadEvent', (e) => {
                console.log(e)
            })
    },

    computed: {
        ...mapGetters(['token']),
    },


    methods: {
        uploadPDF(e) {
            if (!e.target.files.length) {
                return;
            }

            this.pdf = e.target.files[0];
        },
        savePdf() {
            if (this.pdf === '') {
                this.error = 'Global Error';
                // return false;
            }

            api.post('/api/upload-pdf', {pdf: this.pdf}, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(r => {

            }).catch(e => this.error = e.response.data.message)
        },
    }
}
