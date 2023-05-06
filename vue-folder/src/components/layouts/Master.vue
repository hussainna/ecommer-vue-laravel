<template lang="">
    <div>
      <SidebarVue/>


	<!-- CONTENT -->
	<section id="content">
		<Nav/>

		<MainVue/>
	</section>
	<!-- CONTENT -->
	

    </div>
</template>
<script>
import './style.css'
import SidebarVue from './sidebar/Sidebar.vue';
import Nav from './home/Nav.vue';
import MainVue from './home/Main.vue';

export default {
    components:{
        SidebarVue,
        Nav,
        MainVue
    }
}
</script>
<style lang="">
    
</style>