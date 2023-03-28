<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <p>
                    <br>
<!--                    <router-link to="/product">Product</router-link>-->
                </p>
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Index",
    data() {
        return {}
    },
    methods: {},
    mounted() {
        console.log('Component mounted.')
    }
}
</script>

<style scoped>

</style>
