<template>
    <h1 class="">About</h1>
    <button class="btn btn-primary">Submit</button>
    <h5>{{firstName}}</h5>
</template>
<script>
import Layout from "./Layout/Layout.vue";
export default {
    layout:Layout,
    props:{
        firstName: String
    }
}
</script>
