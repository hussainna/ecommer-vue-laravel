<template lang="">
    <header>
        <div class="container">
            <img src="/images/logo.svg" alt="">
            <ul>
                <li><router-link to="/">HOME</router-link></li>
                <li><router-link to="/">SHOP</router-link></li>
                <li><router-link to="/">ABOUT US</router-link></li>
                <ul v-if="AuthCheck===true">
                  <button @click="Logout">Logout</button>
                </ul>
                <ul v-else>
                    <li><router-link to="/auth/login">LOGIN</router-link></li>
                    <li><router-link to="/auth/register">REGISTER</router-link></li>
                </ul>
            </ul>
            <div class="input-group">
                <input type="text" name="" placeholder='search products' id="">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
           
            <div class="right">
                <i class="fa-solid fa-user"></i>
            <i class="fa-solid fa-heart"></i>
            
                <div class="myCart">
                    <i class="fa-solid fa-bag-shopping"></i>
                <label>MY CART</label>
                </div>
            </div>
        </div>
    </header>
</template>
<script>
import axios from 'axios'
import '../../styles/common.scss'
import toastr from 'toastr'

export default {

    data(){
        return{
            AuthCheck:false,
            
        }
    },
    mounted(){
        this.Checked()
    },

    methods:{
        Checked(){
            if(localStorage.getItem('token'))
            {
                this.AuthCheck=true
            }
            else{
                this.AuthCheck=false
            }
        },

        Logout(e){
            e.preventDefault();
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('logout').then(res=>{
                    if(res.data.status===200)
                    {
                        localStorage.removeItem('token');
                        localStorage.removeItem('username');
                        toastr.success(res.data.message)
                        window.location.reload();
                    }
                })
           });
        }
    }

 
}
</script>
<style lang="">
    
</style>