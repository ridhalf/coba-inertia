<template>
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item">
            <Link href="/dashboard" class="nav-link">
                <a><i class="fas fa-fw fa-tachometer-alt"></i><span>Dashboard</span></a></Link>
            <Link href="/about" class="nav-link">
                <a><i class="fas fa-fw fa-tachometer-alt"></i><span>About</span></a></Link>
        </li>
    </ul>
</template>
<script setup>
</script>
