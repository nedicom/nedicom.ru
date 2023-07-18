<script setup>
import { reactive } from "vue";
import { usePage, Link } from '@inertiajs/inertia-vue3';
import { Inertia } from "@inertiajs/inertia";

defineProps( {
    specdata: Array,
    specializationOne: String,
});
</script>

<template>
    <div class="my-5 w-full inline-grid grid-cols-2 gap-4 items-center">
    <input
        @input="inputusl"
        autocomplete="off"
        list="uslugi"
        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
        />
        <datalist id="uslugi" >
            <option  v-for="id in specdata" :id="id?.usl_name" :value="id?.usl_name">{{ id.id }}</option>
        </datalist>
    <Link 
        :href="route('uslugi.add')"        
        class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
        >придумать новую услугу</Link>
    </div>  

        <div class="my-3">
            <div @click="remove()" :class="invisibility" class="inline-flex bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
               {{ testvalue }}
            </div>

            <div @click="remove2()" :class="invisibility2" class="inline-flex bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ testvalue2 }}
            </div>

            <div @click="remove3()" :class="invisibility3" class="inline-flex bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
                {{ testvalue3 }}
            </div>
        </div>
       
</template>

<script>
export default {
  data() {    
    return { 
      test: null,
      test2: null,
      test3: null,
      testvalue: usePage().props.value.specializationOne?.usl_name,
      testvalue2: usePage().props.value.specializationTwo?.usl_name,
      testvalue3: usePage().props.value.specializationThree?.usl_name,
      invisibility: 'visible mt-3 mr-2 px-4 py-2',
      invisibility2: 'visible mt-3 mr-2 px-4 py-2',
      invisibility3: 'visible mt-3 mr-2 px-4 py-2',
    };
  },
  methods: {
    inputusl(e) {
      if(this.test == null){
        let form = reactive({
            speciality_one_id: document.getElementById(e.target.value).innerHTML,
        });
        this.test = document.getElementById(e.target.value).innerHTML;
        this.testvalue = document.getElementById(e.target.value).value;
        this.invisibility = 'visible mt-3 mr-2 px-4 py-2';
        Inertia.patch("/profilespec", form);
      }
      else if(this.test2 == null){
        let form = reactive({
            speciality_two_id: document.getElementById(e.target.value).innerHTML,
        });
        this.test2 = document.getElementById(e.target.value).innerHTML;
        this.testvalue2 = document.getElementById(e.target.value).value;
        this.invisibility2 = 'visible mt-3 mr-2 px-4 py-2';
        Inertia.patch("/profilespec", form);
      }
      else if(this.test3 == null){
        let form = reactive({
            speciality_three_id: document.getElementById(e.target.value).innerHTML,
        });
        this.test3 = document.getElementById(e.target.value).innerHTML;
        this.testvalue3 = document.getElementById(e.target.value).value;
        this.invisibility3 = 'visible mt-3 mr-2 px-4 py-2';
        Inertia.patch("/profilespec", form);
      }
      else{

      }
    e.target.value = null;
    },
    remove(){
        this.test = null;
        this.testvalue = null;
        this.invisibility = 'invisible';
    },
    remove2(){
        this.test2 = null;
        this.testvalue2 = null;
        this.invisibility2 = 'invisible';
    },
    remove3(){
        this.test3 = null;
        this.testvalue3 = null;
        this.invisibility3 = 'invisible';
    },

  },
};
</script>
