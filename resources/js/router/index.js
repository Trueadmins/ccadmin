import { createRouter, createWebHistory} from "vue-router";

import AdminDashboard from "@/admin/AdminDashboard.vue";

const routes = [
    {path:'/dashboard',name:"AdminDashboard",component:AdminDashboard},
]
const router = createRouter({
    history:createWebHistory(),
    routes
})
export default router;
