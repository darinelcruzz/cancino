<template>
    <div :id="'fiel_' + name"  class="form-group">
        <label :for="name" class="control-label">
            <b>{{ label }}</b>
        </label>

        
        <div class="input-group">
            <span class="input-group-addon"><i :class="'fa fa-' + icon"></i></span>

            <select class="form-control" :id="name" :name="name">
                <option value="" selected="selected">Seleccione el proveedor</option>
                <option v-for="provider in providers" :value="provider.id">{{ provider.business }}</option>
            </select>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['name', 'label', 'icon', 'group'],
        data() {
            return {
                providers: [],
            }
        },
        watch: {
            group: function (newGroup, oldGroup) {
              this.fetchProviders();
            }
        },
        methods: {
            fetchProviders() {
                axios.get('/api/expenses-groups/' + (this.group | "0"))
                  .then(response => {
                    this.providers = response.data
                  })
            }
        },
        created() {
            this.fetchProviders();
        },
    };
</script>