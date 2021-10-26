<template>
    <Head title="Dashboard" />

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
        <td>{{busroute.time}}</td>
        <td>{{busroute.price}}</td>
        <td> <button
      type="button"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      :busroute="busrouteData"
      @click="toggleEditModal(busroute)"
    >
      Edit
    </button>

   <edit-bus-route-modal
      v-show="isEditBusRouteModalVisible"
      @close="closeModal"
      :busroute="busrouteData"
      @update="update"
     
    />
    <button
      type="button"
      class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"
      :busroute="busrouteData"
      @click="toggleDeleteModal(busroute)"
    >
      Delete
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
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";
import $ from 'jquery'; 
import AddBusRouteModal from './AddBusRouteModal.vue'
import EditBusRouteModal from './EditBusRouteModal.vue'
import DeleteBusRouteModal from './DeleteBusRouteModal.vue'

export default {
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
        toggleEditModal:function(busroute){
        this.busrouteData = busroute
        this.isEditBusRouteModalVisible = !this.isEditBusRouteModalVisible
      },
    //   toggleDeleteModal:function(busroute){
    //     this.busrouteData = busroute
    //     this.isDeleteModalVisibile = !this.isDeleteModalVisibile
    //   },
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
        await axios.post( `api/updatebus/`,
          form
        )
        location.reload();
        //Reloads Page after update button pressed
    
        
       
      } catch (e) {
       
      }

      // return
    },
    },
    data() {
          
            return {
              busroutes:[],
               isAddBusRouteModalVisible: false,
               isEditBusRouteModalVisible: false,
               isDeleteBusRouteVisible: false,
            }
        },
    
    mounted(){
    //API Call
    axios
    .get("api/getroutes")
    .then((res)=>
    {
      this.busroutes = res.data;
     setTimeout(function(){ $("#example").DataTable(
       
     ); }, 10);
      
    })
  },
}
</script>
<style>


</style>
