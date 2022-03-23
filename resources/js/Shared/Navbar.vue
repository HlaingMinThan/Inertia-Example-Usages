<template>
  <header class="flex justify-between bg-blue-400 p-5">
    <div class="flex items-center space-x-4">
      <h1 class="font-semibold text-3xl text-white uppercase">Inertia App</h1>
      <p>Welcome Back {{ $page.props.auth.user.username }}</p>
    </div>
    <ul class="flex space-x-4">
      <li>
        <NavLink :is-active="$page.component === 'Home'" href="/">Home</NavLink>
      </li>
      <li>
        <NavLink :is-active="$page.component === 'Settings'" href="/settings"
          >Settings
        </NavLink>
      </li>
      <li>
        <NavLink :is-active="$page.component === 'Users'" href="/users"
          >Users
        </NavLink>
      </li>
      <li>
        <Link href="/logout" method="post" :data="{ name: 'hm' }">Logout</Link>
      </li>
    </ul>
  </header>
</template>

<script setup>
import NavLink from "../Shared/NavLink.vue";
</script>

<style>
</style>