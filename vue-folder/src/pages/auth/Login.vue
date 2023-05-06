<template lang="">
    <div class='auth'>
        <img class="wave" src="/images/wave.png">
	<div class="container">
		<div class="img">
			<img src="/images/bg.svg">
		</div>
		<div class="login-content">
			<form>
				<img src="/images/avatar.svg">
				<h2 class="title">Welcome</h2>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="text" placeholder='email' v-model="login.email" class="input">
           		   </div>
           		</div>
                
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" placeholder='password' v-model="login.password" class="input">
            	   </div>
            	</div>
            	<button class=btn @click="LoginSubmit">Login</button>
            </form>
        </div>
    </div>
    </div>
</template>
<script>
import '../../styles/auth.scss'

import axios from 'axios'
import toastr from 'toastr'

export default {
    data(){
		return{
			login:{
				email:'',
				password:'',
			}
		}
	},
	methods:{
		LoginSubmit(e){
			e.preventDefault();
			const data={
				email:this.login.email,
				password:this.login.password,
			}

			axios.get('/sanctum/csrf-cookie').then(response => {
				axios.post('login',data).then(res=>{
					if(res.data.status===200)
					{
						localStorage.setItem('username',res.data.user)
						localStorage.setItem('token',res.data.token)
						toastr.success(res.data.message)
						this.$router.push('/')
					}
					else
					{
						toastr.error(res.data.message)

					}
				})
            });
		}
	}
}
</script>
<style lang="">
    
</style>