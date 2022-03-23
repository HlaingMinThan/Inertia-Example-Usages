<template>
  <Navbar />
  <section class="p-5">
    <div class="mx-auto max-w-4xl">
      <!-- podcasts audio -->
      <!-- <iframe
        height="200px"
        width="100%"
        frameborder="no"
        scrolling="no"
        seamless
        src="https://player.simplecast.com/dafc434a-9b89-4d3e-b7e4-b7e350cedf5a?dark=false"
      ></iframe> -->
      <slot />
    </div>
  </section>
</template>

<script setup>
import Navbar from "../shared/Navbar";
</script>
