<template>
	<tr>
		<td>
			<a @click="destroy" style="color: red;">
				<i class="fa fa-times"></i>
			</a>
		</td>
		<td>
			<div v-if="supply.supply.byproducts != null">
				<select class="form-control" v-model="byproduct" @change="updateByproduct">
					<option v-for="item in supply.supply.byproducts" :value="item">{{ item.name }}</option>
				</select>
				<input type="hidden" :name="'supplies[' + index + '][description]'" :value="byproduct.name">
				<input type="hidden" :name="'supplies[' + index + '][ratio]'" :value="byproduct.ratio">
            </div>
            <div v-else>
            	{{ supply.supply.description }}
            </div>
			<input type="hidden" :name="'supplies[' + index + '][supply_id]'" :value="supply.supply.id">
		</td>
		<td v-if="model == 'purchase'">
			<input type="number" :name="'supplies[' + index + '][price]'" v-model.number="price" @change="update" class="form-control" min="1" step="0.01">
		</td>
		<td v-else>
			{{ price }}
			<input :name="'supplies[' + index + '][price]'" type="hidden" :value="price">
		</td>
		<td>
			<div class="input-group input-group-sm">
                <input type="number" v-model.number="quantity" @change="update" class="form-control" :step="ratio" :min="ratio" :max="model == 'sale' ? supply.quantity * ratio: 999">
                <input :name="'supplies[' + index + '][quantity]'" type="hidden" :value="quantity / ratio">
            </div>
		</td>
		<td>
			{{ total.toFixed(2) }}
		</td>
	</tr>	
</template>

<script>
	export default {
		props: ['supply', 'index', 'model'],
		data() {
			return {
				quantity: 1,
				price: 0,
				ratio: 1,
				byproduct: '',
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
			updateByproduct() {
				this.ratio = this.byproduct.ratio
				this.price = this.byproduct.price
			}
		},
		created() {
			this.price = this.model == 'sale' ? this.supply.supply.sale_price: this.supply.supply.purchase_price
			this.byproduct = this.supply.supply.byproducts != null ? this.supply.supply.byproducts[0]: ''
			this.quantity = this.supply.supply.byproducts != null ? this.supply.supply.byproducts[0].ratio: 1
			this.ratio = this.supply.supply.byproducts != null ? this.supply.supply.byproducts[0].ratio: 1
			this.price = this.supply.supply.byproducts != null ? this.supply.supply.byproducts[0].price: this.price
		}
	};
</script>
