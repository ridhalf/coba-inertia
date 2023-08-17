<script setup>
import Sidebar from "./Partials/Sidebar.vue";
import TopBar from "./Partials/TopBar.vue";
import Footer from "./Partials/Footer.vue";
</script>
<template>
    <div id="wrapper">

    <Sidebar/>
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <TopBar/>
            <!-- Topbar -->
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <slot />

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <Footer />
        <!-- End of Footer -->
</div>
    </div>

</template>
