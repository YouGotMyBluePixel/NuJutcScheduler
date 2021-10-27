<template lang="">
<transition name="modal-fade">
    <div class="modal-backdrop">
    <div class="modal">
      <header class="modal-header">
        <slot name="header">
          DELETE BUS ROUTE
        </slot>
        <button
          type="button"
          class="btn-close"
          @click="close"
        >
          x
        </button>
      </header>

      <section class="modal-body" v-if="busroute">
        <slot name="body">
          
            <div
                        class="flex items-start justify-between p-5 border-b border-solid border-blueGray-200 rounded-t">
                        <h3 class="text-3xl font-semibold">
                           Are you sure you want to delete the route from "{{busroute.busroute1}}" to "{{busroute.busroute2}}"?
                        </h3>
                        </div>
        </slot>
       </section>

      <footer class="modal-footer">
        <slot name="footer">
           <button
              v-on:click="
                $emit('deleteBusRoute', busroute.id, busroute)
              "
              class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
            >
              Delete
            </button>
        </slot>
        <button
             @click="close"
              class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-green-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
              type="button"
            >
            Close
            </button>
      </footer>
    </div>
  </div>
  </transition>
</template>
<script>



export default {

props: {
    busroute: Object,
  },
    methods: {
      close() {
        this.$emit('close');
      },
    },
    components: {
        
    },
    data() {
    return {
            busroute1: '',
            busroute2: '',
            description: '',
            time: '',
            date: '',
            price: ''
     
    }
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