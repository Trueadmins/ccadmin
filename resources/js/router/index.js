import { createRouter, createWebHistory} from "vue-router";

import AdminDashboard from "@/admin/AdminDashboard.vue";
import UsersList from "@/admin/UsersList.vue";
import CountryList from "@/admin/countries/CountryList.vue";
import CompanyList from "@/admin/companies/CompanyList.vue";
import CompanyAdd from "@/admin/companies/CompanyAdd.vue";
import CompanyEdit from "@/admin/companies/CompanyEdit.vue";
import CouriersList from "@/admin/couriers/CouriersList.vue";
import AdminShipments from "@/admin/shipment/AdminShipments.vue";
import ShipmentDashboard from "@/admin/shipment/ShipmentDashboard.vue";
import ShipmentNew from "@/admin/shipment/ShipmentNew.vue";

const routes = [
    {path:'/dashboard',name:"AdminDashboard",component:AdminDashboard},
    {path:'/users',name:"UsersList",component:UsersList},
    {path:'/country/list',name:'CountryList',component: CountryList},
    {path:'/company/list',name:'CompanyList',component: CompanyList},
    {path:'/company/add',name:'CompanyAdd',component: CompanyAdd},
    {path:'/company/edit/:id',name:'CompanyEdit',component: CompanyEdit,props:true},
    {path:'/couriers/list',name:'CouriersList',component: CouriersList},
    {path:'/shipments',name:'AdminShipments',component: AdminShipments},
    {path:'/shipment/dashboard',name:'ShipmentDashboard',component: ShipmentDashboard},
    {path:'/shipment/new',name:'ShipmentNew',component: ShipmentNew},

]
const router = createRouter({
    history:createWebHistory(),
    routes
})
export default router;
