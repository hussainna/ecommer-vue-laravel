<template lang="">
    <div class='productAdmin'>
      <SidebarVue/>


	<!-- CONTENT -->
	<section id="content">
		<Nav/>

		<main class='AddCategory'>
            <div class="card">
                <div class="card-head">
                    <h4>Edit Category</h4>
                    <div class="right">
                        <router-link to='/admin/dashboard'>Back</router-link>
                    </div>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" v-model="category.name">
                            <span class='error'>{{error_lest.name}}</span>
                        </div>
                        <div class="form-group">
                            <label>Slug</label>
                            <input type="text" v-model="category.slug">
                            <span class='error'>{{error_lest.slug}}</span>

                        </div>
                        <div class="form-group">
                            <label>Description </label>
                            <input type="text" v-model="category.description">
                            <span class='error'>{{error_lest.description}}</span>

                        </div>
                        <button @click="UpdateCategory">Update</button>
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
            category:{
                name:'',
                slug:'',
                description:'',
            },
            error_lest:[],
        }
    },

    components:{
        SidebarVue,
        Nav,
    },

    mounted(){
        this.getCategory()
    },

    methods:{

        getCategory(){
            const category_id=this.$route.params.id;
            axios.get(`edit-category/${category_id}`).then(res=>{
                if(res.data.status===200)
                {
                    this.category={
                        name:res.data.category.name,
                        slug:res.data.category.slug,
                        description:res.data.category.description,
                    };
                }
            })
        },

        UpdateCategory(e){
            e.preventDefault();
            const category_id=this.$route.params.id;

            axios.post(`update-category/${category_id}`,this.category).then(res=>{
                if(res.data.status===200)
                {
                    toastr.success(res.data.message)
                    this.$router.push('/admin/category')
                }
                else
                {
                    this.error_lest=res.data.errors;
                }
            })
        }
    }
}
</script>
<style lang="">
    
</style>