
var app = new Vue({ el: '#app',
    data(){
        return {
            filesOrder: [],
            filesFinish: [],
            fileProgress: 0,
            fileCurrent: '',
            info: null

        }
    },
    mounted() {
        axios
            .get('import/list')
            .then(response => (this.info = response.data));
    },
    methods: {

        async fileInputChange(){
            let files = Array.from(event.target.files);
            this.filesOrder = files.slice();
            for( let item of files){
                await this.uploadFile(item);
            }
        }

    },
    async uploadFile(item){
        let form = new FormData();
        form.append('image', item)
    }
});