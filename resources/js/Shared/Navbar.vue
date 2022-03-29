<template>
  <header class="flex justify-between bg-blue-400 p-5">
    <div class="flex items-center space-x-4">
      <h1 class="font-semibold text-3xl text-white uppercase">Inertia App</h1>
      <p v-if="$page.props.auth.user">
        Welcome Back {{ $page.props.auth.user.username }}
      </p>
    </div>
    <ul class="flex space-x-4">
      <li>
        <NavLink :is-active="$page.component === 'Home'" href="/">Home</NavLink>
      </li>
      <li v-if="$page.props.auth.user">
        <NavLink :is-active="$page.component === 'Settings'" href="/settings"
          >Settings
        </NavLink>
      </li>
      <li v-if="$page.props.auth.user">
        <NavLink :is-active="$page.component === 'Users/Index'" href="/users"
          >Users
        </NavLink>
      </li>
      <li v-if="$page.props.auth.user">
        <Link href="/logout" method="post">Logout</Link>
      </li>
      <li v-if="!$page.props.auth.user">
        <Link href="/login">Login</Link>
      </li>
      <li v-if="!$page.props.auth.user">
        <Link href="/register">Register</Link>
      </li>
    </ul>
  </header>
</template>

<script setup>
import NavLink from "../Shared/NavLink.vue";
</script>

<style>
</style>