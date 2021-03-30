import {createWebHistory, createRouter} from "vue-router";

import Home from "../components/Views/Home.vue";
import Teams from "../components/Views/Teams.vue";
import Agenda from "../components/Views/Agenda.vue";
import Profile from "../components/Views/Profile.vue";

export const routes = [
    {
        name: 'Home',
        path: '/',
        component: Home,
    },
    {
        name: 'Teams',
        path: '/Teams',
        component: Agenda,
    },
    // {
    //     name: 'Agenda List',
    //     path: '/agenda-list',
    //     component: Agenda,
    // },
    // {
    //     name: 'Agenda List',
    //     path: '/agenda-list/:id',
    //     component: Agenda,
    // },
    {
        name: 'Profile',
        path: '/profile',
        component: Profile
    },
    {
        name: 'Logout',
        path: '/log-out',
        component: Profile
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
