<script setup>
    defineProps({
        links:Array
    })
</script>
<template>
    <Component
        preserve-scroll
        :is="link.url?'Link':'span'"
        v-for="link in links"
        :href="link.url"
        v-html="link.label"
        class="page-item page-link"
        :class="{'text-muted':!link.url,'font-weight-bold':link.active}"
    />
</template>
