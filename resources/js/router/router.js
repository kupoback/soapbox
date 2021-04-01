import {createWebHistory, createRouter} from "vue-router";

import Home from "../components/Views/Home.vue";
import Teams from "../components/Views/Teams.vue";
import Agenda from "../components/Views/Agenda.vue";
import Profile from "../components/Views/Profile.vue";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home,
        meta: { title: 'Home' }
    },
    {
        name: 'teams',
        path: '/teams',
        component: Teams,
        meta: { title: 'Teams' }
    },
    {
        name: 'agenda list',
        path: '/agenda-list',
        component: Agenda,
        meta: { title: 'Agenda List' }
    },
    {
        name: 'agenda item list',
        path: '/agenda-list/:id',
        component: Agenda,
    },
    {
        name: 'profile',
        path: '/profile',
        component: Profile,
        meta: { title: 'Profile' }
    },
    {
        name: 'logout',
        path: '/log-out',
        component: Profile,
        meta: { title: 'Logout' }
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
