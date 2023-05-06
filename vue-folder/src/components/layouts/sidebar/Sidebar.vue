<template lang="">
    <div>
             	<!-- SIDEBAR -->
	<section id="sidebar">
		<routerLink to="/admin/dashboard" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">AdminHub</span>
		</routerLink>
		<ul class="side-menu top">
			<li class="active">
				<routerLink to="/admin/dashboard">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</routerLink>
			</li>
			<li>
				<routerLink to="/admin/products">
					<i class='bx bxs-shopping-bag-alt' ></i>
					<span class="text">Products</span>
				</routerLink>
			</li>
			<li>
				<routerLink to="/admin/category">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">Category</span>
				</routerLink>
			</li>
			<li>
				<routerLink to="/admin/dashboard">
					<i class='bx bxs-message-dots' ></i>
					<span class="text">Message</span>
				</routerLink>
			</li>
			<li>
				<routerLink to="/admin/dashboard">
					<i class='bx bxs-group' ></i>
					<span class="text">Team</span>
				</routerLink>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<routerLink to="/admin/dashboard">
					<i class='bx bxs-cog' ></i>
					<span class="text">Settings</span>
				</routerLink>
			</li>
			<li>
				<routerLink to="/admin/dashboard" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</routerLink>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->


    </div>
</template>
<script>
import '../style.css'
export default {
    
}
</script>
<style lang="">
    
</style>