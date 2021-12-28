<template>
    <div class="container">
        <div class="text-center" style="margin: 20px 0px 20px 0px;">
            <a href="https://shouts.dev/" target="_blank"><img src="https://i.imgur.com/hHZjfUq.png"></a><br>
            <span class="text-secondary">Dependent Dropdown with Laravel and VueJS</span>
        </div>
        <div class="row justify-content-center" style="margin: 20px 0px 20px 0px;">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <div class="form-group">
                            <label for="classAssigned_from_id">Select Class:</label>
                            <select class='form-control' name="classAssigned_from_id"
                            v-model="inputs.from.classAssigned_from_id">
                                <option v-for="classAssigned in classes" v-bind:key="'from-'+classAssigned.id" :value='classAssigned.id'>{{ classAssigned.name }}</option>
                            </select>
                        </div>
                       <div class="card-body">
                        <div class="form-group">
                            <label for="section_from_id">Select Section:</label>
                            <select class='form-control' name="section_from_id" v-model="inputs.from.section_from_id">
                                <option v-for="section in sections" v-bind:key="'from-'+section.id" :value='section.id'>{{ section.name }}</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
    class: {},
    selectedClass:"",
    selectedSection: "",
    sections: {},
    }
},
  selectedClass: function(value) {
            this.selectedSection = "";
            axios
                .get("/api/sections?class_id=" + this.selectedClass)
                .then(response => {
                    this.sections = response.data.data;
                });
            this.getStudents();
        },
        selectedSection: function(value) {
            this.getStudents();
        },
}
</script>

<style>

</style>
