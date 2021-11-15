<template lang="">
    <div>
        <NavBar/>
        <div class="bg-yellow-100">
  <div class="max-w-2xl mx-auto py-24 px-4 grid items-center grid-cols-1 gap-y-16 gap-x-8 sm:px-6 sm:py-32 lg:max-w-7xl lg:px-8 lg:grid-cols-2">
    <div>
      <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl">Your route to exellence</h2>
      <p class="mt-4 text-gray-500">Our Chartered Services option allows you or your company to make direct bookings for tours, excursions and other travel arrangements. Travel in style on your premium buses.</p>

      <dl class="mt-16 grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 sm:gap-y-16 lg:gap-x-8">
        <div class="border-t border-gray-200 pt-4">
          <dt class="font-medium text-gray-900">Health Standards</dt>
          <dd class="mt-2 text-sm text-gray-500">During this ongoing COVID-19 Pandemic, we remain committed to keeping you - our loyal passengers safe. Our fleet is sanitized regularly multiple times per day.</dd>
        </div>

        <div class="border-t border-gray-200 pt-4">
          <dt class="font-medium text-gray-900">Internet Connectivity</dt>
          <dd class="mt-2 text-sm text-gray-500">Need data on the go? No problem - we've got you covered. Access our secured Wi-Fi connection for free while you travel safely to your intended destination.</dd>
        </div>

        <div class="border-t border-gray-200 pt-4">
          <dt class="font-medium text-gray-900">Smart Cards</dt>
          <dd class="mt-2 text-sm text-gray-500">We provide Smarter Cards for our valued patrons. Access discounted benefits, and convenient payment methods at your fingertips by becoming a JUTC Cardholder.</dd>
        </div>

        <div class="border-t border-gray-200 pt-4">
          <dt class="font-medium text-gray-900">Comfort</dt>
          <dd class="mt-2 text-sm text-gray-500">Park your vehicle and drive with us in comfort. Ask our Customer Service team about the Kingston City Tours and Shuttle services.</dd>
        </div>

      </dl>
    </div>
    <div class="grid grid-cols-2 grid-rows-2 gap-4 sm:gap-6 lg:gap-8">
      <img :src="'images/jutccoronavirus.jpeg'"  class="bg-gray-100 rounded-lg">
      <img :src="'images/jutcfreecard.jpeg'"  class="bg-gray-100 rounded-lg">
      <img :src="'images/jutcfreewifi.jpeg'"  class="bg-gray-100 rounded-lg">
      <img :src="'images/jutcbuses.jpeg'"  class="bg-gray-100 rounded-lg">
    </div>
  </div>
</div>
    </div>
</template>
<script>
import NavBar from './NavBar.vue'
export default {
    components: {
        NavBar,
    }
}
</script>
<style lang="">
    
</style>