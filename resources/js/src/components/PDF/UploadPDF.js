import api from "../../services/api";

export default {
    name: "UploadPDF",

    data() {
        return {
            pdf: '',
            error: '',
            savingState: []
        }
    },

    mounted() {
        window.Echo.channel('upload-pdf')
            .listen('PDFUploadEvent', (e) => {
                this.savingState.push(e)
            })
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
                return false;
            }

            api.post('/api/upload-pdf', {pdf: this.pdf}, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then(() => this.$refs.uploadPdfForm.reset())
            .catch(e => this.error = e.response.data.message)
        },
    }
}
