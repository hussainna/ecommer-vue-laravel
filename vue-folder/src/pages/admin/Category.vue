<template lang="">
    <div class='container'>
      <div class='check' v-if="AdminCheck===true">
        <Category/> 
      </div>
      <div class='check' v-else>
        <img class='lazy-img' :src="'https://i.stack.imgur.com/hzk6C.gif'" alt="">
      </div>
    </div>
</template>
<script>
import Category from '../../components/layouts/sidebar/category/Category.vue';
import axios from 'axios'
import toastr from 'toastr'
import '../../styles/admin.scss'

export default {
    
    data(){
        return{
            AdminCheck:false,
        }
    },

    components:{
        Category,
    },

    mounted(){
        this.AdminFunction()
    },

    methods:{
        AdminFunction(){
            axios.get('check-admin').then(res=>{
                if(res.data.status===200)
                {
                    this.AdminCheck=true
                    toastr.success(res.data.message)
                }
                else
                {
                    this.$router.push('/')
                }
            })
        }
    }

}
</script>
<style lang="">
    
</style>