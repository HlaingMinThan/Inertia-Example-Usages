<template>
  <div class="flex justify-between">
    <div class="flex items-center">
      <h1 class="text-3xl font-bold">Users</h1>
      <Link
        href="/users/create"
        type="button"
        class="
          ml-2
          inline-block
          px-6
          py-2.5
          bg-blue-600
          text-white
          font-medium
          text-xs
          leading-tight
          uppercase
          rounded
          shadow-md
          hover:bg-blue-700 hover:shadow-lg
          focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
          active:bg-blue-800 active:shadow-lg
          transition
          duration-150
          ease-in-out
        "
      >
        Create User
      </Link>
    </div>
    <input
      type="search"
      v-model="search"
      placeholder="search..."
      class="border-2 p-1 rounded-md"
    />
  </div>
  <Head>
    <title>Users</title>
  </Head>
  <div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
        <div class="overflow-hidden">
          <table class="min-w-full">
            <thead class="border-b">
              <tr>
                <th
                  scope="col"
                  class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                >
                  id
                </th>
                <th
                  scope="col"
                  class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                >
                  name
                </th>
                <th
                  scope="col"
                  class="text-sm font-medium text-gray-900 px-6 py-4 text-left"
                >
                  email
                </th>
              </tr>
            </thead>
            <tbody>
              <tr
                class="bg-white border-b"
                v-for="user in users.data"
                :key="user.id"
              >
                <td
                  class="
                    text-sm text-gray-900
                    font-light
                    px-6
                    py-4
                    whitespace-nowrap
                  "
                >
                  {{ user.id }}
                </td>
                <td
                  class="
                    text-sm text-gray-900
                    font-light
                    px-6
                    py-4
                    whitespace-nowrap
                  "
                >
                  {{ user.name }}
                </td>
                <td
                  class="
                    text-sm text-gray-900
                    font-light
                    px-6
                    py-4
                    whitespace-nowrap
                  "
                >
                  {{ user.email }}
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <Pagination :links="users.links"></Pagination>
</template>
<script setup>
import { ref } from "@vue/reactivity";
import { watch } from "vue";
import { Inertia } from "@inertiajs/inertia";
import Pagination from "../../Shared/Pagination.vue";
import throttle from "lodash/throttle";
const { filters } = defineProps({ users: Object, filters: Object });
let search = ref(filters.search);
watch(
  search,
  throttle(() => {
    // u can use debounce also,debounce work after you type
    console.log("trigger"); //call only every 500 millisecond,not on every key press
    Inertia.get(
      "/users",
      { search: search.value },
      { preserveState: true, replace: true }
    );
  }, 500)
);
</script>