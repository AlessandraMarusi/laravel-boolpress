import Vue from 'vue';

import VueRouter from 'vue-router';

Vue.use(VueRouter);

import HomeComponent from './pages/HomeComponent';
import AboutComponent from './pages/AboutComponent';
import PostsComponent from './pages/PostsComponent';
import ContactComponent from './pages/ContactComponent';
import SinglePostComponent from './pages/SinglePostComponent';
import NotFoundComponent from './pages/NotFoundComponent';

const router = new VueRouter({
    mode: "history", //per non fargli mettere il cancelletto
    routes: [
        {
            path: '/',
            name: 'home',
            meta: {nome: 'Alessandra'},
            component: HomeComponent
        },
        {
            path: '/about',
            name: 'about',
            component: AboutComponent
        },
        {
            path: '/posts',
            name: 'posts',
            component: PostsComponent
        },
        {
            path: '/contact',
            name: 'contact',
            component: ContactComponent
        },
        {
            path: '/posts/:slug',
            name: 'single-post',
            component: SinglePostComponent
        },
        {
            path: '*',
            name: 'page-404',
            component: NotFoundComponent
        }
    ]
});

export default router;