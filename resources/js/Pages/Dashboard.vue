<script setup>
import {reactive} from "vue";
import {router} from "@inertiajs/vue3";
const form = reactive({
    firstName:'',
})
function submit(){
    router.post('/dashboard',form)
}
</script>
<template>
    <h1>Ini Dashboard</h1>
    <form @submit.prevent="submit">
        <div class="row">
            <div class="col">
                <label for="nama">Nama</label>
                <input v-model="form.firstName"  class="form-control">
            </div>
            <div class="col">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</template>


