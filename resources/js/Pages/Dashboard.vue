<template>
    <Head title="Dashboard" />
<notifications group="error" />
    <BreezeAuthenticatedLayout>
        <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-gray-900">
        JUTC Bus Scheduler
      </h1>
    </div>
  </header>
  <main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <!-- Replace with your content -->
          <button
      id="button"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      @click="showModal()"
    >
      ADD
    </button>
    <add-bus-route-modal
    v-show="isAddBusRouteModalVisible"
    @close="closeModal"
    />
    
      <div class="px-4 py-6 sm:px-0">
          
        <table class="table table-hover table-bordered" id="example">
    <thead>
      <tr>
        <th>ID</th>
        <th>Bus Route (from)</th>
        <th>Bus Route (to)</th>
        <th>Description</th>
         <th>Date</th>
        <th>Time</th>
        <th>Price($)</th>
        <th>Actions</th>
      
      </tr>
    </thead>
    <tbody>
      <tr v-for="busroute in busroutes" :key="busroute.id">
        <td>{{busroute.id}}</td>
         <td>{{busroute.busroute1}}</td>
        <td>{{busroute.busroute2}}</td>
        <td>{{busroute.description}}</td>
        <td>{{busroute.date}}</td>
        <td>{{busroute.time}}</td>
        <td>{{busroute.price}}</td>
        <td> 
          <button
      type="button"
   class="w-14 h-auto  px-4 py-3 editPointBox rounded hover:bg-white font-semibold transition duration-200 each-in-out"
      :busroute="busrouteData"
      @click="toggleEditModal(busroute)"
    >
    
      <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke=""
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-edit"
                          >
                            <path
                              d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"
                            ></path>
                            <path
                              d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"
                            ></path>
                          </svg>
    </button>

   <edit-bus-route-modal
      v-show="isEditBusRouteModalVisible"
      @close="closeModal"
      :busroute="busrouteData"
      @update="update"
     
    />
       <delete-bus-route-modal
     v-show="isDeleteModalVisible"
      @close="closeModal"
      :busroute="busrouteData"
      @deleteBusRoute="deleteBusRoute"
    />
    <button
      type="button"
      class="w-14 h-auto  px-4 py-3 deletePointBox rounded  hover:bg-white font-semibold transition duration-200 each-in-out"
      :busroute="busrouteData"
      @click="toggleDeleteModal(busroute)"
    >
       <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            fill="none"
                            stroke=""
                            stroke-width="2"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            class="feather feather-x"
                          >
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                          </svg>
    </button>
 

   </td>
      </tr>
    </tbody>
  </table>
      </div>
      <!-- /End replace -->
    </div>
    
  </main>

    </BreezeAuthenticatedLayout>
    
</template>

<script>

import { notify } from "@kyvg/vue3-notification";
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";
import $ from 'jquery'; 
import AddBusRouteModal from './AddBusRouteModal.vue'
import EditBusRouteModal from './EditBusRouteModal.vue'
import DeleteBusRouteModal from './DeleteBusRouteModal.vue'




export default {
   data() {
          
            return {
              busroutes:[],
               isAddBusRouteModalVisible: false,
               isEditBusRouteModalVisible: false,
               isDeleteModalVisible: false,
            }
        },
    components: {
        BreezeAuthenticatedLayout,
        Head,
        AddBusRouteModal,
        EditBusRouteModal,
        DeleteBusRouteModal,
    },
    methods: {
        showModal(id) {
        this.isAddBusRouteModalVisible = true;
      },
      closeModal() {
        this.isAddBusRouteModalVisible = false;
        this.isEditBusRouteModalVisible = false;
        this.isDeleteModalVisible = false;
      },
      async GetAllRoutes(){
         await axios
        .get(
          'api/getroutes'
        )
        .then((response) => (this.busroutes = response.data))
        .catch((error) => {
          console.log(error)
        })
      },
        toggleEditModal:function(busroute){
        this.busrouteData = busroute
        this.isEditBusRouteModalVisible = !this.isEditBusRouteModalVisible
      },
      toggleDeleteModal:function(busroute){
        this.busrouteData = busroute
        this.isDeleteModalVisible = !this.isDeleteModalVisible
      },
      async update(id, updatedBusRoute) {
      this.isEditBusRouteModalVisible = !this.isEditBusRouteModalVisible
      //console.log(images)
      try {
        var form = new FormData()
        form.append('id', id)
        form.append('busroute1', updatedBusRoute.busroute1)
        form.append('busroute2', updatedBusRoute.busroute2)
        form.append('description', updatedBusRoute.description)
        form.append('price', updatedBusRoute.price)
        form.append('time', updatedBusRoute.time)
         form.append('date', updatedBusRoute.date)
        await axios.post( `api/updatebus/`,
          form
        )
        location.reload();
        //Reloads Page after update button pressed
    
        
       
      } catch (e) {
       
      }

      // return
    },
     async deleteBusRoute(id) {
     this.$inertia.delete(route("busroutes.destroy", id));
     location.reload();
    },
    },
   
    
    async mounted(){
    //API Call
  await this.GetAllRoutes()

  $(document).ready(function() {
      $('#example').DataTable({
        stripeClasses: ['strip1', 'strip2', 'strip3'],
      })
    })
  },
}
</script>
<style>

.editPointBox {
  border: 1px solid rgb(74, 159, 228);
  background: rgb(74, 159, 228);
  stroke: white;
  margin: 5px;
}

.editPointBox:hover {
  stroke: rgb(74, 159, 228);
}
.deletePointBox {
  border: 1px solid red;
  background: red;
  stroke: white;
  margin: 5px;
}
.deletePointBox:hover {
  stroke: red;
}


</style>
