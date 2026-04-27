<template>
    <v-container class="pa-2">
        <v-row>
            <v-col cols="8" md="8" class="d-flex ga-1">
                <v-btn icon variant="text" density="comfortable" :to="{name:'CompanyList'}">
                    <v-icon link  size="small">mdi-arrow-left</v-icon>
                </v-btn>
                <h2>Add Company</h2>
            </v-col>
            <v-col cols="4" md="4">
                <v-btn link :to="{name:'CompanyList'}" color="success" size="small" prependIcon="mdi-plus">Reset</v-btn>
            </v-col>
        </v-row>
        <v-form ref="companyRefForm" v-model="companyAddForm" @submit.prevent="addCompany">
            <v-row dense>
                <v-col cols="12" md="8">
                    <v-card>
                        <v-card-item title="Company Details" appendIcon="mdi-arrow-left"></v-card-item>
                        <v-card-text>
                            <v-row dense>
                                <v-col cols="12" md="12">
                                    <v-text-field v-model="defaultItem.name" variant="outlined" density="compact"
                                                  label="Company Name" :rules="nameRule"
                                                  persistentPlaceholder placeholder="Insert company name" aria-required="true"/>
                                </v-col>
                                <v-col cols="12" md="12">
                                    <v-text-field v-model="defaultItem.email" variant="outlined" density="compact"
                                                  label="Company Email" :rules="emailRule"
                                                  persistentPlaceholder placeholder="Email Address"/>
                                </v-col>
                                <v-col cols="12" md="12">
                                    <v-text-field v-model="defaultItem.phone" variant="outlined" density="compact"
                                                  label="Company Phone" :rules="phoneRule"
                                                  persistentPlaceholder placeholder="Phone No"/>
                                </v-col>
                                <v-col cols="12" md="12">
                                    <v-text-field v-model="defaultItem.website" variant="outlined" density="compact" label="website"
                                                  persistentPlaceholder placeholder="https://example.com"/>
                                </v-col>
                                <v-col cols="12" md="12">
                                    <v-switch v-model="defaultItem.is_active" color="success" label="Active"/>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card>
                </v-col>
                <v-col cols="12" md="4">
                    <v-card>
                        <v-card-item title="Company Logo (optional)" appendIcon="mdi-arrow-left"></v-card-item>
                        <v-card-text>
                            <v-row dense>
                                <v-col cols="12" md="12">
                                    <v-file-upload v-model="defaultItem.logo" title="Upload Logo" density="comfortable" clearable/>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card>
                </v-col>
                <v-col cols="12" md="12">
                    <v-btn :disabled="!companyAddForm" type="submit" color="success" variant="elevated" density="comfortable">Save</v-btn>
                </v-col>
            </v-row>
        </v-form>

    </v-container>
</template>
<script>
import {VFileUpload} from "vuetify/labs/components";
import axios from "axios";

export default {
    name: "CompanyAdd",
    components:{
        VFileUpload
    },
    data(){
        return{
            companyRefForm:false,
            companyAddForm:false,
            defaultItem:{
                name:"",
                email:"",
                phone:"",
                website:"",
                is_active:true,
                logo:null,
            },
            defaultLogo:"",
            nameRule:[
                (v) => !!v || "Company Name is required",
            ],
            emailRule:[
                (v) => !!v || "Email is required",
            ],
            phoneRule:[
                (v) => !!v || "Phone Number is required",
            ],
        }
    },
    methods:{
        addCompany(){
            const uheaders = {headers: {'Content-Type': 'multipart/form-data'}}
            const adata  = {
                'name':this.defaultItem.name,
                'email':this.defaultItem.email,
                'phone':this.defaultItem.phone,
                'website':this.defaultItem.website,
                'is_active':this.defaultItem.is_active,
                'logo':this.defaultItem.logo,
            }
            axios.post('/admin/company/add',adata,uheaders)
                .then((resp)=>{
                    if(resp.data.success){
                        const companyId = resp.data.company.id
                        this.$router.push({name:'CompanyEdit',params:{id:companyId}});
                        window.Toast.success('Company Added Successfully')
                    }
                })
                .catch((err)=>{
                    window.Toast.error(err.message);
                })
        }
    }

}
</script>
<style scoped>

</style>
