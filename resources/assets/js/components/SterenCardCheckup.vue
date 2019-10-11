<template>
    <table class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>Cliente</th>
          <th>Subtotal</th>
          <th>I.V.A.</th>
          <th>Total</th>
          <th>Observaciones</th>
        </tr>
      </thead>

      <tbody>
        <tr>
          <td>
            Cliente mostrador
          </td>
          <td style="width: 15%">
            <div class="input-group input-group-sm">
                <input name="notes[sub]" type="number" v-model.number="subtotal" class="form-control" min="0" value="0">
            </div>
          </td>
          <td style="width: 15%">
            <div class="input-group input-group-sm">
                <input name="notes[iva]" type="number" v-model.number="iva" class="form-control" min="0" value="0">
            </div>
          </td>
          <td style="width: 15%">
            {{ total | currency }}
            <input type="hidden" name="notes[t]" :value="total.toFixed(2)">
          </td>
          <td style="width: 40%">
            <textarea name="notes[o]" cols="30" rows="1" class="form-control" placeholder="Escribir observaciones aquí..."></textarea>
          </td>
        </tr>
      </tbody>
    </table>
</template>

<script>
export default {
    data(){
        return {
            subtotal: 0,
            iva: 0,
        };
    },
    computed: {
        total() {
            return this.subtotal + this.iva
        }
    }
}
</script>
