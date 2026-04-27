<template>
    <v-app>
        <v-navigation-drawer v-model="drawer" mobileBreakpoint="md"
                             :temporary="!isDesktop"
                             location="left">
            <v-list nav activeClass="bg-primary" density="compact" class="d-flex flex-column h-screen">
                <v-list-item baseColor="dark" >
                    <v-list-item-title><v-img src="/images/logobig.png"/></v-list-item-title>
                </v-list-item>
                <v-divider></v-divider>
                <v-list-item v-if="isSuperadmin" title="Dashboard" link :to="{name:'AdminDashboard'}" prepend-icon="mdi-view-dashboard-outline"></v-list-item>
                <v-list-item v-if="isSuperadmin" title="Couriers" link :to="{name:'CouriersList'}" prepend-icon="mdi-truck"></v-list-item>
                <v-list-item v-if="isSuperadmin" title="Companies" link :to="{name:'CompanyList'}" prepend-icon="mdi-domain"></v-list-item>
                <v-list-item v-if="isSuperadmin" title="Users" link :to="{name:'UsersList'}" prepend-icon="mdi-account-group"></v-list-item>
                <v-list-item v-if="isSuperadmin" title="Countries" link :to="{name:'CountryList'}" prepend-icon="mdi-earth"></v-list-item>
                <v-list-item v-if="isSuperadmin" title="Shipments" link :to="{name:'AdminShipments'}" prepend-icon="mdi-truck-fast"></v-list-item>
<!--                <v-list-item title="Shipments" link :to="{name:'ShipmentDashboard'}" prepend-icon="mdi-truck-fast"></v-list-item>-->
                <v-list-item v-if="isUser" title="Shipment New" link :to="{name:'ShipmentNew'}" prepend-icon="mdi-truck-plus"></v-list-item>
                <v-spacer/>
                <v-divider class="my-1"></v-divider>
                <v-list-item-title>
                    <v-btn @click="logout" variant="outlined" size="small" block title="Logout">Logout</v-btn>
                </v-list-item-title>
            </v-list>
        </v-navigation-drawer>
        <v-main class="py-1 bg-grey-lighten-5">
            <v-icon class="hidden-md-and-up" @click="drawer = !drawer">{{drawer ? 'mdi-menu-open' : 'mdi-menu-open'}}</v-icon>
            <router-view/>
        </v-main>
    </v-app>
</template>
<script>
import axios from "axios";
import {Country} from "country-state-city";
export default {
    name: "App",
    data(){
        return{
            drawer:false,
        }
    },
    computed: {
        isDesktop() {
            return this.$vuetify.display.mdAndUp;
        },
        acountries(){
            return Country.getAllCountries();
        },
        isUser(){
            return this.$store.getters.isUser;
        },
        isSuperadmin(){
            return this.$store.getters.isSuperadmin;
        }
    },
    watch: {
        isDesktop(val) {
            this.drawer = val; // open by default on desktop
        }
    },
    mounted() {
        this.drawer = this.isDesktop;
    },
    methods:{
        async logout(){
            await axios.post('/logout')
                .then(()=>{
                    this.$store.commit('LOGOUT');
                    window.location.href = '/login';
                })
        },
        async getAllCountries(){
            await axios.post('/admin/all/countries',{
                countries:this.acountries,
            })
                .then((resp)=>{
                    console.log('resp c',resp);
                })
        }
    }
}
</script>

<style scoped>

</style>
