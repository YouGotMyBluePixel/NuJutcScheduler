<template lang="">
<transition name="modal-fade">
    <div class="modal-backdrop">
    <div class="modal">
      <header class="modal-header">
        <slot name="header">
          EDIT BUS ROUTES
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
           <div class="row" >
            <div class="col-md-6" v-if="busroute">
               <div class="form-group">
                        <label>Bus Route (to):
                        </label>

                        <input type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" placeholder="Where the bus is going." v-model="busroute.busroute1" name="busroute1">
                    </div>
                    <div class="form-group">
                        <label>Bus Route (from):</label>
                        <input type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" placeholder="Where the bus will load." v-model="busroute.busroute2">
                    </div>
                    <div class="form-group">
                        <label>Description:</label>
                        <textarea type="text" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" rows="3" placeholder="Description for the route" v-model="busroute.description">
                            </textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>Price($):</label>
                        <input type="number" min="100" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" rows="3" placeholder="Minimum 100" v-model="busroute.price">
                         
                    </div>
                    
                    <div class="form-group">
                        <label>Date:</label>
                        <input type="date" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" rows="3" placeholder="Code Snippet" v-model="busroute.date">
                    </div>
                    <div class="form-group">
                        <label>Time:</label>
                        <input type="time" class="w-full mt-2 mb-6 px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:border-green-500" rows="3" placeholder="Code Snippet" v-model="busroute.time">
                    </div>
            </div>
        </div>
        </slot>
       </section>

      <footer class="modal-footer">
        <slot name="footer">
        </slot>
         <button
              v-on:click="
                $emit('update', busroute.id, busroute)
              "
              class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
            >
              Save Changes
            </button>
        <button
          type="button"
          class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
          @click="close"
        >
          Close Modal
        </button>
        
      </footer>
    </div>
  </div>
  
    </transition>
</template>
<script>


import axios from 'axios'
import { useForm } from "@inertiajs/inertia-vue3";
export default {
    props: {
      busroute: {type:Object}
    },
  data() {
    return {
        // busroute:[],
        //     busroute1: null,
        //     busroute2: null,
        //     description: null,
        //     time: null,
        //     price: null
    }
  },
  
    
       
    methods: {
      close() {
        this.$emit('close');
      },

      
    },
    components: {
        
    },
  
}
</script>
<style>
  .modal-backdrop {
    position: fixed;
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

  .modal-body {
      max-height: calc(92vh - 192px);
    overflow-y: auto;
    position: relative;
    padding: 20px 10px;
    
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