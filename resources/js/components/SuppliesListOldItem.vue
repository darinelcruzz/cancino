<template>
	<tr>
		<td v-if="editable"><span style="color: navy;"><i class="fa fa-edit"></i></span></td>
		<td v-else><span style="color: green;"><i class="fa fa-check"></i></span></td>
		<td v-if="supply.supply.byproducts != null">
			{{ supply.description }}
			<input v-if="editable" :name="'supplieso[' + index + '][id]'" type="hidden" :value="supply.id">
		</td>
		<td v-else>
			{{ supply.supply.description }}
			<input v-if="editable" :name="'supplieso[' + index + '][id]'" type="hidden" :value="supply.id">
		</td>
		<td>
			
			<input v-if="editable" type="number" :name="'supplieso[' + index + '][price]'" v-model.number="price" @change="update" class="form-control" min="0.01" step="0.01">
			<span v-else>{{ supply.price.toFixed(2) }}</span>
		</td>
		<td v-if="editable">
			<div class="input-group input-group-sm">
                <input :name="'supplieso[' + index + '][quantity]'" type="number" v-model.number="quantity" @change="update" class="form-control" :min="ratio" :step="ratio">
                <input :name="'supplieso[' + index + '][ratio]'" type="hidden" :value="ratio">
            </div>
		</td>
		<td v-else>
			{{ supply.quantity * supply.ratio }}
		</td>
		<td v-if="editable">
			{{ total.toFixed(2) }}
		</td>
		<td v-else>
			{{ (supply.price * supply.quantity * supply.ratio).toFixed(2) }}
		</td>
	</tr>	
</template>

<script>
	export default {
		props: {supply: Object, editable: {type: Boolean, default: false}, index: Number, model: String},
		data() {
			return {
				quantity: 1,
				price: 0,
				ratio: 1,
			}
		},
		computed: {
			total() {
				return this.quantity * this.price
			}
		},
		methods: {
			destroy() {
				this.$root.$emit('delete', this.index)
			},
			update() {
				this.$root.$emit('sum', this.index, this.total)
			},
		},
		created() {
			this.price = this.supply.price
			this.quantity = this.supply.quantity * this.supply.ratio
			this.ratio = this.supply.ratio
			this.update();
		}
	};
</script>
