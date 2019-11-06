
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
import VueCurrencyFilter from 'vue-currency-filter'

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
Vue.component('returns-checkup', require('./components/ReturnsCheckup.vue'));
Vue.component('confirm-checkup', require('./components/ConfirmCheckup.vue'));

const app = new Vue({
    el: '#app',
    data: {
    	binnacle_reason: '',
    	concept: '',
    },
    methods: {
    	submit() {
            this.$refs.cform.submit()
        }
    }
});
