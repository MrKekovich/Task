<template>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" v-model="date" placeholder="YYYY-MM-DD">
                    <button class="btn btn-primary" type="button" @click="getDeliver(date)">Get Deliver</button>
                </div>
                <div class="mb-1">
<!--                    <label for="selectDate" class="form-label">Select Date:</label>-->
<!--                    <div class="input-group mb-3">-->
<!--                        <select class="form-select" id="selectDate" v-model="selectedDate" v-if="!loading">-->
<!--                            <option v-for="date in dates" :value="date">{{ date }}</option>-->
<!--                        </select>-->
<!--                        <button class="btn btn-primary" type="button" @click="getDeliver(selectedDate)">Select date</button>-->
<!--                    </div>-->
                </div>
                <div v-if="sent && delivers[0] != null">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Номер поставки</th>
                            <th scope="col">Товар</th>
                            <th scope="col">Кол-во, шт</th>
                            <th scope="col">Всего, шт</th>
                            <th scope="col">Стоимость</th>
                            <th scope="col">Цена одного товара</th>
                            <th scope="col">Дата</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="deliver in delivers" :key="deliver.id">
                            <th scope="row">{{ deliver.id }}</th>
                            <td>{{ deliver.delivery_number }}</td>
                            <td>{{ deliver.product.name }}</td>
                            <td>{{ deliver.quantity }}</td>
                            <td>{{ deliver.calculated_quantity }}</td>
                            <td>{{ deliver.cost }}</td>
                            <td>{{ deliver.calculated_cost }}</td>
                            <td>{{ deliver.date }}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div v-if="sent && delivers[0] == null" class="mt-3">
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Not found!</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "DeliverComponent",
    data() {
        return {
            date: null,
            regex: ["-", "/", ":", ";", "_", ".", "", " "],
            delivers: null,
            sent: false,
            dates: null,
            selectedDate: null,
            loading: true,
        }
    },
    methods: {
        getDeliver(date) {
            if (this.validateDate()) {
                axios.get(`/api/delivers/${date}`,)
                    .then(response => {
                        this.delivers = response.data
                        this.sent = true
                    })
                    .catch(error => {
                        console.log(error)
                        this.sent = false
                    })
            } else {
                alert("Invalid date")
            }
        },
        validateDate() {
            let date = this.date
            let regex = /^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/
            return regex.test(date);
        },
        formatDates() {
            axios.get('/api/delivers')
                .then(response => {
                    this.dates = this.getDates(response.data)
                    this.loading = false
                })
        },
        getDates(delivers) {
            let dates = []
            for (const key in delivers) {
                const deliver = delivers[key].date
                dates.push(deliver)
            }
            return dates
        }
    },
    mounted() {
        this.formatDates()
    }
}
</script>

<style scoped>

</style>
