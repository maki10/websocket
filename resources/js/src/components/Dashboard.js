import api from "../services/api";
import __ from "lodash";

export default {
    name: "Dashboard",

    data() {
        return {
            link: '/api/get-my-pdfs',
            pdfs: {
                data: [],
                meta: {},
                links: {}
            },
            searchPdfs:[],
            search: ''
        }
    },

    mounted() {
        window.Echo.channel('pdf')
            .listen('PDFEvent', (e) => {
                this.searchPdfs.push(e)
            })

        this.getMyPDFs()
    },

    methods: {
        getMyPDFs() {
            api.get(this.link)
                .then(r => this.pdfs = r.data)
        },

        paginate(link) {
            this.link = link

            this.getMyPDFs()
        },

        findPdfs(val) {
            this.searchPdfs = [];

            if (!val) {
                return;
            }

            api.post('api/search-pdf', {search: val}).then()
        }
    },

    watch: {
        search: __.debounce(function (val) {
            this.findPdfs(val)
        }, 500)
    }
}
