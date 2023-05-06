<template lang="">
    <div class='productAdmin'>
      <SidebarVue/>


	<!-- CONTENT -->
	<section id="content">
		<Nav/>

		<main class='AddCategory'>
            <div class="card">
                <div class="card-head">
                    <h4>Add Category</h4>
                    <div class="right">
                        <router-link to='/admin/dashboard'>Back</router-link>
                        <router-link class='btn-add' to='/admin/add-category'>Add</router-link>
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
                        <button @click="SaveCategory">Insert</button>
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

    methods:{
        SaveCategory(e){
            e.preventDefault();
            axios.post('insert-category',this.category).then(res=>{
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