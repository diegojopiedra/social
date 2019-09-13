<template>
    <button 
        type="button" 
        class="btn btn-sm" 
        :class="{'btn-outline-danger': !like, 'btn-danger': like}" 
        @click="click()">
        {{ likes }} <slot></slot>
    </button>
</template>
<script>
export default {
    props: {
        init: {
            type: String,
            default(){
                return ''
            }
        },
        num: {
            type: Number,
            default: 0
        },
        url: {
            type: String
        }
    },
    data(){
        return {
            like: false,
            likes: 0
        }
    },
    mounted(){
        this.like = this.init == '1'
        this.likes = this.num
    },
    methods: {
        click(){
            this.like = !this.like
            if(this.like){
                this.likes ++
            }else{
                this.likes --
            }
            fetch(this.url)
        }
    }
}
</script>