<template>
	<div id="supplies-list">
		<table v-if="supplies.length > 0 || old" class="table table-striped table-bordered">
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
				<tr v-for="(supply, index) in old" :key="supply.id" is="supplies-list-old-item" :supply="supply" :editable="editable" :index="index"></tr>
				<tr v-for="(supply, index) in supplies" :key="supply.id" is="supplies-list-item" :supply="supply" :model="model" :index="index"></tr>
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
		props: {
			model: String, 
			old: Array, 
			editable: {type: Boolean, default: false}
		},
		data() {
			return {
				supplies: [],
				subtotals: [],
				amount: 0,
			}
		},
		computed: {
			total() {
				return this.amount + this.subtotals.reduce((total, subtotal) => total + subtotal.amount, 0)
			}
		},
		methods: {
			push(item) {
				this.supplies.push(item)
				if (this.model == 'sale') {
					this.subtotals.push({amount: item.supply.sale_price * item.supply.ratio})
				} else {
					this.subtotals.push({amount: item.supply.purchase_price})
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
			if (this.old) {
				if (this.editable) {
					for (var i = this.old.length - 1; i >= 0; i--) {
						let old = this.old[i];
						this.subtotals.push({amount: old.price * old.quantity});
					}
				} else {
					this.amount = this.old.reduce((total, item) => total + (item.price * item.quantity), 0)
				}
			}

			this.$root.$on('add', (item) => {
				this.push(item)
			})

			this.$root.$on('delete', (index) => {
				this.pop(index)
			})

			this.$root.$on('sum', (index, amount) => {
				this.sum(index, amount)
			})

			this.$root.$on('reset', () => {
				this.supplies = [];
				this.subtotals = [];
			})
		}
	}
</script>
