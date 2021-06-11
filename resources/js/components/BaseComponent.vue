<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <error-success-component v-if="errorMessagesArray.length > 0" :errors="errorMessagesArray" @close="onClose"></error-success-component>
                    <form enctype="multipart/form-data" @submit.prevent="onSave">
                        <keep-alive>
                            <first-step-component v-if="step === 1"
                                                  @registrationData="setRegisterData"></first-step-component>
                            <second-step-component v-if="step === 2"
                                                   @registrationData="setRegisterData"></second-step-component>
                            <third-step-component v-if="step === 3"
                                                  @registrationData="setRegisterData"></third-step-component>
                        </keep-alive>
                        <buttons-component :step="step" @prev="previous" @next="next"></buttons-component>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "BaseeComponent",
    data() {
        return {
            step: 1,
            registration: {
                name: null,
                email: null,
                phone: null,
                nid: null,
                avatar: null,
                nidFront: null,
                nidBack: null,
                achievements: {
                    education: [],
                    publication: [],
                    experience: []
                }
            },
            errorMessagesArray: []
        }
    },
    methods: {
        previous() {
            this.step--
        },
        next() {
            this.step++
        },
        setRegisterData(data) {
            let properties = ['education', 'publication', 'experience'];
            for (const property in data) {
                if (properties.includes(property)) {
                    this.registration.achievements[property] = data[property]
                } else {
                    this.registration[property] = data[property]
                }
            }
        },
        onSave() {
            let params = new FormData();
            params.append('name', this.registration.name);
            params.append('email', this.registration.email);
            params.append('phone', this.registration.phone);
            params.append('nid', this.registration.nid);
            if (this.registration.avatar) {
                params.append('avatar', this.registration.avatar.target.files[0]);
            }
            if (this.registration.nidFront) {
                params.append('nidFont', this.registration.nidFront.target.files[0]);
            }
            if (this.registration.nidBack) {
                params.append('nidBack', this.registration.nidBack.target.files[0]);
            }
            params.append('educations', this.registration.achievements.education);
            params.append('publications', this.registration.achievements.publication);
            params.append('experiences', this.registration.achievements.experience);
            let obj = this
            axios.post('/registration', params)
                .then(function (response) {
                    alert(response.data.message);
                    location.reload()
                })
                .catch(function (error) {
                    if (error.response.status === 422) {
                        let errors = error.response.data.errors
                        for (const property in errors) {
                            obj.errorMessagesArray.push(errors[property][0]);
                        }
                    }
                });
        },
        onClose() {
            this.errorMessagesArray = []
        }
    }
};
</script>
