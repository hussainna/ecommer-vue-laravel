<template lang="">
    <div>
        <Header/>
        <Hero/>
        <Products/>
        <Banner/>
        <TopProducts/>
        <Plans/>
        <Comment/>
        <Posts/>
        <Footer/>
    </div>
</template>
<script>
import Header from '../components/common/Header.vue'
import Hero from '../components/home/Hero.vue'
import Products from '../components/home/Products.vue'
import Banner from '../components/home/Banner.vue'
import TopProducts from '../components/home/TopProducts.vue'
import Comment from '../components/home/Comment.vue'
import Posts from '../components/home/Posts.vue'
import Footer from '../components/common/Footer.vue'


export default {
    name:'home',

    components:{
        Header,
        Hero,
        Products,
        Banner,
        TopProducts,
        Comment,
        Posts,
        Footer,
    }
}
</script>
<style lang="">
    
</style>