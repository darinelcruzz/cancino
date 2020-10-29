
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Vue from 'vue'
import vSelect from 'vue-select'
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import VueCurrencyFilter from 'vue-currency-filter';
import VueImg from 'v-img';

Vue.use(VueImg);

Vue.use(VueFormWizard)

Vue.use(VueCurrencyFilter,
{
  symbol : '$',
  thousandsSeparator: ',',
  fractionCount: 2,
  fractionSeparator: '.',
  symbolPosition: 'front',
  symbolSpacing: true
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('v-select', vSelect);

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('color-box', require('./components/lte/ColorBox.vue'));
Vue.component('data-table', require('./components/lte/DataTable.vue'));
Vue.component('dropdown', require('./components/lte/DropdownButton.vue'));
Vue.component('ddi', require('./components/lte/DropdownItem.vue'));
Vue.component('file-upload', require('./components/lte/FileUploadInput.vue'));
Vue.component('fu-button', require('./components/lte/FileUploadButton.vue'));
Vue.component('modal', require('./components/lte/Modal.vue'));
Vue.component('modal-button', require('./components/lte/ModalButton.vue'));

Vue.component('file-input', require('./components/FileInput.vue'));
Vue.component('cash-checkup', require('./components/CashCheckup.vue'));
Vue.component('transfer-checkup', require('./components/TransferCheckup.vue'));
Vue.component('cards-checkup', require('./components/CardsCheckup.vue'));
Vue.component('sterencard-checkup', require('./components/SterenCardCheckup.vue'));
Vue.component('online-checkup', require('./components/OnlineCheckup.vue'));
Vue.component('returns-checkup', require('./components/ReturnsCheckup.vue'));
Vue.component('confirm-checkup', require('./components/ConfirmCheckup.vue'));
Vue.component('credit-checkup', require('./components/CreditCheckup.vue'));
Vue.component('employee-week-goal', require('./components/EmployeeWeekGoal.vue'));
Vue.component('employee-sum', require('./components/EmployeeSum.vue'));
Vue.component('week-sum', require('./components/WeekSum.vue'));
Vue.component('goal-sum', require('./components/GoalSum.vue'));
Vue.component('provider-select', require('./components/ProviderSelect.vue'));

Vue.component('supplies', require('./components/Supplies.vue'));
Vue.component('supply', require('./components/Supply.vue'));
Vue.component('supplies-list', require('./components/SuppliesList.vue'));
Vue.component('supplies-list-item', require('./components/SuppliesListItem.vue'));
Vue.component('supplies-list-old-item', require('./components/SuppliesListOldItem.vue'));

const app = new Vue({
    el: '#app',
    data: {
    	binnacle_reason: '',
    	concept: '',
      concept2: '',
    	public_amount: 0,
      products: [],
      product: {},
      wastes: [],
    },
    methods: {
    	submit() {
            if (this.public_amount > 0) {
                this.$refs.cform.submit()
            }
        }
    },
    created(){
        this.$on('updatepublic', (public_amount) => {
            this.public_amount = public_amount
        })

        axios.get('/api/products')
          .then(response => {
            this.products = response.data
          })
    }
});
