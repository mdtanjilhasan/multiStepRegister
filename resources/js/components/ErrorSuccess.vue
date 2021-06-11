<template>
    <div>
        <div class="alert  alert-dismissible fade show" role="alert">
            <ul>
                <li v-for="(value,key) in errors" :key="key">
                    <strong>{{ value }}</strong>
                </li>
            </ul>
            <button type="button" @click.prevent="onClose" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "ErrorSuccess",
    props: ['errors'],
    methods: {
        onClose() {
            this.$emit('close')
        }
    }
}
</script>

<style scoped>

</style>
