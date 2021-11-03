<template lang="">
    <div>
        <NavBar/>
       <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2 mt-5" for="grid-first-name">
        Card Number
      </label>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="1010202">
        <button class="p-2 pl-5 pr-5 transition-colors duration-700 transform bg-indigo-500 hover:bg-blue-400 text-gray-100 text-lg rounded-lg focus:border-4 border-indigo-300">Verify Card</button>
    </div>
    </div>
</template>
<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import NavBar from './NavBar.vue'
export default {
    components: {
        Link,
        NavBar,
    }
}
</script>
<style lang="">
    
</style>