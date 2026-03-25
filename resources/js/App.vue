<template>
    <v-app>
        <v-navigation-drawer v-model="drawer"
                             :temporary="!isDesktop"
                             :location="$vuetify.display.mobile ? 'left' : undefined">
            <v-list nav activeClass="bg-orange-darken-2" density="compact" class="d-flex flex-column h-screen">
                <v-list-item baseColor="dark" >
                    <v-list-item-title><v-img src="/images/logobig.png"/></v-list-item-title>
                </v-list-item>
                <v-divider></v-divider>
                <v-list-item title="Dashboard" link :to="{name:'AdminDashboard'}" prepend-icon="mdi-view-dashboard-outline"></v-list-item>
                <v-list-item title="Users" link :to="{name:'UsersList'}" prepend-icon="mdi-account-group"></v-list-item>
                <v-list-item title="Shipments" link :to="{name:'ShipmentDashboard'}" prepend-icon="mdi-truck-fast"></v-list-item>
                <v-spacer/>
                <v-divider class="my-1"></v-divider>
                <v-list-item-title>
                    <v-btn @click="logout" variant="outlined" size="small" block title="Logout">Logout</v-btn>
                </v-list-item-title>
            </v-list>
        </v-navigation-drawer>
        <v-main class="py-1 bg-grey-lighten-5">
            <router-view/>
        </v-main>
    </v-app>
</template>
<script>
import axios from "axios";
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
    }
}
</script>

<style scoped>

</style>
