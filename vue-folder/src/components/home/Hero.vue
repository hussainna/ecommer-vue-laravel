<template lang="">
    <div class='hero'>
       <div class="container">
          <div class="top">
            <h4>Over <span>6,500 </span>Curated Design
Resources, <span>Graphic & Website</span> Templates
        </h4>
        <p>High-quality Design Themes for personal or commercial use contains 6k+ items in 100 categories.</p>
        <div class="input-group">
            <label>All Category</label>
            <input type="text" v-model="search" placeholder='Search Products' name="" id="">
            <i @click="searchForm" class="fa-solid fa-magnifying-glass"></i>
        </div>
        <p>Examples: Mockup, PSD, Theme Design, Image…</p>
       </div>

       <div class="bottom">
            <div class="item" v-for="item in category" :key="item.name">
               <img :src="item.img" alt="">
               <div class="item-text">
                <h5>{{item.name}}</h5>
                <p>Items {{item.items}}</p>
               </div>
            </div>
          </div>

          </div>

         
    </div>
</template>
<script>
import axios from 'axios'
import '../../styles/home.scss'
export default {
    name:'hero',
    data(){
        return{
            category:[
            {
                name:'Web Themes',
                items:5,
                img:'/images/hero/cate-h11_1.png',
            },
            {
                name:'Design',
                items:12,
                img:'/images/hero/cate-h11_2.png',
            },
            {
                name:'3D Models',
                items:12,
                img:'/images/hero/cate-h11_3.png',
            },
            {
                name:'Image Stack',
                items:15,
                img:'/images/hero/cate-h11_5.png',
            },
            {
                name:'Mockup Design',
                items:17,
                img:'/images/hero/cate-h11.png',
            },
            
        ],

        search:''
        }
    },

    

    methods:{
       searchForm(){
        axios.get(`search-product/${this.search}`).then(res=>{
            if(res.data.status===200)
            {
                console.log(res.data.product)
            }
        })
       }
    }
}
</script>
<style lang="">
    
</style>