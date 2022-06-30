<template>
    <header class="border-bottom border-secondary">
        <div class="container">
            <h1 class="pt-4"><span class="text-white titleText">Foodie</span> blog</h1>
        </div>
        <nav class="container navbar navbar-expand-lg ">
            <!-- <router-link :to="{ name: menuItem[0].routeName }" class="navbar-brand">{{menuItem[0].label}}</router-link> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
                <div class="navbar-nav w-100">
                    <div v-for="(item,index) in menuItem" :key="index" class="pr-1">
                         <router-link :to="{ name: item.routeName }" class="nav-link text-dark">{{item.label}} </router-link>
                    </div>
                    <div class="empty"></div>
                    <div><a class="nav-link text-dark" href="/admin">Login</a></div>
                </div>
            </div>
        </nav>
    </header>
</template>
<script>
export default {
    name: 'HeaderComponent',
    data(){
        return {
             menuItem: [
        		{
					label: 'Home',
					routeName: 'home'
				},
				{
					label: 'Posts',
					routeName: 'posts'
				},
				{
					label: 'Chi Siamo',
					routeName: 'about'
				},
				{
					label: 'Contatti',
					routeName: 'contact'
				}
    ]
        }
    }


}
</script>
<style lang="scss">
@import '../../sass/variables';
 .router-link-exact-active{
    color: $prova;
    /* color: red !important; */
 }
 .empty {
    flex-grow: 1;
    visibility: hidden;
 }
 header {
    .titleText {
        background-color: rgb(151, 98, 151);
    }
    nav {
        font-size: 1.3rem;
    }
 }
</style>