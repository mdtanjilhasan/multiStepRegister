<template>
    <div>
        <button v-if="step > 1" type="button" class="btn btn-primary" @click.prevent="$emit('prev', step);">Previous</button>
        <button v-if="step < 3" type="button" class="btn btn-primary" @click.prevent="$emit('next', step);">Next</button>
        <button v-if="step === 3" type="submit" class="btn btn-success">Submit</button>
    </div>
</template>

<script>
export default {
    name: "ButtonsComponent",
    props: ['step']
}
</script>

<style scoped>

</style>
