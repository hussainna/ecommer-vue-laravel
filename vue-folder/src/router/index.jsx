import { createRouter,createWebHistory } from "vue-router";
import Home from '../pages/Home.vue'
import Product from '../pages/product/Product.vue'
import Register from '../pages/auth/Register.vue'
import Login from '../pages/auth/Login.vue'
import Dashboard from '../pages/admin/Dashboard.vue'
import ProductPage from '../pages/admin/ProductPage.vue'
import Category from '../pages/admin/Category.vue'
import AddCategory from '../pages/admin/AddCategory.vue'
import EditCategory from '../pages/admin/EditCategory.vue'
import AddProductPage from '../pages/admin/AddProductPage.vue'
import EditProductPage from '../pages/admin/EditProductPage.vue'
import Cart from '../pages/Cart.vue';
import PlaceOrder from '../pages/PlaceOrder.vue'

const routes=[
    {
        path:'/',
        component:Home,
    },
    {
        path:'/product/:id',
        component:Product,
    },
    {
        path:'/auth/register',
        component:Register,
    },
    {
        path:'/auth/login',
        component:Login,
    },
    {
        path:'/admin/dashboard',
        component:Dashboard,
    },
    {
        path:'/admin/products',
        component:ProductPage,
    },
    {
        path:'/admin/category',
        component:Category,
    },
    {
        path:'/admin/add-category',
        component:AddCategory,
    },
    {
        path:'/admin/edit-category/:id',
        component:EditCategory,
    },
    {
        path:'/admin/add-product',
        component:AddProductPage,
    },
    {
        path:'/admin/edit-product/:id',
        component:EditProductPage,
    },
    {
        path:'/cart',
        component:Cart,
    },
    {
        path:'/place-older',
        component:PlaceOrder,
    },
]

const router=createRouter({
    history:createWebHistory(),
    routes
});

export default router;
