<template>
    <v-container class="pa-2">
        <v-row>
            <v-col cols="8" md="8" class="d-flex ga-1">
                <v-btn icon variant="text" density="comfortable" :to="{name:'CompanyList'}">
                    <v-icon link  size="small">mdi-arrow-left</v-icon>
                </v-btn>
                <h2>Edit {{editedItem.name}} </h2>
            </v-col>
            <v-col cols="4" md="4">
                <v-btn link :to="{name:'CompanyList'}" color="success" size="small" prependIcon="mdi-chevron-left">Back</v-btn>
            </v-col>
        </v-row>
        <v-row dense>
                <v-col cols="12" md="8">
                    <v-card>
                        <v-card-title>Company Couriers List</v-card-title>
                        <v-list density="compact" nav>
                            <v-list-item v-for="c in companyCouriers" :key="c.company_courier_id || c.id" class="border-b">
                                <template #prepend>
                                    <v-img :src="'/images/'+c.code+'.png'" width="48" contain class="mr-1"></v-img>
                                </template>
                                <template #title>
                                    <div class="d-flex ga-3 align-center">
                                        <div>{{ c.name }}</div>
                                        <div class="d-flex ga-2 flex-wrap">
                                            <div v-if="c.is_active">
                                                <v-chip density="compact"
                                                        v-for="s in c.services"
                                                        :key="s.id"
                                                        @click="selectService(s,c)"
                                                        :color="selectedServiceId === s.id ? 'success' : 'primary'"
                                                        class="ma-1 font-weight-medium"
                                                        size="small"
                                                >
                                                    {{ s.service_name }}
                                                </v-chip>
                                            </div>
                                        </div>
                                        <div>
                                            <v-btn v-if="c.is_active" size="x-small" color="info" @click="openServiceDialog(c)">
                                                + Add Service
                                            </v-btn>

                                        </div>
                                    </div>
                                </template>
                                <template #append>
                                    <div>
                                        <v-switch density="compact" base-color="red" hide-details
                                                  :model-value="c.is_active"
                                                  :disabled="c.global_active === false"
                                                  @update:modelValue="val => toggle(c, val)"
                                                  color="success"
                                        />

                                    </div>
                                </template>
                            </v-list-item>
                        </v-list>
                    </v-card>
                    <v-card class="mt-3">
                        <v-card-title class="d-flex justify-space-between">
                            Courier Rates
                            <v-btn size="small" color="success" :disabled="!selectedServiceId" @click="openRateDialog(selectedServiceId)">
                                Add Rate
                            </v-btn>
                        </v-card-title>
                        <v-card-text v-if="selectedServiceId" class="text-caption">
                            {{ selectedCourier?.name }} →
                            {{ getServiceName(selectedServiceId) }}
                        </v-card-text>
                        <v-data-table :items="rates" :headers="rateHeaders" density="compact"
                                      noDataText="No rates added yet" hideDefaultFooter>
                            <template #item.country_name="{ item }">
                                {{ item.country?.name }}
                            </template>
                            <template #item.rate="{item}">
                                £{{item.rate}}
                            </template>
                            <template #item.actions="{ item }">
                                <div class="d-flex ga-1">
                                    <v-btn size="x-small" color="info" @click="editRate(item)">Edit</v-btn>
                                    <v-btn size="x-small" color="red" @click="deleteRate(item)">Delete</v-btn>
                                </div>
                            </template>
                        </v-data-table>
                    </v-card>
                </v-col>
                <v-col cols="12" md="4">
                    <v-card>
                        <v-card-item title="Company Details" appendIcon="mdi-arrow-left"></v-card-item>
                        <v-card-text>
                            <v-form ref="companyRefForm" v-model="companyEditForm" @submit.prevent="editCompany">
                                <v-row dense>
                                    <v-col cols="12" md="12">
                                        <v-text-field v-model="editedItem.name" variant="outlined" density="compact"
                                                      label="Company Name" :rules="nameRule"
                                                      persistentPlaceholder placeholder="Insert company name" aria-required="true"/>
                                    </v-col>
                                    <v-col cols="12" md="12">
                                        <v-text-field v-model="editedItem.email" variant="outlined" density="compact"
                                                      label="Company Email" :rules="emailRule"
                                                      persistentPlaceholder placeholder="Email Address"/>
                                    </v-col>
                                    <v-col cols="12" md="12">
                                        <v-text-field v-model="editedItem.phone" variant="outlined" density="compact"
                                                      label="Company Phone" :rules="phoneRule"
                                                      persistentPlaceholder placeholder="Phone No"/>
                                    </v-col>
                                    <v-col cols="12" md="12">
                                        <v-switch v-model="editedItem.is_active" color="success" label="Active"/>
                                    </v-col>
                                    <v-col cols="12" md="12">
                                        <v-btn :disabled="!companyEditForm" type="submit" color="success" variant="elevated" density="comfortable">Update</v-btn>
                                    </v-col>
                                </v-row>
                            </v-form>
                        </v-card-text>
                    </v-card>
                </v-col>
            </v-row>
        <v-dialog v-model="serviceDialog" max-width="400">
            <v-card>
                <v-card-title>Add Service</v-card-title>
                <v-card-text>
                    <v-text-field variant="outlined" density="compact" v-model="serviceForm.service_name"
                                  label="Service Name"/>
                    <v-text-field variant="outlined" density="compact" v-model="serviceForm.service_code"
                                  label="Service Code (optional)"/>

                    <v-switch v-model="serviceForm.is_active" label="Active" color="success"/>
                </v-card-text>
                <v-card-actions>
                    <v-btn color="success" @click="saveService">Save</v-btn>
                    <v-btn @click="serviceDialog = false">Cancel</v-btn>
                </v-card-actions>
            </v-card>
        </v-dialog>
        <v-dialog v-model="rateDialog" max-width="600">
            <v-card>
                <v-card-title>
                    {{ editingRateId ? 'Edit Rate' : 'Add Rate' }}
                    {{ selectedCourier?.name }} → {{ getServiceName(selectedServiceId) }}
                </v-card-title>
                <v-card-text>
                    <v-row dense>
                        <v-col cols="12" md="6">
                            <v-number-input v-model="rateform.weight_from" label="Weight From" density="compact"
                                            variant="outlined" persistentPlaceholder :min="0"
                                            :precision="3" :step="0.001" />
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-number-input v-model="rateform.weight_to" label="Weight To" density="compact"
                                            variant="outlined" persistentPlaceholder :min="0"
                                            :precision="3" :step="0.001"/>
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-number-input v-model="rateform.rate" label="Rate" density="compact" prefix="£"
                                            variant="outlined" :precision="2" persistentPlaceholder :min="0" />
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-select density="compact" variant="outlined" v-model="rateform.country_id"
                                      :items="countries"
                                      item-title="name"
                                      item-value="id"
                                      label="Country"
                            />
                        </v-col>
                        <v-col cols="12" md="6">
                            <v-select density="compact" variant="outlined"
                                      v-model="rateform.parcel_type"
                                      :items="['envelope','parcel','pallet','document']"
                                      label="Parcel Type"
                            />
                        </v-col>
                        <v-col cols="12" md="12">
                            <div class="d-flex ga-3 justify-center">
                                <v-btn color="success" @click="saveRate" variant="elevated" density="comfortable">Save</v-btn>
                                <v-btn @click="rateDialog = false" variant="outlined" color="error" density="comfortable">Cancel</v-btn>
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
import axios from "axios";
export default {
    name: "CompanyEdit",
    components:{
        VFileUpload
    },
    props:{
        id:[Number,String]
    },
    computed:{
        companyCouriers(){
            return this.$store.state.companyCouriers;
        },
        countries(){
            return this.$store.state.activeCountries;
        }
    },
    async mounted(){
        if(!this.$store.state.companies.length){
            await this.$store.dispatch('fetchCompanies');
        }
        this.editedItem = {...this.companyFromStore};
        await this.$store.dispatch('fetchCompanyCouriers',Number(this.id));
        await this.$store.dispatch('fetchActiveCountries');
        await this.getCompanies();
    },
    watch:{
        companyFromStore:{
            immediate:true,
            handler(val){
                if(val){
                    this.editedItem = {...val};
                }
            }
        }
    },
    data(){
        return{
            companies:[],
            companyFromStore:{},
            companyRefForm:false,
            companyEditForm:false,
            editedItem:{
                name:"",
                email:"",
                phone:"",
                website:"",
                is_active:true,
                logo:null,
            },
            editedLogo:"",
            nameRule:[
                (v) => !!v || "Company Name is required",
            ],
            emailRule:[
                (v) => !!v || "Email is required",
            ],
            phoneRule:[
                (v) => !!v || "Phone Number is required",
            ],
            serviceDialog:false,
            selectedCourierId:null,
            serviceForm:{
                service_name:'',
                service_code:'',
                is_active:true
            },
            selectedServiceId:null,
            selectedCourier:null,
            rates:[],
            rateHeaders:[
                { title:'From (kg)', key:'weight_from' },
                { title:'To (kg)', key:'weight_to' },
                { title:'Rate per (kg)', key:'rate' },
                { title:'Country', key:'country_name' },
                { title:'Parcel', key:'parcel_type' },
                { title:'Actions', key:'actions', sortable:false },
            ],
            rateform:{
                weight_from:null,
                weight_to:null,
                rate:null,
                country_id:null,
                parcel_type:'parcel'
            },
            rateDialog:false,
            editingRateId:null,
        }
    },
    methods:{
        async getCompanies(){
            await this.$store.dispatch('fetchCompanies');
            this.companies = this.$store.state.companies;
            this.companyFromStore = this.companies.find(c => c.id === Number(this.id));
            this.editCompany = {...this.companyFromStore};
        },
        editCompany(){
            const uheaders = {headers: {'Content-Type': 'multipart/form-data'}}
            const adata  = {
                'id':this.id,
                'name':this.editedItem.name,
                'email':this.editedItem.email,
                'phone':this.editedItem.phone,
                'website':this.editedItem.website,
                'is_active':this.editedItem.is_active,
                'logo':this.editedItem.logo,
            }
            axios.post(`/admin/company/update`,adata,uheaders)
                .then((resp)=>{
                    window.Toast.success('Company Updated Successfully')
                    this.$store.dispatch('fetchCompanies')
                })
                .catch((err)=>{
                    window.Toast.error(err.message);
                })
        },
        toggle(c, val){
            this.$store.dispatch('toggleCompanyCourier', {
                companyId: this.id,
                courier_id: c.courier_id,
                is_active: val
            });
        },
        openServiceDialog(c){
            this.selectedCourierId = c.company_courier_id; // company courier id (IMPORTANT)
            this.serviceDialog = true;
            this.serviceForm = {
                service_name:'',
                service_code:'',
                is_active:true
            };
        },
        async saveService(){
            const payload = {
                company_courier_id: this.selectedCourierId,
                service_name: this.serviceForm.service_name,
                service_code: this.serviceForm.service_code,
                is_active: this.serviceForm.is_active
            };
            await axios.post('/admin/service', payload);

            this.serviceDialog = false;

            await this.$store.dispatch('fetchCompanyCouriers', Number(this.id));
        },
        selectService(service,courier){
            this.selectedServiceId = service.id;
            this.selectedCourier = courier;
            this.getRates();
        },
        getServiceName(id){
            for(const c of this.companyCouriers){
                const s = c.services.find(x => x.id === id);
                if(s) return s.service_name;
            }
            return '';
        },
        async getRates(){
            if(!this.selectedServiceId) return;
            const res = await axios.get(`/admin/rates/${this.selectedServiceId}`);
            this.rates = res.data.rates.sort((a,b) => a.weight_from - b.weight_from);
        },
        openRateDialog(serviceId){
            this.rateDialog = true;
            this.rateform.company_courier_service_id = serviceId;
            if(this.rates.length){
                const last = this.rates[this.rates.length - 1];
                this.rateform.weight_from = last.weight_to;
            }
            this.rateform.weight_to = null;
            this.rateform.rate = null;
        },
        async saveRate(){
            if(this.rateform.weight_to <= this.rateform.weight_from){
                alert("Weight To must be greater than Weight From");
                return;
            }
            const payload = {
                ...this.rateform,
                company_courier_service_id: this.selectedServiceId,
                weight_from: Number(this.rateform.weight_from).toFixed(3),
                weight_to: Number(this.rateform.weight_to).toFixed(3),
            };

            if(this.editingRateId){
                // UPDATE
                await axios.put(`/admin/rate/${this.editingRateId}`, payload);
            } else {
                // CREATE
                await axios.post('/admin/rate', payload);
            }
            this.editingRateId = null;
            this.rateDialog = false;
            await this.getRates();
            this.rateform = {
                weight_from:null,
                weight_to:null,
                rate:null,
                country_id:null,
                parcel_type:'parcel'
            };
        },
        editRate(item){
            this.editingRateId = item.id;
            this.rateform = {
                weight_from: item.weight_from,
                weight_to: item.weight_to,
                rate: item.rate,
                country_id: item.country_id,
                parcel_type: item.parcel_type
            };
            this.rateDialog = true;
        },
        async deleteRate(item){
            if(!confirm('Delete this rate?')) return;

            await axios.delete(`/admin/rate/${item.id}`);

            await this.getRates();
        }
    }
}
</script>

<style scoped>

</style>
