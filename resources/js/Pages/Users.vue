<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import Pagination from "./Layout/Pagination.vue";

    defineProps({
        'users':Object,
        'errors':Object,
    })
    const form = useForm({
        name:'',
        email:'',
        password:''
    })
    function saveUser () {
        form.post('/user',{
            preserveScroll:true,
            onSuccess: (response)=>{
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
        });
    }
</script>

<template>
    <Head>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    </Head>
        <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Users</h1>
        <div class="row">
            <div class="col-lg-12">
                <!-- Circle Buttons -->
                <div class="card shadow mb-4">

                    <div class="card-header py-3">
                        <a class="m-0 font-weight-bold text-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Add New User
                        </a>
                    </div>
                    <div class="collapse" id="collapseExample">
                        <div class="card-body">
                            <form @submit.prevent="saveUser">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input v-model="form.name" type="text"  class="form-control" id="name" aria-describedby="" placeholder="Enter Name">
                                    <small v-if="errors.name"  class="form-text text-danger">{{errors.name}}</small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email address</label>
                                    <input type="email" v-model="form.email" class="form-control" id="email" aria-describedby="" placeholder="Enter email">
                                    <small v-if="errors.email" class="form-text text-danger">{{errors.email}}</small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input v-model="form.password" type="password"  class="form-control" id="password" placeholder="Password">
                                    <small v-if="errors.password" class="form-text text-danger">{{errors.password}}</small>
                                </div>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Users</h6>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="(user, index) of users.data">
                                <th scope="row">{{index+1}}</th>
                                <td>{{ user.name }}</td>
                                <td>{{user.email}}</td>
                                <td><Link class="btn btn-sm btn-primary" :href="`/user/${user.id}/edit`"> Edit</Link></td>
                            </tr>
                            </tbody>
                        </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
<!--                            <li class="page-item" ><a class="page-link" href="#">Previous</a></li>-->
                            <Pagination :links="users.links"/>
                        </ul>
                    </nav>
                    </div>
                </div>
            </div>
        </div>

</template>

<style scoped>

</style>
