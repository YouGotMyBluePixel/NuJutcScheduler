<template>
    <Head title="Dashboard" />

    <BreezeAuthenticatedLayout>
        <header class="bg-white shadow">
    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
      <h1 class="text-3xl font-bold text-gray-900">
        Dashboard
      </h1>
    </div>
  </header>
  <main>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
      <!-- Replace with your content -->
          <button
      type="button"
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
        <th>Price</th>
      
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
      </tr>
    </tbody>
  </table>
      </div>
      <!-- /End replace -->
    </div>
  </main>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                    
                     
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";
import $ from 'jquery'; 
import AddBusRouteModal from './AddBusRouteModal.vue'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        AddBusRouteModal,
    },
    methods: {
        showModal(id) {
        this.isAddBusRouteModalVisible = true;
      },
      closeModal() {
        this.isAddBusRouteModalVisible = false;
        this.isEditAddBusRouteModalVisibile = false;
        this.isDeleteModalVisibile = false;
      },
        submit() {
            this.form.post(route("busroutes.store"));
            location.reload();
        },
    },
    data() {
          
            return {
              busroutes:[],
              isAddBusRouteModalVisible: false,
            }
        },
    setup() {
        const form = useForm({
            busroute1: null,
            busroute2: null,
            description: null,
            time: null,
            price: null
        });

        return { form };
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
