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
           		   		<input type="text" v-model="register.name" placeholder='username' />
           		   </div>
           		</div>
                   <div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<input type="text" v-model="register.email" placeholder='email' class="input">
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<input type="password" placeholder='password' v-model="register.password" class="input">
            	   </div>
            	</div>
            	<a href="#">Forgot Password?</a>
            	<button class='btn' @click="RegisterSubmit">Register</button>
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
			register:{
				name:'',
				email:'',
				password:'',
			}
		}
	},
	methods:{
		RegisterSubmit(e){
			e.preventDefault();
			const data={
				name:this.register.name,
				email:this.register.email,
				password:this.register.password,
			}
			axios.get('/sanctum/csrf-cookie').then(response => {
				axios.post('register',data).then(res=>{
					if(res.data.status===200)
					{
						localStorage.setItem('username',res.data.user)
						localStorage.setItem('token',res.data.token)
						toastr.success(res.data.message)
						this.$router.push('/')
					}
				})
            });
		}
	}
}
</script>
<style lang="">
    
</style>