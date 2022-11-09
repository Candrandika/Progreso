import {createRouter, createWebHistory} from 'vue-router';

import Home from '../pages/Home.vue'
import About from '../pages/About.vue'
import Event from '../pages/Event.vue'
import Profile from '../pages/Profile.vue'
import EventDetails from '../pages/EventDetails.vue'
import CreateCountdown from '../pages/CreateCountdown.vue'
import ExamplePage from '../pages/ExamplePage.vue'
import Login from '../pages/Login.vue'
import Register from '../pages/Register.vue'
import NotFound from '../pages/NotFound.vue'
import EventAdd from '../pages/EventAdd.vue'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/about',
        name: 'About',
        component: About
    },
    {
        path: '/profile',
        name: 'Profile',
        component: Profile
    },
    {
        path: '/example',
        name: 'Example',
        component: ExamplePage
    },
    {
        path: '/event',
        name: 'Events',
        component: Event
    }, {
        path: '/event/:id',
        name: 'EventDetails',
        component: EventDetails,
        props: true
    }, {
        path: '/event/add',
        name: 'EventAdd',
        component: EventAdd
    }, {
        path: '/:pathMatch(.*)*',
        name: 'NotFound',
        component: NotFound
    }
]

const router = createRouter({
    history: createWebHistory(),
    linkActiveClass: 'l',
    routes
})

export default router