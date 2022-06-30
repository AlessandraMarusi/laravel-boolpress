<template>
    <main class="container">
        <router-view></router-view>
    </main>


</template>
<script>
export default {
    name: 'MainComponent',
    data(){
        return {
            posts: []

        }
    }

}
</script>
<style lang="scss">

</style>