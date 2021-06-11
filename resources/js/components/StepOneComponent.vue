<template>
    <div>
        <h1>Step One</h1>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" placeholder="Enter Name" v-model="registration.name" @input="registrationData">
        </div>

        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" v-model="registration.email" @input="registrationData">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" class="form-control" id="phone" placeholder="Enter Phone" v-model="registration.phone" @input="registrationData">
        </div>

        <div class="form-group">
            <label for="nid">NID</label>
            <input type="text" class="form-control" id="nid" placeholder="Enter NID" v-model="registration.nid" @input="registrationData">
        </div>
    </div>
</template>

<script>
export default {
    name: "StepOneComponent",
    data() {
      return {
          registration: {
              name:null,
              email:null,
              phone:null,
              nid:null
          }
      }
    },
    methods:{
      registrationData() {
          this.$emit('registrationData',this.registration);
      }
    },
    created() {
        console.log('StepOneComponent created')
    },
    destroyed() {
        console.log('StepOneComponent destroyed')
    },
    activated() {
        console.log('StepOneComponent Active')
    },
    deactivated() {
        console.log('StepOneComponent Inactive')
    }
}
</script>

<style scoped>

</style>
