<template>
    <div class="custom-photos">
        <div 
            class="galery"
            :class="{'one':length == 1, 'double-col': (length == 2 || length > 3), 'three': length == 3}"
        >
            <template v-for="(photo, i) in photos">
                <template  v-if="i == 3 && length > 4">
                    <div class="galery__more" :more="'+' + (length - 4) " :key="i + 'more'"  @click="open(i)">
                        <img class="galery__item"  :src="photo" :key='photo'>
                    </div>
                </template>
                <template v-else>
                    <img class="galery__item"  :src="photo" :key='photo' @click="open(i)">
                </template>
            </template>
        </div>
        <vue-easy-lightbox
            :visible="box"
            :imgs="photos"
            :index="index"
            @hide="box = false"
        ></vue-easy-lightbox>
    </div>
    
</template>
<script>
export default {
    data() {
        return {
            box: false,
            index: 0
        }
    },
    props:{
        photos: {
            type: Array,
            default() {
                return []
            }
        }
    },
    computed: {
        length() {
            return this.photos.length
        }
    },
    methods: {
        open(index){
            this.index = index
            this.box = true
        }
    }
}
</script>