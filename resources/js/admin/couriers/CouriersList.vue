<template>
    <v-container class="pa-2">
        <v-row dense>
            <v-col cols="6" md="6">
                <h2>Couriers List</h2></v-col>
            <v-col cols="6" md="6">
                <v-btn @click="addCourierDialog = true" color="success" size="small" prependIcon="mdi-plus">Add Courier</v-btn>
            </v-col>
            <v-col cols="12" md="12">
                <v-card>
                    <v-text-field v-model="csearch" variant="outlined" density="compact" class="pa-2" prependInnerIcon="mdi-magnify"
                                  label="Search Companies" hide-details></v-text-field>
                    <v-data-table :items="couriers" density="compact" :search="csearch" :headers="courierHeaders">
                        <template v-slot:item.logo_url="{item}">
                            <v-img v-if="item.logo_url" :src="item.logo_url" maxWidth="100"></v-img>
                            <v-img v-else :src="'/images/'+item.code+'.png'" maxWidth="100"></v-img>
                        </template>
                        <template v-slot:item.is_active="{item}">
                            <v-chip v-if="item.is_active" color="success" density="compact" variant="outlined" class="font-weight-medium">Active</v-chip>
                            <v-chip v-else color="red" density="compact" variant="outlined" class="font-weight-medium">Inactive</v-chip>
                        </template>
                        <template v-slot:item.actions="{item}">
                            <v-btn @click="editItem(item)" color="info" size="small">Edit</v-btn>
                        </template>
                    </v-data-table>
                </v-card>
            </v-col>
        </v-row>
        <v-dialog v-model="editCourierDialog" maxWidth="700">
            <v-card>
                <v-card-title>Edit Courier</v-card-title>
                <v-card-text>
                    <v-row dense>
                        <v-col cols="12" md="6">
                            <v-text-field v-model="editedItem.name" prependInnerIcon="mdi-domain"
                                          label="Courier Name" variant="outlined" density="compact"
                                          persistent-placeholder placeholder="DHL, FEDEX etc"/>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field v-model="editedItem.code" prependInnerIcon="mdi-code-tags"
                                          label="Code" variant="outlined" density="compact"
                                          persistentPlaceholder placeholder="fedex"/>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-number-input v-model="editedItem.sort_order" prependInnerIcon="mdi-sort"
                                            label="Sort Order" variant="outlined" density="compact"
                                            persistentPlaceholder placeholder="0" :min="0"></v-number-input>
                            <v-switch v-model="editedItem.is_active" color="success" label="Status"></v-switch>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-file-upload density="compact" title="Courier Logo"></v-file-upload>
                        </v-col>
                        <v-col cols="12" md="12">
                            <div class="d-flex ga-2 justify-center">
                                <v-btn @click="editCourier" color="success" variant="elevated" density="comfortable">Update</v-btn>
                                <v-btn @click="editCourierDialog = false" color="primary" variant="outlined" density="comfortable">Cancel</v-btn>
                            </div>
                        </v-col>
                    </v-row>
                </v-card-text>

            </v-card>
        </v-dialog>
        <v-dialog v-model="addCourierDialog" maxWidth="700">
            <v-card>
                <v-card-title>Add New Courier</v-card-title>
                <v-card-text>
                    <v-row dense>
                        <v-col cols="12" md="6">
                            <v-text-field v-model="defaultItem.name" prependInnerIcon="mdi-domain"
                                          label="Courier Name" variant="outlined" density="compact"
                                          persistent-placeholder placeholder="DHL, FEDEX etc"/>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-text-field v-model="defaultItem.code" prependInnerIcon="mdi-code-tags"
                                          label="Code" variant="outlined" density="compact"
                                          persistentPlaceholder placeholder="fedex"/>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-number-input v-model="defaultItem.sort_order" prependInnerIcon="mdi-sort"
                                            label="Sort Order" variant="outlined" density="compact"
                                            persistentPlaceholder placeholder="0" :min="0"></v-number-input>
                            <v-switch v-model="defaultItem.is_active" color="success" label="Status"></v-switch>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-file-upload density="compact" title="Courier Logo"></v-file-upload>
                        </v-col>
                        <v-col cols="12" md="12">
                            <div class="d-flex ga-2 justify-center">
                                <v-btn @click="addCourier" color="success" variant="elevated" density="comfortable">Save</v-btn>
                                <v-btn @click="addCourierDialog = false" color="primary" variant="outlined" density="comfortable">Cancel</v-btn>
                            </div>
                        </v-col>
                    </v-row>
                </v-card-text>

            </v-card>
        </v-dialog>
    </v-container>
</template>
<script>
import {VFileUpload} from "vuetify/labs/components";

export default {
    name: "CouriersList",
    components:{
        VFileUpload
    },
    computed:{
        couriers(){
            return this.$store.state.couriers;
        }
    },
    mounted() {
        this.$store.dispatch('fetchCouriers');
    },
    data(){
        return{
            csearch:'',
            courierHeaders:[
                {title:'Logo',value:'logo_url',width:150},
                {title:'Name',key:'name',width:150},
                {title:'Code',key:'code',width:150},
                {title:'Status',key:'is_active',width:150},
                {title:'Actions',value:'actions',width:150},
            ],
            editedIndex:-1,
            defaultItem:{
                name:"",
                code:"",
                logo_url:"",
                sort_order:0,
                is_active:true,
            },
            editedItem:{
                id:null,
                name:"",
                code:"",
                logo_url:null,
                sort_order:0,
                is_active:true,
            },
            addCourierDialog:false,
            editCourierDialog:false,
        }
    },
    methods:{
        editItem(item){
            this.editedIndex = this.couriers.indexOf(item);
            this.editedItem =Object.assign({},item);
            this.editCourierDialog = true;
        },
        addCourier(){
            const payload = {...this.defaultItem};
            this.$store.dispatch('createCourier',payload)
                .then(()=>{
                    this.addCourierDialog = false;
                    this.defaultItem = {
                        name:"",
                        code:"",
                        logo_url:"",
                        sort_order:0,
                        is_active:true,
                    };
                });
            console.log('apaylaod',payload);
        },
        editCourier(){
            const payload = {...this.editedItem};
            this.$store.dispatch('updateCourier',payload)
                .then(()=>{
                    this.editCourierDialog = false;
                });

            console.log('epayload',payload);
        }
    }
}
</script>

<style scoped>

</style>
