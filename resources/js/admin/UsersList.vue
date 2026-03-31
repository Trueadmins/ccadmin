<template>
    <v-container fluid>
        <v-row align="center" density="compact">
            <v-col cols="12" md="8">
                <h2>All Users</h2>
                <p>Track your users and active users in real time</p>
            </v-col>
            <v-col cols="12" md="4">
                <v-btn @click="addUserDialog = true" color="success" variant="elevated" size="small" prependIcon="mdi-plus">Create New User</v-btn>
            </v-col>
        </v-row>
        <v-card>
            <v-text-field variant="outlined" density="compact" class="pa-2" prependInnerIcon="mdi-magnify"
                          label="Search Users" hide-details></v-text-field>
            <v-data-table :items="users" :headers="userHeaders" density="compact" mobileBreakpoint="sm">
                <template v-slot:item.status="{item}">
                    <v-chip v-if="item.status === 'active'" density="compact" size="small" variant="outlined" color="success" class="font-weight-bold">Active</v-chip>
                    <v-chip v-else density="compact" size="small" variant="outlined" color="error" class="font-weight-bold">Inactive</v-chip>
                </template>
                <template v-slot:item.email_verified_at="{item}">
                    <v-icon v-if="item.email_verified_at !== null" color="success">mdi-account-check</v-icon>
                    <v-icon v-else color="red">mdi-account-alert</v-icon>
                </template>
                <template v-slot:item.created_at="{item}">
                   {{dayjs(item.created_at)}}
                </template>
                <template v-slot:item.updated_at="{item}">
                    {{dayjs(item.updated_at)}}
                </template>
                <template v-slot:item.actions="{item}">
                    <v-btn @click="editItem(item)" color="primary" variant="elevated" size="small" density="comfortable" prependIcon="mdi-pencil">
                        edit
                    </v-btn>
                </template>
            </v-data-table>
        </v-card>
        <v-dialog v-model="addUserDialog" maxWidth="400">
            <v-card>
                <v-card-title>Add New User</v-card-title>
                <v-card-text>
                    <v-text-field v-model="defaultItem.name" prependInnerIcon="mdi-account" label="Name" variant="outlined" density="compact"
                                  type="text" persistent-placeholder placeholder="Full Name"/>
                    <v-text-field v-model="defaultItem.email" prependInnerIcon="mdi-email" label="Email" variant="outlined" density="compact"
                                  type="email" persistentPlaceholder placeholder="Email Address"/>
                    <v-text-field v-model="defaultItem.password" prependInnerIcon="mdi-lock" label="Password" variant="outlined" density="compact"
                                  type="password" persistentPlaceholder appendInnerIcon="mdi-eye"/>
                    <div class="d-flex ga-2 justify-center">
                        <v-btn @click="addNewUser" color="primary" variant="elevated" density="comfortable">Submit</v-btn>
                        <v-btn @click="addUserDialog = false" color="primary" variant="outlined" density="comfortable">Cancel</v-btn>
                    </div>
                </v-card-text>

            </v-card>
        </v-dialog>
        <v-dialog v-model="editUserDialog" maxWidth="400">
            <v-card>
                <v-card-title>Update User</v-card-title>
                <v-card-text>
                    <v-text-field v-model="editedItem.name" prependInnerIcon="mdi-account" label="Name" variant="outlined" density="compact"
                                  type="text" persistent-placeholder placeholder="Full Name"/>
                    <v-text-field v-model="editedItem.email" prependInnerIcon="mdi-email" label="Email" variant="outlined" density="compact"
                                  type="email" persistentPlaceholder placeholder="Email Address"/>
                    <v-text-field v-model="editedItem.password" prependInnerIcon="mdi-lock" label="Password" variant="outlined" density="compact"
                                  type="password" persistentPlaceholder appendInnerIcon="mdi-eye"/>
                    <div class="d-flex ga-2 justify-center">
                        <v-btn @click="editUser" color="primary" variant="elevated" density="comfortable">Submit</v-btn>
                        <v-btn @click="editUserDialog = false" color="primary" variant="outlined" density="comfortable">Cancel</v-btn>
                    </div>
                </v-card-text>

            </v-card>
        </v-dialog>
    </v-container>
</template>
<script>
import axios from "axios";
import dayjs from "dayjs";

export default {
    name: "UsersList",
    computed: {
        dayjs() {
            return dayjs
        }
    },
    data(){
        return{
            users:[],
            userHeaders:[
                {title:'ID',key:'id',width:25},
                {title:'Name',key:'name',width:150},
                {title:'Email',key:'email',width:150},
                {title:'Verified',key:'email_verified_at',width:150},
                {title:'Role',key:'role',width:150},
                {title:'Status',key:'status',width:150},
                {title:'Created',key:'created_at',width:150},
                {title:'Updated',key:'updated_at',width:150},
                {title:'Actions',key:'actions',width:150},
            ],
            editedIndex:-1,
            defaultItem:{
                name:"",
                email:"",
                password:"",
            },
            editedItem:{
                name:"",
                email:"",
                password:"",
            },
            addUserDialog:false,
            editUserDialog:false,
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
        },
        editItem(item){
            this.editedIndex = this.users.indexOf({item});
            this.editedItem =Object.assign({},item);
            this.editUserDialog = true;
        },
        addNewUser(){
            const nuser = {
                name:this.defaultItem.name,
                email:this.defaultItem.email,
                password:this.defaultItem.password,
            }
            this.addUserDialog = false;
            console.log('nuser',nuser)
        },
        editUser(){
            const euser = {
                name:this.editedItem.name,
                email:this.editedItem.email,
                password:this.editedItem.password,
            }
            this.editUserDialog = false;
            console.log('euser',euser)
        }
    }
}
</script>

<style scoped>

</style>
