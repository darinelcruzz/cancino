<template>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 1%"><i class="fa fa-times"></i></th>
                        <th style="width: 14%">Folio</th>
                        <th style="width: 35%">Cliente</th>
                        <th style="width: 15%">Total</th>
                        <th style="width: 35%">Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in returns">
                        <td>
                            <a @click="pop(index)" style="color: red"><i class="fa fa-times"></i></a>
                        </td>
                        <td>
                            <input type="text" v-model="item.folio" class="form-control">
                            <input type="hidden" :name="'returns[' + index + '][f]'" :value="item.folio">
                        </td>
                        <td>
                            <input type="text" v-model="item.client" class="form-control">
                            <input type="hidden" :name="'returns[' + index + '][c]'" :value="item.client">
                        </td>
                        <td>
                            <input type="number" v-model.number="item.amount" class="form-control" min="0" step="0.01">
                            <input type="hidden" :name="'returns[' + index + '][a]'" :value="item.amount">
                        </td>
                        <td>
                            <input type="text" v-model.number="item.observations" class="form-control" min="0" step="0.01">
                            <input type="hidden" :name="'returns[' + index + '][o]'" :value="item.observations">
                        </td>
                    </tr>
                </tbody>

                <tfoot>
                    <tr>
                        <th></th>
                        <th>
                            <a @click="add" class="btn btn-success btn-xs"><i class="fa fa-plus"></i> AGREGAR</a>
                        </th>
                        <th style="text-align: right;">Suma</th>
                        <td>{{ total | currency }}</td>
                        <th></th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            returns:[],
        };
    },
    computed: {
        total() {
            return this.returns.reduce((total, item) => total + item.amount, 0)
        }
    },
    methods: {
        add() {
            this.returns.push({folio:'', client: '', amount: 0, observations: ''})
        },
        pop(index) {
            this.returns.splice(index, 1)
        },
    },
    updated() {
        this.$root.$emit('checkupdate', [4, {method: 'devoluciones', cut: this.total, diff: 0}])
    }
}
</script>
