<template>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <th>Folio</th>
              <th>Cliente</th>
              <th>Total</th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td style="width: 25%">
                <input name="notes[f]" class="form-control" type="text" placeholder="XXXX">
              </td>
              <td>
                Cliente mostrador
              </td>
              <td style="width: 25%">
                <div class="input-group input-group-sm">
                    <input name="notes[a]" type="number" v-model.number="amount" class="form-control" min="0" value="0">
                </div>
              </td>
            </tr>
          </tbody>

          <tfoot>
            <tr>
              <td></td>
              <th style="text-align: right">Suma</th>
              <th>{{ amount | currency }}</th>
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
            amount: 0
        };
    },
    methods: {
        round(value) {
            return Number(Math.round(value + 'e2')+'e-2')
        }
    },
    updated() {
        this.$root.$emit('checkupdate', [3, {method: 'steren card', cut: this.round(this.amount), diff: 0}])
    }
}
</script>
