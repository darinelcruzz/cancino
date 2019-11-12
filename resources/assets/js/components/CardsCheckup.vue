<template>
    <div class="row">

        <div class="col-md-4">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th colspan="3">Terminal BBVA</th>
                    </tr>
                    <tr>
                        <th><i class="fa fa-times"></i></th>
                        <th>Folio</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in bbva">
                        <td style="width: 5%">
                            <a @click="popFromBbva(index)" style="color: red"><i class="fa fa-times"></i></a>
                        </td>
                        <td>
                            <input type="text" v-model="item.folio" class="form-control">
                            <input type="hidden" :name="'bbva[' + index + '][f]'" :value="item.folio">
                        </td>
                        <td>
                            <input type="number" v-model.number="item.amount" class="form-control" min="0" step="0.01">
                            <input type="hidden" :name="'bbva[' + index + '][a]'" :value="item.amount">
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            <a @click="addToBbva" class="btn btn-info btn-xs">
                                <i class="fa fa-plus"></i>&nbsp;&nbsp;BBVA
                            </a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="col-md-4">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th colspan="3">Terminal Banamex</th>
                    </tr>
                    <tr>
                        <th><i class="fa fa-times"></i></th>
                        <th>Folio</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in banamex">
                        <td style="width: 5%">
                            <a @click="popFromBanamex(index)" style="color: red"><i class="fa fa-times"></i></a>
                        </td>
                        <td>
                            <input type="text" v-model="item.folio" class="form-control">
                            <input type="hidden" :name="'banamex[' + index + '][f]'" :value="item.folio">
                        </td>
                        <td>
                            <input type="number" v-model.number="item.amount" class="form-control" min="0" step="0.01">
                            <input type="hidden" :name="'banamex[' + index + '][a]'" :value="item.amount">
                        </td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3">
                            <a @click="addToBanamex" class="btn btn-primary btn-xs">
                                <i class="fa fa-plus"></i>&nbsp;&nbsp;BANAMEX
                            </a>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        <div class="col-md-4">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Suma</th>
                        <td style="text-align: right">
                            {{ total | currency }}
                            <input type="hidden" name="card_sums[s]" :value="total">
                        </td>
                    </tr>
                    <tr>
                        <th>Corte</th>
                        <td style="text-align: right">
                            <div class="input-group input-group-sm">
                                <input type="number" v-model.number="cut" class="form-control" min="0" step="0.01">
                                <input type="hidden" name="card_sums[c]" :value="cut">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Diferencia</th>
                        <td style="text-align: right">
                            {{ difference | currency }}
                            <input type="hidden" name="card_sums[d]" :value="difference">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            bbva:[],
            banamex:[],
            cut: 0
        };
    },
    computed: {
        total() {
            return this.banamex.reduce((total, item) => total + item.amount, 0)
                + this.bbva.reduce((total, item) => total + item.amount, 0);
        },
        difference() {
            return this.total - this.cut
        }
    },
    methods: {
        addToBanamex() {
            this.banamex.push({folio:'', amount: 0})
        },
        addToBbva() {
            this.bbva.push({folio:'', amount: 0})
        },
        popFromBanamex(index) {
            this.banamex.splice(index, 1)
        },
        popFromBbva(index) {
            this.bbva.splice(index, 1)
        },
    },
    updated() {
        this.$root.$emit('checkupdate', [2, {method: 'tarjetas', cut: this.cut, diff: this.difference}])
    }
}
</script>
