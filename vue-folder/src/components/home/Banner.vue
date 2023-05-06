<template lang="">
    <div class='banner'>
        <div class="container">
            <div class="row">
                <div class="col" v-for="item in banner" ::key="item.name">
                   <img :src="item.img" alt="">
                   <div class="col-text">
                      <h4>{{item.name}}</h4>
                      <p>{{item.p}}</p>
                      <button>SHOP NOW</button>
                   </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import '../../styles/home.scss'
export default {
    name:'banner',
    data(){
        return{
            banner:[
                {
                    img:'/images/banner/b2.png',
                    name:'Simple IPhone Mockups Design PSD, Ai, EPS',
                    p:'Sale 30% Off For Members',

                },
                {
                    img:'/images/banner/b1.png',
                    name:'Mockup PSD50+ Ui Screen Mockups',
                    p:'Sale 30% Off For Members',

                },
                

            ]
        }
    }
}
</script>
<style lang="">
    
</style>