<template lang="">
    <div class='productAdmin'>
      <SidebarVue/>


	<!-- CONTENT -->
	<section id="content">
		<Nav/>

		<main class='AddCategory'>
            <div class="card">
                <div class="card-head">
                    <h4>Update Products</h4>
                    <div class="right">
                        <router-link to='/admin/dashboard'>Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label>Category ID</label>
                            <select v-model="product.category_id">
                                <option>Select Option</option>
                                <option :value="item.id" v-for="item in categoryData" :key="item.id">{{item.name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" v-model="product.name">
                            <span class='error'>{{error_lest.name}}</span>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" v-model="product.slug">
                            <span class='error'>{{error_lest.slug}}</span>

                        </div>
                        <div class="form-group">
                            <label>Description </label>
                            <input type="text" v-model="product.description">
                            <span class='error'>{{error_lest.description}}</span>

                        </div>
                        <div class="form-group">
                            <label>Price </label>
                            <input type="number" v-model="product.price">
                            <span class='error'>{{error_lest.price}}</span>

                        </div>
                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" v-model="product.qty">
                            <span class='error'>{{error_lest.qty}}</span>

                        </div>
                                  <div class="form-group">
                            <label>image </label>
                            <input type="file" @change="onChange">
                            <span class='error'>{{error_lest.img}}</span>

                        </div>
                        <button @click="UpdateProduct">Update</button>
                    </form>
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

import axios from 'axios'
import toastr from 'toastr'


export default {
    
    data(){
        return{
            categoryData:[],
            product:{
                name:'',
                slug:'',
                description:'',
                category_id:'',
                price:'',
                qty:'',
                
            },
            error_lest:[],
            img:null,
        }
    },

    components:{
        SidebarVue,
        Nav,
    },

    mounted(){
        this.getCategory()
        
        this.getProduct()

    },

    methods:{
        getCategory(){
            axios.get('get-category').then(res=>{
                if(res.data.status===200)
                {
                    this.categoryData=res.data.category;
                    console.log(res.data.category)

                }
            })
        },
        onChange(e){
           this.img=e.target.files[0];
        },
  

        getProduct(){
            const product_id=this.$route.params.id;
            axios.get(`edit-product/${product_id}`).then(res=>{
                if(res.data.status)
                {
                    this.product={
                        name:res.data.product.name,
                        slug:res.data.product.slug,
                        description:res.data.product.description,
                        price:res.data.product.price,
                        qty:res.data.product.qty,
                        category_id:res.data.product.category_id,
                        
                    }
                }
            })
        },

        UpdateProduct(e){
          e.preventDefault();
          const product_id=this.$route.params.id;

          const fd=new FormData()
          fd.append('img',this.img)
          fd.append('name',this.product.name)
          fd.append('description',this.product.description)
          fd.append('price',this.product.price)
          fd.append('slug',this.product.slug)
          fd.append('category_id',this.product.category_id)
          fd.append('qty',this.product.qty)

           axios.post(`update-product/${product_id}`,fd).then(res=>{
            if(res.data.status===200)
            {
                toastr.success(res.data.message)
                this.$router.push('/admin/products')
            }
            else
            {
                this.error_lest=res.data.errors;
            }
           })
 

        }
    },

  
}
</script>
<style lang="">
    
</style>