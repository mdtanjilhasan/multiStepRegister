<template>
    <div>
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <keep-alive>
                        <first-step-component v-if="step === 1" @registrationData="setRegisterData"></first-step-component>
                        <second-step-component v-if="step === 2" @registrationData="setRegisterData"></second-step-component>
                        <third-step-component v-if="step === 3"  @registrationData="setRegisterData"></third-step-component>
                    </keep-alive>
                    <buttons-component :step="step" @prev="previous" @next="next" @onSubmit="onSubmit"></buttons-component>
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
                nidFont:null,
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
            let properties = ['education', 'publication', 'experience'];
            for (const property in data) {
                if (properties.includes(property)) {
                    this.registration.achievements[property] = data[property]
                } else {
                    this.registration[property] = data[property]
                }
            }
        },
        onSubmit() {

        }
    }
};
</script>
