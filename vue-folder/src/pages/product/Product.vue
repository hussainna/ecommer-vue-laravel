<template lang="">
    <Header/>
    <div class='product'>
        <div class="container">
            <div class="card">
                <img :src="`http://localhost:8000/${product.img}`"  alt="">
                <div class="right">
                    <h4>{{product.name}}</h4>
                 
                    <label>${{product.price}}</label>
                    <div class="qty">
                        <button @click="increment">+</button>
                        <label>{{Qty}}</label>
                        <button @click="decrement">-</button>
                    </div>
                    <p>{{product.description}}</p>
                    <button @click="insertCart">Add To Cart</button>
                    <router-link to="/cart">Show Cart</router-link>
                </div>
            </div>
        </div>
    </div>
    <Footer/>
</template>
<script>
import '../../styles/product.scss'
import Header from '../../components/common/Header.vue'
import Footer from '../../components/common/Footer.vue'
import axios from 'axios'
import toastr from 'toastr'


export default {

    data(){
        return {
            product:[],
            Qty:1,
        }
    },

    mounted(){
        this.checkAuth()
        this.getProduct()
    },

    methods:{
        getProduct(){
            const product_id=this.$route.params.id
            axios.get(`single-product/${product_id}`).then(res=>{
                if(res.data.status===200)
                {
                    this.product=res.data.product
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

        increment(){
            if(this.Qty>0)
            {
                this.Qty++
            }
        },
        decrement(){
            if(this.Qty>1)
            {
                this.Qty--
            }
        },

        insertCart(e){
        e.preventDefault()
        let fd=new FormData()
        fd.append('qty',this.Qty);
        fd.append('product_id',this.product.id)

        axios.post('insert-cart',fd).then(res=>{
            if(res.data.status===200)
            {
                toastr.success(res.data.message)
            }
            else
            {
                toastr.error(res.data.message)

            }
        })
    }

    },

    components:{
        Header,
        Footer,
    },

   
   

}
</script>
<style lang="">
    
    /* Web Themes	web	web description	Edit	Delete
Design	Design slug	Design description	Edit	Delete
Models	3D Models slug	3D Models descriptionj	Edit	Delete
Mockup */


/* Floating 2021 iPhone 12 Mockups (PSD) */

</style>