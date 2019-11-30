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
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in credit">
                        <td>
                            <a @click="pop(index)" style="color: red"><i class="fa fa-times"></i></a>
                        </td>
                        <td>
                            <input type="text" v-model="item.folio" class="form-control">
                            <input type="hidden" :name="'credit[' + index + '][f]'" :value="item.folio">
                        </td>
                        <td>
                            <select class="form-control" :name="'credit[' + index + '][c]'" v-model="item.client">
                                <option value="">Seleccionar cliente</option>
                                <option v-for="(client, index) in clients" :value="client.id">{{ client.business }}</option>
                            </select>
                        </td>
                        <td>
                            <input type="number" v-model.number="item.amount" class="form-control" min="0" step="0.01">
                            <input type="hidden" :name="'credit[' + index + '][a]'" :value="item.amount">
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
            credit:[],
            clients:[]
        };
    },
    computed: {
        total() {
            return this.credit.reduce((total, item) => total + item.amount, 0);
        }
    },
    methods: {
        add() {
            this.credit.push({folio:'', client: '', amount: 0})
        },
        pop(index) {
            this.credit.splice(index, 1)
        },
        round(value) {
            return Number(Math.round(value + 'e2')+'e-2')
        }
    },
    updated() {
        this.$root.$emit('checkupdate', [5, {method: 'credito', cut: this.round(this.total), diff: 0}])
    },
    created() {
        axios.get("/api/clients")
            .then((response) => {
                this.clients = response.data
            })
    }
}
</script>
