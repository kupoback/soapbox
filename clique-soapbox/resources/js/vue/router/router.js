import {createWebHistory, createRouter} from "vue-router";

import Home from "../components/Views/Home.vue";
import Team from "../components/Views/Team.vue";
import Profile from "../components/Views/Profile.vue";

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home,
    },
    {
        name: 'teams',
        path: '/teams',
        component: Team
    },
    {
        name: 'profile',
        path: '/profile',
        component: Profile
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
