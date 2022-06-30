<template>
    <section class="articles">
        <h1>Articoli</h1>
        <div class="container">
            <div class="row" v-if="posts.length > 0">
                <!-- <ul v-if="posts.length > 0">
                    <li v-for="(post,index) in posts" :key="post.id">
                        <img :src="`/storage/${post.image}`" onerror="this.src='/img/not_found.png';" alt="">
                        {{index}} - {{post.title}}
                    <router-link :to="{ name: 'single-post', params: { slug: post.slug } }">Visualizza Post</router-link>
                    </li>
                </ul> -->
                <div class="col-lg-6 myPost p-5" v-for="(post) in posts" :key="post.id">
                    <img :src="`/storage/${post.image}`" onerror="this.src='/img/not_found.png';" alt="">
                    <h2><router-link :to="{ name: 'single-post', params: { slug: post.slug } }">{{post.title}}</router-link></h2>
                    <p>{{post.content}}</p>
                    <small>{{post.category}}</small>
                </div>
            </div>
            
        </div>
        
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
            console.log(this.posts)
        }).catch((error)=>{
            console.log(error);
        })
    }
}
</script>
<style lang="scss">
    .articles {
        h1 {
            padding-top: 1rem;
        }
        .myPost {
            display: flex;
            flex-flow: column nowrap;
            img {
                width: 100%;
                box-shadow: 0px 0px 31px 6px #afafaf;
            }
            h2 {
                padding-top: 1rem;
            }
            a {
                color: black;
                text-decoration: none;
                font-weight: bolder;
            }
        }
    }
</style>