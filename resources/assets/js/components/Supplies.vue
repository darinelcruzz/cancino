<template>
    <div id="supplies">

        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                    <button type="button" @click="fetch(pagination.first)" :disabled="!pagination.first" :class="'btn btn-' + color + ' btn-sm'">
                        <i class="fa fa-angle-double-left"></i>
                    </button>
                    <button type="button" @click="fetch(pagination.prev)" :disabled="!pagination.prev" :class="'btn btn-' + color + ' btn-sm'">
                        <i class="fa fa-angle-left"></i>
                    </button>
                    <button type="button" class="btn btn-default btn-sm">Página {{ pagination.current }} de {{ pagination.last_page }}</button>
                    <button type="button" @click="fetch(pagination.next)" :disabled="!pagination.next" :class="'btn btn-' + color + ' btn-sm'">
                        <i class="fa fa-angle-right"></i>
                    </button>
                    <button type="button" @click="fetch(pagination.last)" :disabled="!pagination.last" :class="'btn btn-' + color + ' btn-sm'">
                        <i class="fa fa-angle-double-right"></i>
                    </button>
                </div>
            </div>

            <div class="col-md-6 pull-right">
                <div class="input-group input-group-sm">
                    <input type="text" v-model="keyword" class="form-control" @change="fetch()">
                    <span class="input-group-btn">
                      <button type="button" :class="'btn btn-' + color + ' btn-flat'">
                          <i class="fa fa-search"></i>
                      </button>
                    </span>
                </div>
            </div>

        </div>

        <br>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th><i class="fa fa-barcode"></i></th>
                        <th>Descripción</th>
                        <th style="width: 30%; text-align: right">Precio</th>
                    </tr>
                </thead>

                <tbody>
                    <tr v-for="(supply, index) in supplies" :key="index" is="supply" :supply="supply"></tr>
                </tbody>
            </table>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['color'],
        data() {
            return {
                supplies: [],
                pagination: {},
                keyword: ''
            }
        },
        methods: {
            paginate(data) {
                return {
                    current: data.current_page,
                    last_page: data.last_page,
                    next: data.next_page_url,
                    prev: data.prev_page_url,
                    last: data.last_page_url,
                    first: data.first_page_url,
                }
            },
            fetch(page_url) {
                page_url = page_url || '/api/supplies/' + this.keyword

                console.log(page_url)

                axios.get(page_url).then((response) => {
                    var supplies = response.data.data.map((item) => {
                        return item
                    })

                    this.supplies = supplies
                    this.pagination = this.paginate(response.data)
                })  
            },
        },
        created() {
            this.fetch();
        }
    }
</script>
