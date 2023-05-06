<template lang="">
    <div class='products'>
        <div class="container">
            <div class="con-text">
                <h4>Trendings Products</h4>
                <p>Check the hottest designs of the week. These rising stars are worth your attention.</p>
            </div>
            <div class="row">
                <div v-for="item in ProductData" :key="item.id" class="col">
                    <img :src="`http://localhost:8000/${item.img}`"  alt="">
                    <router-link :to="`product/${item.id}`">
                      <h4>{{item.name}}</h4>
                   </router-link>
                   <p>{{item.description}}</p>
                   <label>${{item.price}}</label>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import '../../styles/home.scss'
import axios from 'axios';

export default {
    name:'products',
    data(){
        return{

            ProductData:[],
            searchCheck:false,
         
        }
    },

    mounted(){
        this.getProduct()
    },


    methods:{
        getProduct(){
            axios.get('get-product').then(res=>{
                if(res.data.status===200)
                {
                    this.ProductData=res.data.product
                }
            })
        },
    }
}
</script>
<style lang="">
    
</style>