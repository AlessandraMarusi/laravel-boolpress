<template>
    <section>
        <h1> Posts</h1>
        <ul v-if="posts.length > 0">
            <li v-for="(post,index) in posts" :key="post.id">
                <img :src="`/storage/${post.image}`" onerror="this.src='/img/not_found.png';" alt="">
                {{index}} - {{post.title}}
            <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">Visualizza Post</router-link>
            </li>
        </ul>
    </section>
</template>
<script>
export default {
    name: 'PostsComponent',
    data(){
        return {
            posts: []
        }
    },
    created(){
        axios.get('/api/posts').then((response)=>{
            this.posts = response.data;
        }).catch((error)=>{
            console.log(error);
        })
    }
}
</script>
<style lang="scss">

</style>