<template>
    <v-container fluid>
        <v-card>
            <v-text-field variant="outlined" density="compact" class="pa-2" prependInnerIcon="mdi-magnify"
                          label="Search Users" hide-details></v-text-field>
            <v-data-table :items="users" density="compact"></v-data-table>
        </v-card>

    </v-container>
</template>
<script>
import axios from "axios";

export default {
    name: "UsersList",
    data(){
        return{
            users:[],
        }
    },
    mounted() {
        this.getAllUsers();
    },
    methods:{
        getAllUsers(){
            axios.get('/admin/users')
                .then((resp)=>{
                    this.users = resp.data.users;
                })
        }
    }
}
</script>

<style scoped>

</style>
