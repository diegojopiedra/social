<template>
    <div class="image-btn mb-2">
        <input type="file" :name="name"  multiple style="display: none" ref="input" @change="imgs">
        <button class="btn btn-primary" type="button" @click="click">
            Selecionar imagenes
        </button>
    </div>
</template>
<script>
export default {
    props: {
        name: {
            type: String,
            required: true
        }
    },
    methods: {
        click(){
            this.$refs.input.click()
        },
        imgs(event){
            let self = this
            let files = event.target.files

            let reader = new FileReader()

            reader.onload = function(e) {
                self.list = e.target.result
            }
            
            console.log(files)

            for (let index = 0; index < files.length; index++) {
                let a = reader.readAsDataURL(event.target.files[index])
                console.log('a', a)
            }
            
        }
    },
    data(){
        return {
            list: []
        }
    },
    computed: {
        urls(){
            return this.list.map(e => e.result)
        }
    }
}
</script>