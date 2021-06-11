<template>
    <div>
        <div class="form-group">
            <label for="avatar">Avatar</label>
            <input type="file" accept="image/*" @change="imageUpload($event, 'avatar')" class="form-control-file"
                   id="avatar">
            <div id="preview_avatar" class="mt-3 mb-3">
                <img v-if="imageArray.avatar" :src="imageArray.avatar" class="img-fluid" alt="preview image">
            </div>
        </div>

        <div class="form-group">
            <label for="nid_front">NID Front</label>
            <input type="file" accept="image/*" @change="imageUpload($event, 'nid_front')" class="form-control-file"
                   id="nid_front">
            <div id="preview_nid_front" class="mt-3 mb-3">
                <img v-if="imageArray.nidFront" :src="imageArray.nidFront" class="img-fluid" alt="preview image">
            </div>
        </div>

        <div class="form-group">
            <label for="nid_back">NID Back</label>
            <input type="file" accept="image/*" @change="imageUpload($event,'nid_back')" class="form-control-file"
                   id="nid_back">
            <div id="preview_nid_back" class="mt-3 mb-3">
                <img v-if="imageArray.nidBack" :src="imageArray.nidBack" class="img-fluid" alt="preview image">
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "StepThreeComponent",
    data() {
        return {
            imageArray: {
                avatar: '',
                nidFront: '',
                nidBack: '',
            }
        }
    },
    methods: {
        imageUpload(event,type) {
            const file = event.target.files[0]
            if (type === 'avatar') {
                this.imageArray.avatar = URL.createObjectURL(file)
            }
            if (type === 'nid_front') {
                this.imageArray.nidFront = URL.createObjectURL(file)
            }
            if (type === 'nid_back') {
                this.imageArray.nidBack = URL.createObjectURL(file)
            }
            this.$emit('registrationData',this.imageArray);
        }
    },
    created() {
        console.log('three component created')
    },
    destroyed() {
        console.log('three component destroyed')
    },
    activated() {
        console.log('three component Active')
    },
    deactivated() {
        console.log('three component Inactive')
    }
}
</script>

<style scoped>

</style>
