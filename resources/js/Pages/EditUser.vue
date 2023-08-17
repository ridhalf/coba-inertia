<script setup>
    import {useForm} from "@inertiajs/vue3";
    import {toRefs} from "vue";

    const props = defineProps({
        user:{
            type:Object
        },
        errors:{
            type:Object
        }
    })
    const form = useForm({
        name: props.user.name,
        email: props.user.email,
        password: '',
        id:props.user.id
    })
    function updateUser (){
        form.put('/user',{
            onSuccess:(response)=>{
                console.log(response)
                form.reset();

                Toastify({
                    text: response.props.flash.message,
                    duration: 2000,
                    destination: "https://github.com/apvarun/toastify-js",
                    newWindow: true,
                    close: false,
                    gravity: "top", // `top` or `bottom`
                    position: "right", // `left`, `center` or `right`
                    stopOnFocus: true, // Prevents dismissing of toast on hover
                    style: {
                        background: "linear-gradient(to right, #00b09b, #96c93d)",
                    },
                }).showToast();
            }
        })
    }
</script>

<template>
<div class="row">
    <div class="col-lg-6">
        <div class="card shadow mb-4">
            <div class="card-body">
                <form @submit.prevent='updateUser'>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input v-model="form.name"  type="text"  class="form-control" id="name" aria-describedby="" placeholder="Enter Name" >
                        <small v-if="errors.name"  class="form-text text-danger" >{{errors.name}}</small>
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input v-model="form.email" type="email" class="form-control" id="email" aria-describedby="" placeholder="Enter email">
                        <small v-if="errors.email" class="form-text text-danger">{{errors.email}}</small>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input v-model="form.password" type="password" class="form-control" id="password" placeholder="Password">
                        <small v-if="errors.password" class="form-text text-danger">{{errors.password}}</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>
</template>

<style scoped>

</style>
