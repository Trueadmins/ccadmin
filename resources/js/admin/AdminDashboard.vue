<template>
    <v-container fluid>
        <v-row align="end">
            <v-col cols="12" md="8">
                <v-card class="rounded-lg h-100">
                    <v-card-item :title="'Welcome ' + $store.state.user.name"
                                 subtitle="subtitle" prependIcon="mdi-account" appendIcon="mdi-dots-vertical"></v-card-item>
                    <v-card-text>
                        You are welcomed here to see all kind of data analytics.
                    </v-card-text>
                </v-card>
            </v-col>
            <v-col cols="12" md="4">
                <v-card class="rounded-lg h-100">
                    <v-card-item title="Users" :subtitle="'Total Users '+ users_count" appendIcon="mdi-account-group"></v-card-item>
                    <v-card-text>
                        <v-row class="justify-center text-center">
                            <v-col cols="6">
                                <div>Verified</div>
                                <div>2</div>
                            </v-col>
                            <v-col cols="6">
                                <div>UnVerified</div>
                                <div>1</div>
                            </v-col>
                        </v-row>
                    </v-card-text>
                    <v-card-actions>
                        <v-btn link :to="{name:'UsersList'}" block color="orange" variant="tonal">All Users</v-btn>
                    </v-card-actions>
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
export default {
    name: "AdminDashboard",
    data(){
        return{
            users_count:'',
        }
    },
    mounted() {
        this.getSadminDashboard();
    },
    methods:{
        getSadminDashboard(){
            axios.get('/admin/dashboard')
                .then((resp)=>{
                    this.users_count = resp.data.users;
                    console.log(resp.data)
                })
        }
    }
}
</script>
<style scoped>

</style>
