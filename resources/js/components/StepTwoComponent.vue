<template>
    <div>
        <h1>Step Two</h1>
        <div class="form-group">
            <label>Education <button type="button" class="btn btn-info btn-sm" @click.prevent="addRow('education')">Add row</button></label>
            <div v-for="(value, key) in data.education">
                <input type="text" class="form-control mb-1" :id="'education_' + key" v-model="data.education[key]" @input="registrationData($event, 'education', key)" placeholder="Enter Education">
                <button v-if="key > 0" type="button" @click.prevent="deleteRow(key,'education')" class="btn btn-danger btn-sm mb-1">X</button>
            </div>
        </div>

        <div class="form-group">
            <label>Publications <button type="button" class="btn btn-info btn-sm" @click.prevent="addRow('publication')">Add row</button></label>
            <div v-for="(value, key) in data.publication">
                <input type="text" class="form-control mb-1" :id="'publication_' + key" v-model="data.publication[key]" @input="registrationData($event, 'publication', key)" placeholder="Enter Publication">
                <button v-if="key > 0" type="button" @click.prevent="deleteRow(key, 'publication')" class="btn btn-danger btn-sm mb-1">X</button>
            </div>
        </div>

        <div class="form-group">
            <label>Experience <button type="button" class="btn btn-info btn-sm" @click.prevent="addRow('experience')">Add row</button></label>
            <div v-for="(value, key) in data.experience">
                <input type="text" class="form-control mb-1" :id="'experience_' + key" v-model="data.experience[key]" @input="registrationData($event, 'experience', key)" placeholder="Enter Experience">
                <button v-if="key > 0" type="button" @click.prevent="deleteRow(key, 'experience')" class="btn btn-danger btn-sm mb-1">X</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "StepTwoComponent",
    data() {
      return {
          data:{
              education : [''],
              publication : [''],
              experience : ['']
          }
      }
    },
    methods: {
        addRow(type) {
            if (type === 'education') {
                this.data.education.push('')
            }
            if (type === 'experience') {
                this.data.experience.push('')
            }
            if (type === 'publication') {
                this.data.publication.push('')
            }
        },
        deleteRow(index,type) {
            if (type === 'education') {
                this.data.education.splice(index,1)
            }
            if (type === 'experience') {
                this.data.experience.splice(index,1)
            }
            if (type === 'publication') {
                this.data.publication.splice(index,1)
            }
        },
        registrationData(event, type, index) {
            if (type === 'education') {
                this.data.education[index] = event.target.value
            }
            if (type === 'experience') {
                this.data.experience[index] = event.target.value
            }
            if (type === 'publication') {
                this.data.publication[index] = event.target.value
            }
            console.log(this.data)
            this.$emit('registrationData',this.data);
        }
    },
    created() {
        console.log('Two created')
    },
    destroyed() {
        console.log('Two destroyed')
    },
    activated() {
        console.log('Two Active')
    },
    deactivated() {
        console.log('Two Inactive')
    }
}
</script>

<style scoped>

</style>
