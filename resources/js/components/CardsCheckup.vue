<template>
    <div class="cards">
        <div class="row">
            <div class="col-md-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3">NET PAY 1</th>
                        </tr>
                        <tr>
                            <th><i class="fa fa-times"></i></th>
                            <th>Folio</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in np1">
                            <td style="width: 5%">
                                <a @click="popFromNP1(index)" style="color: red"><i class="fa fa-times"></i></a>
                            </td>
                            <td>
                                <input type="text" v-model="item.folio" class="form-control" maxlength="4">
                                <input type="hidden" :name="'net_pay_1[' + index + '][f]'" :value="item.folio">
                            </td>
                            <td>
                                <input type="number" v-model.number="item.amount" class="form-control" min="0" step="0.01">
                                <input type="hidden" :name="'net_pay_1[' + index + '][a]'" :value="item.amount">
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <a @click="addToNP1" class="btn btn-github btn-xs">
                                    <i class="fa fa-plus"></i>&nbsp;&nbsp;NET PAY 1
                                </a>
                            </td>
                            <td colspan="1" style="text-align: right;">{{ (np1Total || 0).toFixed(2) | currency }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-md-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3">NET PAY 2</th>
                        </tr>
                        <tr>
                            <th><i class="fa fa-times"></i></th>
                            <th>Folio</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in np2">
                            <td style="width: 5%">
                                <a @click="popFromNP2(index)" style="color: red"><i class="fa fa-times"></i></a>
                            </td>
                            <td>
                                <input type="text" v-model="item.folio" class="form-control" maxlength="4">
                                <input type="hidden" :name="'net_pay_2[' + index + '][f]'" :value="item.folio">
                            </td>
                            <td>
                                <input type="number" v-model.number="item.amount" class="form-control" min="0" step="0.01">
                                <input type="hidden" :name="'net_pay_2[' + index + '][a]'" :value="item.amount">
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="2">
                                <a @click="addToNP2" class="btn btn-github btn-xs">
                                    <i class="fa fa-plus"></i>&nbsp;&nbsp;NET PAY 2
                                </a>
                            </td>
                            <td colspan="1" style="text-align: right;">{{ (np2Total || 0).toFixed(2) | currency }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="col-md-3">
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
                                <input type="text" v-model="item.folio" class="form-control" maxlength="4">
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

            <div class="col-md-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3">Terminal Clip <i class="fa fa-plus"></i></th>
                        </tr>
                        <tr>
                            <th><i class="fa fa-times"></i></th>
                            <th>Folio</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in clip">
                            <td style="width: 5%">
                                <a @click="popFromClip(index)" style="color: red"><i class="fa fa-times"></i></a>
                            </td>
                            <td>
                                <input type="text" v-model="item.folio" class="form-control" maxlength="4">
                                <input type="hidden" :name="'clip[' + index + '][f]'" :value="item.folio">
                            </td>
                            <td>
                                <input type="number" v-model.number="item.amount" class="form-control" min="0" step="0.01">
                                <input type="hidden" :name="'clip[' + index + '][a]'" :value="item.amount">
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3">
                                <a @click="addToClip" class="btn btn-warning btn-xs">
                                    <i class="fa fa-plus"></i>&nbsp;&nbsp;Clip
                                </a>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-3">
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
                                <input type="text" v-model="item.folio" class="form-control" maxlength="4">
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
            <div class="col-md-3">
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
                                    <input type="hidden" name="card_sums[c]" :value="round(cut)">
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <th>Diferencia</th>
                            <td style="text-align: right">
                                {{ difference | currency }}
                                <input type="hidden" name="card_sums[d]" :value="round(difference)">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['stored'],
    data(){
        return {
            np1:[],
            np2:[],
            bbva:[],
            banamex:[],
            clip:[],
            cut: 0
        };
    },
    computed: {
        np1Total() {
            return this.np1.reduce((total, item) => total + item.amount, 0);
        },
        np2Total() {
            return this.np2.reduce((total, item) => total + item.amount, 0);
        },
        total() {
            return this.round(this.banamex.reduce((total, item) => total + item.amount, 0)
                + this.np1.reduce((total, item) => total + item.amount, 0)
                + this.np2.reduce((total, item) => total + item.amount, 0)
                + this.bbva.reduce((total, item) => total + item.amount, 0)
                + this.clip.reduce((total, item) => total + item.amount, 0));
        },
        difference() {
            return this.round(this.total - this.cut);
        }
    },
    methods: {
        addToNP1() {
            this.np1.push({folio:'', amount: 0})
        },
        addToNP2() {
            this.np2.push({folio:'', amount: 0})
        },
        addToBanamex() {
            this.banamex.push({folio:'', amount: 0})
        },
        addToBbva() {
            this.bbva.push({folio:'', amount: 0})
        },
        addToClip() {
            this.clip.push({folio:'', amount: 0})
        },
        popFromNP1(index) {
            this.np1.splice(index, 1)
        },
        popFromNP2(index) {
            this.np2.splice(index, 1)
        },
        popFromBanamex(index) {
            this.banamex.splice(index, 1)
        },
        popFromBbva(index) {
            this.bbva.splice(index, 1)
        },
        popFromClip(index) {
            this.clip.splice(index, 1)
        },
        round(value) {
            return Number(Math.round(value + 'e2')+'e-2')
        }
    },
    updated() {
        this.$root.$emit('checkupdate', [2, {method: 'tarjetas', cut: this.round(this.cut), diff: this.round(this.difference)}])
    },
    created() {
        if (this.stored) {

            if (this.stored.bbva) {
                for (var i = this.stored.bbva.length - 1; i >= 0; i--) {
                    this.bbva.push({
                        folio: this.stored.bbva[i]['f'],
                        amount: Number(this.stored.bbva[i]['a'])
                    })
                }
            }

            if (this.stored.banamex) {
                for (var i = this.stored.banamex.length - 1; i >= 0; i--) {
                    this.banamex.push({
                        folio: this.stored.banamex[i]['f'],
                        amount: Number(this.stored.banamex[i]['a'])
                    })
                }
            }

            if (this.stored.clip) {
                for (var i = this.stored.clip.length - 1; i >= 0; i--) {
                    this.clip.push({
                        folio: this.stored.clip[i]['f'],
                        amount: Number(this.stored.clip[i]['a'])
                    })
                }
            }

            if (this.stored.net_pay_1) {
                for (var i = this.stored.net_pay_1.length - 1; i >= 0; i--) {
                    this.np1.push({
                        folio: this.stored.net_pay_1[i]['f'],
                        amount: Number(this.stored.net_pay_1[i]['a'])
                    })
                }
            }

            if (this.stored.net_pay_2) {
                for (var i = this.stored.net_pay_2.length - 1; i >= 0; i--) {
                    this.np2.push({
                        folio: this.stored.net_pay_2[i]['f'],
                        amount: Number(this.stored.net_pay_2[i]['a'])
                    })
                }
            }

            this.cut = this.stored.card_sums.c
        }
    }
};
</script>
