<template>
    <Navbar />
    <div class="container">
    <h1>Hello World</h1>
    </div>
</template>
<script>
import Navbar from './Layout/Navbar.vue'
export default {
    components:{Navbar},
    data(){
        return{
            nama: 'ridhal',
        }
    }

}
</script>
