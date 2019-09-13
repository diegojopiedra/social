<template>
    <div class="user">
        <a class="user__pop" :href="link">{{ user.name }} {{ user.lastname }}</a>
        <div class="user__data">
            <div class="card shadow">
                <div class="card-body container-fluid">
                    <div class="row">
                        <div class="col-5">
                            <profile-img
                                :src="user.profile_pic"
                            />
                        </div>
                        <div class="col-7">
                            <div class="mb-2">
                                <small>
                                    <a class="user__pop mb-2" :href="link">@{{ user.username }}</a>
                                </small>
                            </div>
                            <div class="">
                                <follow-btn
                                    :csrf_token="csrf_token"
                                    :id="user.id"
                                />
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: {
        user: {
            type: Object,
            required: true
        },
        link: {
            type: String
        },
        csrf_token: {
            type: String,
            required: true
        }
    }
}
</script>
<style scoped lang="sass">
    .user
        &__pop:hover ~ &__data, &__data:hover
            display: block
        &__data
            position: absolute
            z-index: 2
            display: none
            &::before
                content: ''
                height: .4rem
                width: 100%
                display: block
                margin-top: -.3rem
</style>