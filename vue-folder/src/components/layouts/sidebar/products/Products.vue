<template lang="">
    <div class='productAdmin'>
      <SidebarVue/>


	<!-- CONTENT -->
	<section id="content">
		<Nav/>

		<main>
            <div class="card">
                <div class="card-head">
                    <h4>Products</h4>
                    <router-link to='/admin/add-product'>Add</router-link>
                </div>
                <div class="card-body">
                    <table>
                    <tr>
                       <th>Name</th>
                       <th>Slug</th>
                       <th>Price</th>
                       <th>Qty</th>
                       <th>Description</th>
                       <th>Category ID</th>
                       <th>Img</th>
                    </tr>

                    <tr v-for="item in ProductData" :key="item.id">
                        <td>{{item.name}}</td>
                        <td>{{item.slug}}</td>
                        <td>{{item.price}}</td>
                        <td>{{item.qty}}</td>
                        <td>{{item.description}}</td>
                        <td>{{item.category_id}}</td>
                        <td><img :src="`http://localhost:8000/${item.img}`"  alt=""></td>
                        <td><button @click="deleteProduct(item.id)" class="delete">Delete</button></td>
                        <td><router-link class="edit" :to="{path:`/admin/edit-product/`+item.id}">Edit</router-link></td>
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
        ProductData:[],
      }  
    },
    components:{
        SidebarVue,
        Nav,
    },

    mounted(){
        this.getProduct()
    },

    methods:{
        getProduct(){
            axios.get('get-product').then(res=>{
                if(res.data.status===200)
                {
                    this.ProductData=res.data.product
                }
            })
        },
        deleteProduct(id){
            axios.post(`delete-product/${id}`).then(res=>{
                if(res.data.status===200)
                {
                    toastr.success(res.data.message)
                    this.$router.go(this.$router.currentRoute)
                }
            })
        }
    }
}
</script>
<style lang="">
    
</style>