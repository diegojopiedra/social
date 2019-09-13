<template>
    <form :action="action" method="POST" enctype="multipart/form-data">
        <input type="file" name="images[]" multiple v-if="action.split('/').pop() == 'tweet'">
        <!-- <image-btn name="images[]" v-if="action.split('/').pop() == 'tweet'"></image-btn> -->
        <input type="hidden" name="_token" :value="crsf">
        <div class="form-group">
            <textarea 
                class="form-control" 
                :class="{'is-invalid': error}" 
                rows="3" 
                :placeholder="placeholder" 
                v-model="text"
                name="text"
            >
            </textarea>
            <small :class="{'text-danger': error}">{{ length }}/280</small>
        </div>
        <button 
            class="btn float-right" 
            :disabled="!sendable" 
            :class="{'btn-primary': sendable, 'btn-secondary': !sendable}"
        >
            <i class="fas fa-feather-alt"></i> {{ btn }}
        </button>
    </form>
</template>

<script>
export default {
    props: {
        placeholder: {
            type: String
        },
        crsf: {
            type: String,
            required: true
        },
        btn: {
            type: String
        },
        action: {
            type: String
        }
    },
    computed: {
        length() {
            return this.text.length
        },
        error() {
            return this.length > 280
        },
        sendable() {
            return !this.error && this.length > 0
        }
    },
    data() {
        return {
            text: ''
        }
    }
}
</script>