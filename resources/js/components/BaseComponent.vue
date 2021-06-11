<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <form enctype="multipart/form-data" @submit.prevent="onSave">
                        <keep-alive>
                            <first-step-component v-if="step === 1" @registrationData="setRegisterData"></first-step-component>
                            <second-step-component v-if="step === 2" @registrationData="setRegisterData"></second-step-component>
                            <third-step-component v-if="step === 3"  @registrationData="setRegisterData"></third-step-component>
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
            step:1,
            registration:{
                name:null,
                email:null,
                phone:null,
                nid:null,
                avatar:null,
                nidFront:null,
                nidBack:null,
                achievements: {
                    education : [],
                    publication : [],
                    experience : []
                }
            }
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
            console.log('data')
            console.log(data)
            let properties = ['education', 'publication', 'experience'];
            for (const property in data) {
                if (properties.includes(property)) {
                    this.registration.achievements[property] = data[property]
                } else {
                    this.registration[property] = data[property]
                    console.log('data[property]')
                    console.log(data[property])
                    console.log(property)
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
            console.log(this.registration);

            axios.post('/registration', params)
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    console.log(error);
                });
        }
    }
};
</script>
