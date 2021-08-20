<template lang="html">
    <div>
        <table class="table">
            <thead>
                <th style="width: 5%"><small><i class="fa fa-times"></i></small></th>
                <th style="width: 35%"><small>CONCEPTO</small></th>
                <th style="width: 25%"><small>MONTO</small></th>
                <th style="width: 35%;"><small>ARCHIVO</small></th>
            </thead>

            <tbody>
                <tr v-for="(input, index) in inputs">
                    <td>
                        <a href="" @click="remove(index)" style="color: red;"><i class="fa fa-times"></i></a>
                    </td>
                    <td>
                        <input type="text" class="form-control input-sm" :name="'invoices[' + index + '][name]'" required placeholder="Gastos por...">
                    </td>
                    <td>
                        <input type="number" class="form-control input-sm" step="0.01" :name="'invoices[' + index + '][amount]'" required min="0" value="0">
                    </td>
                    <td style="text-align: right;">
                        <label class="label">
                            <input type="file" :name="'invoices[' + index + '][file]'" accept="application/pdf" required @change="fileSelected(input)">
                            <span>{{ input.label }}</span>
                        </label>
                        <input type="hidden" name="quantity" :value="index">
                    </td>
                </tr>
            </tbody>

            <tfoot>
                <tr>
                    <td colspan="4">
                        <button @click="add" type="button" class="btn btn-success btn-xs">
                            <small><i class="fa fa-plus"></i>&nbsp;&nbsp;FACTURA</small>
                        </button>
                    </td>
                </tr>
            </tfoot>
        </table>
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
        add(){
            this.inputs.push({id:0, label: 'Selecciona un PDF'});
        },
        remove(index){
            this.inputs.splice(index,1);
        },
        fileSelected(file) {
            file.label = 'LISTO'
        }
    }
};
</script>

<style>
    label.label input[type="file"] {
        position: absolute;
        top: -1000px;
    }
    .label {
        cursor: pointer;
        border: 1px solid #cccccc;
        border-radius: 5px;
        padding: 5px 15px;
        margin: 5px;
        background: #dddddd;
        color: black;
        display: inline-block;
    }
    .label:hover {
        background: #5cbd95;
        color: white;
    }
    .label:active {
        background: #008548;
        color: white;
    }
    .label:invalid + span {
        color: white;
        background: #dd4b39;
    }
    .label:valid + span {
        color: white;
        background: navy;
    }
</style>
