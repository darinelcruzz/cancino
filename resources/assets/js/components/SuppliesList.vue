<template>
	<div id="supplies-list">
		<table v-if="supplies.length > 0" class="table table-striped table-bordered">
			<thead>
				<tr>
					<th><i class="fa fa-times"></i></th>
					<th style="width: 50%">Producto</th>
					<th style="width: 20%">Precio</th>
					<th style="width: 15%">Cantidad</th>
					<th>Importe</th>
				</tr>
			</thead>

			<tbody>
				<tr v-for="(supply, index) in supplies" :key="supply" is="supplies-list-item" :supply="supply" :model="model" :index="index"></tr>
			</tbody>

			<tfoot>
				<tr>
					<th colspan="3"></th>
					<th>Total</th>
					<td>
						{{ total.toFixed(2) }}
						<input type="hidden" name="amount" :value="total.toFixed(2)">
					</td>
				</tr>
			</tfoot>
		</table>

		<div v-else>
			<code>NO SE HAN AGREGADO PRODUCTOS A LA VENTA, AGREGUE UNO PRESIONANDO</code> <a><i class="fa fa-plus"></i></a>
		</div>
	</div>
</template>

<script>
	export default {
		props: ['model'],
		data() {
			return {
				supplies: [],
				subtotals: [],
			}
		},
		computed: {
			total() {
				return this.subtotals.reduce((total, subtotal) => total + subtotal.amount, 0)
			}
		},
		methods: {
			push(item) {
				this.supplies.push(item)
				if (this.model == 'sale') {
					this.subtotals.push({amount: item.sale_price})
				} else {
					this.subtotals.push({amount: item.purchase_price})
				}
			},
			pop(index) {
				this.supplies.splice(index, 1)
				this.subtotals.splice(index, 1)
			},
			sum(index, amount) {
				this.subtotals[index].amount = amount
			}
		},
		created() {
			this.$root.$on('add', (item) => {
				this.push(item)
			})

			this.$root.$on('delete', (index) => {
				this.pop(index)
			})

			this.$root.$on('sum', (index, amount) => {
				this.sum(index, amount)
			})
		}
	}
</script>
