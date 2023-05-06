<template lang="">
    <div class="place">
        <div class="container">
            <div class="left">

                <h1>Place Order</h1>

                <form>
                        
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" v-model="checkOut.firstname"/>
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" v-model="checkOut.lastname"  />

                        </div>
                        <div class="form-group">
                            <label>phone </label>
                            <input type="text" v-model="checkOut.phone" />

                        </div>
                 
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" v-model="checkOut.email"  >

                        </div>
                        <div class="form-group">
                            <label>city</label>
                            <input type="text" v-model="checkOut.city"  >

                        </div>
                        <div class="form-group">
                            <label>address</label>
                            <input type="text" v-model="checkOut.address"  >

                        </div>
                        <div class="form-group">
                            <label>state</label>
                            <input type="text" v-model="checkOut.state"  >

                        </div>
                        <div class="form-group">
                            <label>zipcode</label>
                            <input type="text" v-model="checkOut.zipcode"  >

                        </div>
                     
                        <button @click="CheckOutSubmit">Check Out</button>
                    </form>
            </div>
         
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import '../styles/place.scss'
import toastr from 'toastr'

export default {

    data(){
        return{
            checkOut:{
                firstname:'',
                lastname:'',

                email:'',
                address:'',
                state:'',
                phone:'',
                city:'',
                zipcode:'',


            } 
        }
    },

    mounted(){
        this.checkAuth()

    },

    methods:{
        checkAuth(){
            if(!localStorage.getItem('token'))
            {
                this.$router.push('/')
                toastr.error('you must login first')
            }
        },

        CheckOutSubmit(e){
            e.preventDefault();
            let fd=new FormData()
            fd.append('firstname',this.checkOut.firstname)
            fd.append('lastname',this.checkOut.lastname)
            fd.append('email',this.checkOut.email)
            fd.append('address',this.checkOut.address)
            fd.append('state',this.checkOut.state)
            fd.append('phone',this.checkOut.phone)
            fd.append('city',this.checkOut.city)
            fd.append('zipcode',this.checkOut.zipcode)

            axios.post('insert-checout',fd).then(res=>{
                if(res.data.status===200)
                {
                    this.$router.push('/')
                    toastr.success(res.data.message)

                }
            })

        }

    }
}
</script>
<style lang="">
    
</style>