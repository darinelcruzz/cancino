<template>
    <div class="row">
        <div class="col-md-8">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width: 50%">Denominación</th>
                        <th style="width: 15%">Cantidad</th>
                        <th style="text-align: right">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(item, index) in cash">
                        <td>
                            $ {{ item.name }}
                            <input type="hidden" :name="'cash[' + index + '][v]'" :value="item.name">
                        </td>
                        <td>
                            <div class="input-group input-group-sm">
                                <input type="number" v-model="item.quantity" class="form-control" min="0">
                                <input type="hidden" :name="'cash[' + index + '][q]'" :value="item.quantity">
                            </div>
                        </td>
                        <td style="text-align: right">$ {{ item.name * item.quantity }}</td>
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
                            <input type="hidden" name="cash_sums[s]" :value="total">
                        </td>
                    </tr>
                    <tr>
                        <th>Corte</th>
                        <td style="text-align: right">
                            <div class="input-group input-group-sm">
                                <input type="number" v-model.number="cut" class="form-control" min="0" step="0.01">
                                <input type="hidden" name="cash_sums[c]" :value="round(cut)">
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Diferencia</th>
                        <td style="text-align: right">
                            {{ difference | currency }}
                            <input type="hidden" name="cash_sums[d]" :value="round(difference)">
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
            cash:[
                {name: 1000, quantity: 0},
                {name: 500, quantity: 0},
                {name: 200, quantity: 0},
                {name: 100, quantity: 0},
                {name: 50, quantity: 0},
                {name: 20, quantity: 0},
                {name: 10, quantity: 0},
                {name: 5, quantity: 0},
                {name: 2, quantity: 0},
                {name: 1, quantity: 0},
                {name: 0.5, quantity: 0},
            ],
            cut: 0
        };
    },
    computed: {
        total() {
            return this.cash.reduce((total, item) => total + (item.name * item.quantity), 0);
        },
        difference() {
            return this.total - this.cut;
        }
    },
    methods: {
        round(value) {
            return Number(Math.round(value + 'e2')+'e-2')
        }
    },
    updated() {
        this.$root.$emit('checkupdate', [0, {method: 'efectivo', cut: this.round(this.cut), diff: this.round(this.difference)}])
    }
}
</script>
