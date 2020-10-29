<template>
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <!-- <th>Folio</th> -->
              <th>Método</th>
              <th>Importe</th>
            </tr>
          </thead>

          <tbody>
            <!-- <tr>
              <td>
                <input name="online[folio]" type="text" v-model="folio" class="form-control">
              </td>
              <td>Steren Card Web</td>
              <td style="width: 25%">
                <div class="input-group input-group-sm">
                    <input name="online[card]" type="number" v-model.number="card" class="form-control" min="0" step="0.01" value="0">
                    <input name="online[status]" type="hidden" v-model="status">
                </div>
              </td>
            </tr> -->
            <tr>
              <!-- <td>&nbsp;</td> -->
              <td>Pago Web</td>
              <td style="width: 25%">
                <div class="input-group input-group-sm">
                    <input name="online[web]" type="number" v-model.number="web" class="form-control" min="0" step="0.01" value="0">
                </div>
              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</template>

<script>
export default {
    props: ['stored'],
    data(){
        return {
            web: 0,
            card: 0,
            status: 'pendiente',
            folio: ''
        };
    },
    methods: {
        round(value) {
            return Number(Math.round(value + 'e2')+'e-2')
        }
    },
    updated() {
        this.$root.$emit('checkupdate', [6, {method: 'pago web', cut: this.round(this.web), diff: 0}])
        this.$root.$emit('checkupdate', [7, {method: 'steren card web', cut: this.round(this.card), diff: 0}])
    },
    created() {
      if (this.stored) {
        this.web = Number(this.stored.online.web)
        this.card = Number(this.stored.online.card)
        this.status = this.stored.online.status
        this.folio = this.stored.online.folio
      }
    }
}
</script>
