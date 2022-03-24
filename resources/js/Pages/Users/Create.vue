<template>
  <h1 class="text-3xl font-bold text-center">Create User</h1>
  <div class="flex items-center flex-col">
    <div class="block p-6 rounded-lg shadow-lg bg-white mt-3 w-full">
      <form @submit.prevent="submit">
        <div class="my-3">
          <label
            for="exampleFormControlInput1"
            class="form-label inline-block mb-2 text-gray-700"
            >Name</label
          >
          <input
            v-model="form.name"
            name="name"
            type="text"
            class="
              form-control
              block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700
              focus:bg-white
              focus:border-blue-600
              focus:outline-none
            "
            id="exampleFormControlInput1"
            placeholder="Name"
          />
          <p
            class="text-xs text-red-600 my-2"
            v-if="errors.name"
            v-text="errors.name"
          ></p>
        </div>
        <div class="my-3">
          <label
            for="exampleFormControlInput1"
            class="form-label inline-block mb-2 text-gray-700"
            >Email</label
          >
          <input
            v-model="form.email"
            name="email"
            type="text"
            class="
              form-control
              block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700
              focus:bg-white
              focus:border-blue-600
              focus:outline-none
            "
            id="exampleFormControlInput1"
            placeholder="Email"
          />
          <p
            class="text-xs text-red-600 my-2"
            v-if="errors.email"
            v-text="errors.email"
          ></p>
        </div>
        <div class="my-3">
          <label
            for="exampleFormControlInput1"
            class="form-label inline-block mb-2 text-gray-700"
            >Password</label
          >
          <input
            v-model="form.password"
            name="password"
            type="password"
            class="
              form-control
              block
              w-full
              px-3
              py-1.5
              text-base
              font-normal
              text-gray-700
              bg-white bg-clip-padding
              border border-solid border-gray-300
              rounded
              transition
              ease-in-out
              m-0
              focus:text-gray-700
              focus:bg-white
              focus:border-blue-600
              focus:outline-none
            "
            id="exampleFormControlInput1"
            placeholder="Password"
          />
          <p
            class="text-xs text-red-600 my-2"
            v-if="errors.password"
            v-text="errors.password"
          ></p>
        </div>
        <div class="my-3 text-center">
          <button
            type="submit"
            class="
              inline-block
              px-6
              py-2.5
              bg-blue-600
              text-white
              font-medium
              text-xs
              leading-tight
              uppercase
              rounded-full
              shadow-md
              hover:bg-blue-700 hover:shadow-lg
              focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0
              active:bg-blue-800 active:shadow-lg
              transition
              duration-150
              ease-in-out
            "
          >
            create
          </button>
        </div>
      </form>
    </div>
  </div>
</template>

<script setup>
import { Inertia } from "@inertiajs/inertia";
import { reactive } from "@vue/reactivity";

defineProps({ errors: Object });

let form = reactive({
  name: "",
  email: "",
  password: "",
});

let submit = () => {
  Inertia.post("/users/store", form);
};
</script>
