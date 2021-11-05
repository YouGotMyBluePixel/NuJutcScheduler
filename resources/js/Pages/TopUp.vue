<template lang="">
    <div>
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <NavBar/>
    <div class="container mx-auto">
        <div class="max-w-sm mx-auto md:max-w-lg">
            <div class="w-full">
                <div class="bg-white h-64 py-3 rounded text-center">
                    <h1 class="text-2xl font-bold mt-12">Smart Card Verification</h1>
                    <div class="flex flex-col mt-4"> <span>Enter your Smart Card Number #</span>  </div>
                    <span class="z-10 h-full leading-snug font-normal absolute text-center text-blueGray-300 absolute bg-transparent rounded text-base items-center justify-center w-8 pl-3 py-7">
    <i class="fas fa-lock"></i>
  </span>
  <input type="tel" v-model="form.cardnumber" placeholder="10 digits" class="px-3 py-3 mt-4 placeholder-blueGray-300 text-blueGray-600 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-full pl-10"/>
                    <div class="flex justify-center text-center mt-5"> <a
                    @click="submit"
                     class="flex items-center text-blue-700 hover:text-blue-900 cursor-pointer"><span class="font-bold">Verify</span><i class='bx bx-caret-right ml-1'></i></a> </div>
                </div>
            </div>
        </div>
    </div>

    </div>
</template>
<script>
import { Head, Link } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";
import NavBar from './NavBar.vue'
export default {
    components: {
        Link,
        NavBar,
    },
    methods: {
        submit() {
            this.form.post(route("smartcard.index"));
           
        },
    },
     setup() {
        const form = useForm({
            cardnumber: null,
           
        });

        return { form };
    },
    
}
</script>
<style lang="">
    
</style>