<template>
    <div id="checkup_confirmation">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3">TOTALES</th>
                        </tr>
                        <tr>
                            <th style="width: 40%">Método</th>
                            <th style="width: 30%">Corte</th>
                            <th style="width: 30%">Diferencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in normal">
                            <td>{{ capitalize(item.method) }}</td>
                            <td>{{ item.cut | currency }}</td>
                            <td>{{ item.diff | currency }}</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Sumas</th>
                            <td>{{ cut[0] | currency }}</td>
                            <td>{{ difference[0] | currency }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th style="width: 40%">Método</th>
                            <th style="width: 30%">Corte</th>
                            <th style="width: 30%">Diferencia</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in notes">
                            <td>{{ capitalize(item.method) }}</td>
                            <td>{{ item.cut | currency }}</td>
                            <td>{{ item.diff | currency }}</td>
                        </tr>
                    </tbody>

                    <tfoot>
                        <tr>
                            <th>Sumas</th>
                            <td>{{ cut[1] | currency }}</td>
                            <td>{{ difference[1] | currency }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Público/Shop sin I.V.A.</th>
                            <td>
                                $ <input type="number" name="public" step="0.01" v-model.number="public">
                            </td>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return {
            items: [
                {method: 'efectivo', cut: 0, diff: 0},
                {method: 'cheques', cut: 0, diff: 0},
                {method: 'tarjetas', cut: 0, diff: 0},
                {method: 'steren card', cut: 0, diff: 0},
                {method: 'devoluciones', cut: 0, diff: 0},
                {method: 'credito', cut: 0, diff: 0},
                {method: 'público', cut: 0, diff: 0},
            ],
            normal: [],
            notes: [],
            cut: [],
            difference: [],
            public: 0
        }
    },
    methods: {
        update(array) {
            this.items[array[0]] = array[1]
            this.normal = (this.items.slice(0, 3)).concat(this.items.slice(5, 6))
            this.notes = this.items.slice(3, 5)
            this.cut[0] = this.normal.reduce((total, item) => total + item.cut, 0)
            this.cut[1] = this.notes.reduce((total, item) => total + item.cut, 0)
            this.difference[0] = this.normal.reduce((total, item) => total + item.diff, 0)
            this.difference[1] = this.notes.reduce((total, item) => total + item.diff, 0)
        },
        capitalize(string) {
            return string.charAt(0).toUpperCase() + string.slice(1)
        }
    },
    created() {
        this.$root.$on('checkupdate', (array) => {
            this.update(array)
        })
    },
    updated() {
        this.$root.$emit('updatepublic', this.public)
    },
}
</script>
