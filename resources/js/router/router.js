import {createWebHistory, createRouter} from "vue-router";

import Home from "../components/Views/Home.vue";
import Teams from "../components/Views/Teams.vue";
import Agenda from "../components/Views/Agenda.vue";
import Profile from "../components/Views/Profile.vue";
import NotFound from "../components/Views/NotFound.vue";

export const routes = [
    {
        name: "not found",
        path: '/:pathMatch(.*)*',
        component: NotFound,
        meta: { title: "Not Found", }
    },
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
        name: 'teams-list',
        path: '/teams/:slug',
        component: Agenda,
        meta: { title: 'Teams List' }
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
    linkExactActiveClass: "fw-bold",
    routes: routes,
});

export default router;
