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
            },
            imgEventArr: {
                avatar: '',
                nidFront: '',
                nidBack: '',
            }

        }
    },
    methods: {
        imageUpload(event,type) {
            if (type === 'avatar') {
                let file = event.target.files[0]
                this.imageArray.avatar = URL.createObjectURL(file)
                this.imgEventArr.avatar = event
            }
            if (type === 'nid_front') {
                let file = event.target.files[0]
                this.imageArray.nidFront = URL.createObjectURL(file)
                this.imgEventArr.nidFront = event
            }
            if (type === 'nid_back') {
                let file = event.target.files[0]
                this.imageArray.nidBack = URL.createObjectURL(file)
                this.imgEventArr.nidBack = event
            }
            this.$emit('registrationData',this.imgEventArr);
        }
    },
    activated() {
        if (this.imgEventArr) {
            this.$emit('registrationData',this.imgEventArr);
        }
    }
}
</script>

<style scoped>

</style>
