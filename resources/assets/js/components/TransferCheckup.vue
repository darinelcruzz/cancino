<template>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 5%"><i class="fa fa-times"></i></th>
                        <th style="width: 25%">Tipo</th>
                        <th style="width: 45%">Cliente</th>
                        <th style="text-align: right">Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in checks">
                        <td>
                            <a @click="pop(index)" style="color: red"><i class="fa fa-times"></i></a>
                        </td>
                        <td>
                            <select v-model="item.type" class="form-control">
                                <option value="">Selecciona tipo</option>
                                <option value="cheque">Cheque</option>
                                <option value="transferencia">Transferencia</option>
                            </select>
                            <input type="hidden" :name="'transfer[' + index + '][t]'" :value="item.type">
                        </td>
                        <td>
                            <input type="text" v-model="item.client" class="form-control">
                            <input type="hidden" :name="'transfer[' + index + '][c]'" :value="item.client">
                        </td>
                        <td>
                            <input type="number" v-model.number="item.amount" class="form-control" min="0" step="0.01">
                            <input type="hidden" :name="'transfer[' + index + '][a]'" :value="item.amount">
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="col-md-4">
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Suma</th>
                        <td style="text-align: right">
                            {{ total | currency }}
                            <input type="hidden" name="transfer_sums[s]" :value="total">
                        </td>
                    </tr>
                    <tr>
                        <th>Corte</th>
                        <td style="text-align: right">
                            <div class="input-group input-group-sm">
                                <input type="number" v-model.number="cut" class="form-control" min="0" step="0.01">
                                <input type="hidden" name="transfer_sums[c]" :value="cut">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Diferencia</th>
                        <td style="text-align: right">
                            {{ difference | currency }}
                            <input type="hidden" name="transfer_sums[d]" :value="difference">
                        </td>
                    </tr>
                    <tr>
                        <th></th>
                        <td style="text-align: right">
                            <a @click="add" class="btn btn-success btn-xs"><i class="fa fa-plus"></i></a>
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
            checks:[],
            cut: 0
        };
    },
    computed: {
        total() {
            return this.checks.reduce((total, item) => total + item.amount, 0)
        },
        difference() {
            return this.total - this.cut
        }
    },
    methods: {
        add() {
            this.checks.push({type:'', client: '', amount: 0})
        },
        pop(index) {
            this.checks.splice(index, 1)
        },
    },
    updated() {
        this.$root.$emit('checkupdate', [1, {method: 'cheques', cut: this.cut, diff: this.difference}])
    }
}
</script>
