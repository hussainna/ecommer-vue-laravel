<template lang="">
    <div class='comment'>
        <div class="container">
            <div class="con-text">
                <h4>Choose The Plans</h4>
                <p>Meet our newbies! The latest templates uploaded to the marketplace.</p>
            </div>
            <div class="row">
                <div class="col" v-for="item in comments" :key="item.name">
                    <i class="fa-solid fa-quote-left"></i>
                    <p>{{item.p}}</p>
                    <h4>{{item.name}}</h4>
                    <p>{{item.job}}</p>
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
            comments:[
                {
                    name:'ALGISTINO',
                    p:'"Congue condimentum et non eu arcu sociis aenean vivamus quisque. Porta purus urna. Massa id blandit enim cursus ante, nec consectetuer imperdiet ipsum"',
                    job:'Marketing Company Director',
                },
                {
                    name:'Alasdy',
                    p:'"Congue condimentum et non eu arcu sociis aenean vivamus quisque. Porta purus urna. Massa id blandit enim cursus ante, nec consectetuer imperdiet ipsum"',
                    job:'Full Stack Developer',
                },
                {
                    name:'Hassan',
                    p:'"Congue condimentum et non eu arcu sociis aenean vivamus quisque. Porta purus urna. Massa id blandit enim cursus ante, nec consectetuer imperdiet ipsum"',
                    job:'Marketing Company Director',
                },
                
            ]
        }
    }
}
</script>
<style lang="">
    
</style>