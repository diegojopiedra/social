<template>
    <div class="profile-image">
        <img :src="image">
    </div>
</template>
<script>
export default {
    props: {
        src: {
            type: String,
            default: ''
        }
    },
    data() {
        return {
            default: '/default.jpg'
        }
    },
    computed:{
        image(){
            let src = this.src
            let def = this.default
            return (src != null && src != '')?src:def
        }
    }
}
</script>
<style lang="sass">
    .profile-image
        img
            width: 4rem
            heigth: 4rem
            border-radius: 3px
</style>