<script setup>
import { ref, computed } from 'vue'
import { useRouter } from 'vue-router'

</script>
<template>
    <UNavigate></UNavigate>
  <RouterView />
  <Footer></Footer>
</template>