import { createRouter, createWebHistory} from "vue-router";

import AdminDashboard from "@/admin/AdminDashboard.vue";
import UsersList from "@/admin/UsersList.vue";
import ShipmentDashboard from "@/admin/shipment/ShipmentDashboard.vue";
import ShipmentNew from "@/admin/shipment/ShipmentNew.vue";

const routes = [
    {path:'/dashboard',name:"AdminDashboard",component:AdminDashboard},
    {path:'/users',name:"UsersList",component:UsersList},
    {path:'/shipment/dashboard',name:'ShipmentDashboard',component: ShipmentDashboard},
    {path:'/shipment/new',name:'ShipmentNew',component: ShipmentNew}
]
const router = createRouter({
    history:createWebHistory(),
    routes
})
export default router;
