<template>
    <v-container>
        <v-row>
            <h2>Countries List</h2>

            <v-col cols="12" md="12">
                <v-card>
                    <v-text-field class="px-1 pt-3 pb-1" v-model="csearch" variant="outlined" density="compact" hide-details
                                  prependInnerIcon="mdi-magnify" label="Search Country"  clearable
                                  placeholder="Search Country ... "  persistentPlaceholder></v-text-field>
                    <v-data-table :items="countries" density="compact" :search="csearch" mobileBreakpoint="sm" hover>
                        <template v-slot:item.sort_order="{item}">
                            <v-btn @click="editItem(item)" color="success" density="comfortable" variant="text">{{item.sort_order}}</v-btn>
                        </template>
                        <template v-slot:item.is_active="{item}">
                            <v-btn v-if="item.is_active" @click="activeItem(item)" color="success" size="small" density="comfortable">{{item.is_active}}</v-btn>
                            <v-btn v-else @click="activeItem(item)" color="red" size="small" density="comfortable">{{item.is_active}}</v-btn>
                        </template>
                    </v-data-table>
                </v-card>
            </v-col>

        </v-row>
        <v-dialog v-model="sortDialog" maxWidth="400">
            <v-card>
                <v-card-title class="text-center">Country Sort Order</v-card-title>
                <v-card-text>
                    <v-number-input v-model="editedItem.sort_order" controlVariant="split" :min="0" density="compact" variant="outlined"></v-number-input>
                    <div class="d-flex ga-2 justify-center">
                        <v-btn @click="updateCountry" variant="elevated" color="success" size="small">Update</v-btn>
                        <v-btn @click="sortDialog = false" variant="outlined" color="red" size="small">Cancel</v-btn>
                    </div>
                </v-card-text>
            </v-card>
        </v-dialog>
        <v-dialog v-model="activeDialog" maxWidth="400">
            <v-card>
                <v-card-title class="text-center">Country Activate/Deactivate</v-card-title>
                <v-card-text>
                    <v-switch v-model="editedItem.is_active" :label="editedItem.is_active.toString()" color="success" inset></v-switch>
                    <div class="d-flex ga-2 justify-center">
                        <v-btn @click="updateCountryStatus" variant="elevated" color="success" size="small">Update</v-btn>
                        <v-btn @click="activeDialog = false" variant="outlined" color="red" size="small">Cancel</v-btn>
                    </div>
                </v-card-text>
            </v-card>
        </v-dialog>
    </v-container>
</template>
<script>
import axios from "axios";

export default {
    name: "CountryList",
    data(){
        return{
            csearch:"",
            sortDialog:false,
            activeDialog:false,
            countries:[],
            editedIndex:-1,
            editedItem:{
                iso_code:"",
                sort_order:0,
                is_active:false,
            }
        }
    },
    async mounted() {
        await this.getCountries();
    },
    methods:{
        async getCountries(){
            await axios.get('/admin/all/countries')
                .then((resp)=>{
                    this.countries = resp.data.countries;
                })
        },
        editItem(item){
            this.editedIndex = this.countries.indexOf(item);
            this.editedItem = Object.assign({},item);
            this.sortDialog = true;
        },
        activeItem(item){
            this.editedIndex = this.countries.indexOf(item);
            this.editedItem = Object.assign({},item);
            this.activeDialog = true;
        },
        updateCountry(){
            const udata = {
                iso_code:this.editedItem.iso_code,
                sort_order:this.editedItem.sort_order,
                is_active:this.editedItem.is_active,
            }
            axios.post('/admin/update/country',udata)
                .then((resp)=>{
                    window.Toast.success('Country Updated Successfully');
                    this.sortDialog = false;
                    this.countries[this.editedIndex] = {...this.editedItem};
                    this.sortCountries();
                    this.csearch = "";
                })
                .catch((err)=>{
                    window.Toast.error(err.message)
                })
        },
        updateCountryStatus(){
            const udata = {
                iso_code:this.editedItem.iso_code,
                sort_order:this.editedItem.sort_order,
                is_active:this.editedItem.is_active,
            }
            axios.post('/admin/update/country',udata)
                .then((resp)=>{
                    window.Toast.success('Country Updated Successfully');
                    this.activeDialog = false;
                    this.countries[this.editedIndex] = {...this.editedItem};
                    this.sortCountries();
                    this.csearch = "";
                })
                .catch((err)=>{
                    window.Toast.error(err.message)
                })
        },
        sortCountries() {
            this.countries.sort((a, b) => {
                if (a.is_active !== b.is_active) {
                    return b.is_active - a.is_active;
                }
                return b.sort_order - a.sort_order;
            });
        }
    }
}
</script>

<style scoped>

</style>
