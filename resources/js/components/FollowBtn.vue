<template>
    <button 
        class="follow-btn btn btn-sm" 
        :class="{'btn-primary':  !follow, 'btn-secondary': follow}"
        @click="following()"
    >
        <span v-if="!follow">
            Segir
        </span>
        <span v-else>
            Dejar de segir
        </span>
    </button>
</template>
<script>
export default {
    props: {
        isFollow: {
            type: Boolean,
            default: false
        },
        csrf_token: {
            type: String,
            required: true
        },
        id: {
            type: Number
        }
    },
    data(){
        return {
            follow: false
        }
    },
    mounted() {
        this.follow = this.isFollow
    },
    methods: {
        following(){
            fetch(`/follow/${this.id}`, {
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrf_token
                }
            }).then(res => res.json())
            .then(response => this.follow = response)
            .catch(error => console.error('Error:', error));
        }
    }
}
</script>