<template lang="">
    <Header/>
    <div class="cart">
            <table>
                    <tr>
                       <th>Name</th>
                       <th>Price</th>
                       <th>Quantity</th>
                       <th>Img</th>
                    </tr>

                    <tr v-for="item in cart" :key="item.id">

                        <td>{{item.products.name}}</td>
                        <td>{{item.products.price}}</td>
                        <td>{{item.qty}}</td>
                        <img :src="`http://localhost:8000/${item.products.img}`" alt="">
                        <td><button @click="deleteCart(item.id)">Delete</button></td>
                    </tr>
                 
               </table>

             <div class="total">
                <h4>Price: {{Prices}}</h4>
                <h4>Amount: {{qtys}}</h4>
                <hr>
                <h4>Total: {{total}}</h4>
                <routerLink class="btn-add" to="/place-older">Place Order</routerLink>
             </div>

    </div>
    <Footer/>
</template>
<script>
import Header from '../components/common/Header.vue'
import Footer from '../components/common/Footer.vue'
import '../styles/cart.scss'
import axios from 'axios'
import toastr from 'toastr'

export default {
    data(){
        return{
            cart:[],
            total:0,
            Prices:0,
            qtys:0,

        }
    },
    components:{
        Header,
        Footer,
    },

    mounted(){
        this.getCart()
        this.checkAuth()

    },

    methods:{
        getCart(){
            axios.get('get-cart').then(res=>{
                if(res.data.status===200)
                {
                    this.cart=res.data.cart
                    this.cart.forEach((item, index) => {
                        this.total=item.qty *item.products.price
                        this.Prices=item.products.price+item.products.price
                        this.qtys=item.qty
                   })
                }
            })
        },

        checkAuth(){
            if(!localStorage.getItem('token'))
            {
                this.$router.push('/')
                toastr.error('you must login first')
            }
        },


        deleteCart(id){
            axios.post(`delete-cart/${id}`).then(res=>{
                if(res.data.status===200)
                {
                    toastr.success(res.data.message)
                    this.$router.go(this.$router.currentRoute)


                }
            })
        },
    
    }
}
</script>
<style lang="">
    
</style>