<template lang="">
    <div class='productAdmin'>
      <SidebarVue/>


	<!-- CONTENT -->
	<section id="content">
		<Nav/>

		<main>
            <div class="card">
                <div class="card-head">
                    <h4>Category</h4>
                    <div class="right">
                        <router-link to='/admin/dashboard'>Back</router-link>
                        <router-link class='btn-add' to='/admin/add-category'>Add</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <table>
                    <tr>
                       <th>Name</th>
                       <th>Slug</th>
                       <th>Description</th>
                    </tr>
                    
                    <tr v-for="item in categoryData" ::key="item.id">
                        <td>{{item.name}}</td>
                       <td>{{item.slug}}</td>
                       <td>{{item.description}}</td>
                       <td><router-link class='edit' :to="{path:'/admin/edit-category/'+item.id}">Edit</router-link></td>
                       <td><button @click="deleteCategory(item.id)" class='delete'>Delete</button></td>
                    </tr>
                 
               </table>
                </div>
            </div>
        </main>
	</section>
	<!-- CONTENT -->
	

    </div>
</template>
<script>
import '../../style.css'
import SidebarVue from '../Sidebar.vue';
import Nav from '../../home/Nav.vue';
import axios from 'axios';
import toastr from 'toastr'

export default {
    data(){
        return{
            categoryData:[],
        }
    },
    mounted() {
        this.getCategory()
    },

    methods: {
        getCategory(){
            axios.get('get-category').then(res=>{
                if(res.data.status===200)
                {
                    this.categoryData=res.data.category;

                }
            })
        },

        deleteCategory(id){
            axios.post(`delete-category/${id}`).then(res=>{
                if(res.data.status===200)
                {
                    toastr.success(res.data.message);
                    this.$router.go(this.$router.currentRoute)
                }
            })
            
        }
    },
    components:{
        SidebarVue,
        Nav,
    }
}
</script>
<style lang="">
    
</style>