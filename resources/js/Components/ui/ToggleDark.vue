<script setup>
import { useDark, useToggle } from '@vueuse/core';

const isDark = useDark();
const toggleDark = useToggle(isDark);

</script>

<template>
    <button @click="toggleDark()" class="px-4 py-2 text-white bg-gray-600 dark:bg-purple-700">
        Включить темную тему
    </button>
</template>