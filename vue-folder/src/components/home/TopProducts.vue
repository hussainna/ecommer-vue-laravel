<template lang="">
    <div class='top-products'>
        <div class="container">
            <div class="top-text">
                <div class="left">
                    <h4>Top Selling Products</h4>
                    <p>Meet our newbies! The latest templates uploaded to the marketplace.</p>
                </div>
                <div class="right">
                    <ul>
                        <button @click="getProduct">All</button>
                        <button @click="ProductAsCategory(item.id)" v-for="item in categoryData" :key="item.id">
                          {{item.name}}
                        </button>

                    </ul>
                </div>
            </div>

            <div class="row">
                <div v-for="item in ProductData" :key="item.id" class="col">
                    <img :src="`http://localhost:8000/${item.img}`"  alt="">
                   <h4>{{item.name}}</h4>
                   <p>{{item.desc}}</p>
                   <label>${{item.price}}</label>
                </div>
            </div>
            
        </div>
    </div>
</template>
<script>
import axios from 'axios';

export default {
    name:'topProduct',
    data(){
        return{
            ProductData:[],
            categoryData:[],
        }
    },
    mounted() {
        this.getCategory()
        this.getProduct()

    },


    methods:{
        getCategory(){
            axios.get('get-category').then(res=>{
                if(res.data.status===200)
                {
                    this.categoryData=res.data.category;

                }
            })
        },

        ProductAsCategory(id){
            const category_id=id
            console.log(category_id)
            axios.get(`product_category/${category_id}`).then(res=>{
                if(res.data.status===200)
                {
                    this.ProductData=res.data.product
                }
            })
        },

        getProduct(){
            axios.get('get-product').then(res=>{
                if(res.data.status===200)
                {
                    this.ProductData=res.data.product
                }
            })
        },
    },


    
}
</script>
<style lang="">
    
</style>