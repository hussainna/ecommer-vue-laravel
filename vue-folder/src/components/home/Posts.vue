<template lang="">
    <div class='posts'>
        <div class="container">
            <div class="con-text">
                <h2>LATEST BLOG POSTS</h2>
        <p>Latest marketplace news, success stories and tutorials.</p>
            </div>

            <div class="row">
                <div class="col" v-for="item in blog" :key="item.name">
                    <img :src="item.img" alt="">
                    <div class="col-text">
                        <button>{{item.button}}</button>
                        <div class="bottom">
                            <p>Post Date : <span>{{item.p}}</span></p>
                            <h4>{{item.name}}</h4>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</template>
<script>
import '../../styles/home.scss'
export default {
    data(){
        return{
            blog:[
                {
                    img:'/images/blog/b1.jpg',
                    name:'Transition Your Favorite Looks',
                    p:'October 27, 2021',
                    button:'Image',
                },
                {
                    img:'/images/blog/b2.jpg',
                    name:'Meeting Breathtaking Beauty for',
                    p:'October 27, 2021',
                    button:'Shopping',
                },
                {
                    img:'/images/blog/b3.jpg',
                    name:'Perfect Quality Reasonable Price',
                    p:'October 27, 2021',
                    button:'Travle',
                },
            ]
        }
    }
}
</script>
<style lang="">
    
</style>