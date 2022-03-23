<template>
  <Link :class="{ 'text-white': isActive }">
    <slot />
  </Link>
</template>

<script setup>
defineProps({
  isActive: Boolean,
});
</script>

<style>
</style>