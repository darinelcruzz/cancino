<template lang="html">
    <div>
        <div v-for="(input, index) in inputs" class="row">
            <div class="col-md-6 col-md-offset-2">
                <div class="row">
                    <div class="col-md-2">
                        <button @click="deleteRow(index)" type="button" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></button>
                    </div>
                    <div class="col-md-10" align="center">
                        <input type="text" :name="'name' + index" required>
                        <input type="file" :name="'invoice' + index" accept="application/pdf">
                        <input type="hidden" name="quantity" :value="index">
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-6 col-md-offset-1" align="center">
                <button @click="addRow" type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i>Factura</button> <br>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            inputs:[]
        };
    },
    methods: {
        addRow(){
            this.inputs.push({
                id:0,
            })
        },
        deleteRow(index){
            this.inputs.splice(index,1)
        },
    }
}
</script>
