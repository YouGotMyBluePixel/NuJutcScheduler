<template lang="">
<transition name="modal-fade">
    <div class="modal-backdrop">
    <div class="modal">
      <header class="modal-header">
        <slot name="header">
          ADD BUS ROUTES
        </slot>
        <button
          type="button"
          class="btn-close"
          @click="close"
        >
          x
        </button>
      </header>

      <section class="modal-body">
        <slot name="body">
           <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="submit" >
                    <div class="form-group">
                        <label>Bus Route (to):</label>
                        <input type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" placeholder="Where the bus is going." v-model="form.busroute1">
                    </div>
                    <div class="form-group">
                        <label>Bus Route (from):</label>
                        <input type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" placeholder="Where the bus will load." v-model="form.busroute2">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" rows="3" placeholder="Description for the route" v-model="form.description">
                            </textarea>
                    </div>
                    <div class="form-group">
                        <label>Price($):</label>
                        <input type="number" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" rows="3" placeholder="Fare for the bus ride" v-model="form.price">
                    </div>
                    <div class="form-group">
                        <label>Date:</label>
                        <input type="date" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" rows="3" placeholder="Code Snippet" v-model="form.date">
                    </div>
                    <div class="form-group">
                        <label>Time:</label>
                        <input type="time" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" rows="3" placeholder="Code Snippet" v-model="form.time">
                    </div>
                    <footer class="modal-footer">
        <slot name="footer">
        </slot>
                    <button type="submit" class=" text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-2 mb-1 ease-linear transition-all duration-150">Create</button>

        <button
          type="button"
          class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          @click="close"
        >
          Close Modal
        </button>
        
      </footer>
                </form>
            </div>
        </div>
        </slot>
       </section>

      
    </div>
  </div>
  
    </transition>
</template>
<script>

import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";
import axios from 'axios'
export default {

    props: {
        busroutes: Object,
    },

     setup() {
        const form = useForm({
            busroute1: null,
            busroute2: null,
            description: null,
            time: null,
            date: null,
            price: null
        });

        return { form };
    },
    
    methods: {
      
      close() {
        this.$emit('close');
      },
       submit() {
            this.form.post(route("busroutes.store"));
            location.reload();
        },
    },
    components: {
        
    },
    
  
}
</script>
<style>
  .modal-backdrop {
      
   position: absolute;
  z-index: 1060;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background-color: rgba(0, 0, 0, 0.3);
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .modal {
    background: #FFFFFF;
    box-shadow: 2px 2px 20px 1px;
    overflow-x: auto;
    display: flex;
    flex-direction: column;
    width: 600px;
  }

  .modal-header,
  .modal-footer {
    padding: 15px;
    display: flex;
  }

  .modal-header {
    position: relative;
    border-bottom: 1px solid #eeeeee;
    color: #4AAE9B;
    justify-content: space-between;
  }

  .modal-footer {
    border-top: 1px solid #eeeeee;
    flex-direction: column;
    justify-content: flex-end;
  }
   .modal-fade-enter,
  .modal-fade-leave-to {
    opacity: 0;
  }

  .modal-fade-enter-active,
  .modal-fade-leave-active {
    transition: opacity .4s ease;
  }

  .modal-body {
    position: relative;
    padding: 20px 10px;
    max-height: calc(118vh - 228px);
    overflow-y: auto;

  }

  .btn-close {
    position: absolute;
    top: 0;
    right: 0;
    border: none;
    font-size: 20px;
    padding: 10px;
    cursor: pointer;
    font-weight: bold;
    color: #4AAE9B;
    background: transparent;
  }

  .btn-green {
    color: white;
    background: #4AAE9B;
    border: 1px solid #4AAE9B;
    border-radius: 2px;
  }
</style>