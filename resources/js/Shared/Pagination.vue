<template>
  <div class="flex justify-center mt-5">
    <nav aria-label="Page navigation example">
      <ul class="flex list-style-none">
        <li class="page-item" v-for="link in links" :key="link.label">
          <Link
            v-html="link.label"
            :class="{
              'bg-transparent': !link.active,
              'bg-blue-200': link.active,
              'opacity-50': !link.url,
            }"
            class="
              page-link
              relative
              block
              py-1.5
              px-3
              rounded
              border-0
              outline-none
              transition-all
              duration-300
              rounded
              text-gray-800
              hover:text-gray-800 hover:bg-gray-200
              focus:shadow-none
            "
            :href="link.url"
          />
        </li>
      </ul>
    </nav>
  </div>
</template>

<script>
export default {
  props: {
    links: Array,
  },
};
</script>

<style>
</style>