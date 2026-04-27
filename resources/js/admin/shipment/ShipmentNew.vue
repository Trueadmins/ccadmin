<template>
    <v-container fluid class="pa-2">
        <div class="mb-3">
            <h2 class="font-bold">Create New Shipment</h2>
        </div>
        <v-row dense>
            <v-col cols="12" md="12">
                <v-card>
                    <v-card-text>
                        <v-select variant="outlined" density="compact"
                                  v-model="form.country_id"
                                  :items="countries"
                                  item-title="name"
                                  item-value="id"
                                  label="Country"
                        />

                        <v-number-input v-model="form.weight" label="Weight" variant="outlined" density="compact" />
                        <v-btn @click="calculateRates">Check Rates</v-btn>
                    </v-card-text>
                </v-card>
                <div class="mt-4">
                    <v-row>
                        <v-col cols="12" md="4" v-for="s in services" :key="s.service_id">
                            <v-card>
                                <v-card-text>
                                    <div>{{ s.courier_name }}</div>
                                    <div>{{ s.service_name }}</div>
                                    <div>£ {{ s.price }}</div>
                                </v-card-text>
                                <v-card-actions>
                                    <v-btn variant="elevated" color="info" density="comfortable"
                                           @click="selectedService = s">Select</v-btn>
                                </v-card-actions>
                            </v-card>
                        </v-col>
                    </v-row>
                </div>
            </v-col>
<!--            <v-col cols="12" md="12" class="py-0">-->
<!--                <v-autocomplete v-model="selectedCountry" :items="countries" item-title="name"-->
<!--                                item-value="iso_code"-->
<!--                                prependInnerIcon="mdi-map-marker" variant="outlined" hide-details-->
<!--                                density="compact" label="Destination Country" clearable>-->
<!--                    <template v-slot:item="{ props, item }">-->
<!--                        <v-list-item v-bind="props" :title="item.raw.name">-->
<!--                            <template #prepend>-->
<!--                                <span class="mr-2">{{ item.raw.flag }}</span>-->
<!--                            </template>-->
<!--                        </v-list-item>-->
<!--                    </template>-->
<!--                </v-autocomplete>-->
<!--            </v-col>-->
<!--            <v-col cols="12" md="6">-->
<!--                <v-card class="rounded-md shadow-sm">-->
<!--                    <v-card-title>-->
<!--                       Pick up Address-->
<!--                    </v-card-title>-->
<!--                    <v-card-text>-->
<!--                        <v-text-field v-model="company.name" prependInnerIcon="mdi-briefcase-account-outline" variant="outlined"-->
<!--                                      density="compact" label="Consignor" persistentPlaceholder readonly/>-->
<!--                        <v-text-field v-model="company.address_line1" variant="outlined" density="compact"-->
<!--                                      label="Address line 1" persistentPlaceholder readonly/>-->
<!--                        <v-text-field v-model="company.address_line2" variant="outlined" density="compact"-->
<!--                                      label="Address line 2" persistentPlaceholder readonly/>-->
<!--                        <div class="d-flex ga-1">-->
<!--                            <v-text-field v-model="company.address_line3" variant="outlined"-->
<!--                                          density="compact" label="Address line 3" persistentPlaceholder readonly/>-->
<!--                            <v-text-field v-model="company.town" variant="outlined" density="compact"-->
<!--                                          label="Town" persistentPlaceholder readonly/>-->
<!--                        </div>-->
<!--                        <div class="d-flex ga-1">-->
<!--                            <v-text-field v-model="company.country" class="w-50" variant="outlined"-->
<!--                                          density="compact" label="Country" value="United Kingdom"-->
<!--                                          persistentPlaceholder readonly/>-->
<!--                            <v-text-field v-model="company.postcode" class="w-50"-->
<!--                                          prependInnerIcon="mdi-map-marker-outline" variant="outlined"-->
<!--                                          density="compact" label="Post Code" persistentPlaceholder readonly/>-->
<!--                        </div>-->
<!--                    </v-card-text>-->
<!--                </v-card>-->
<!--                <v-card class="mt-3">-->
<!--                    <v-card-title>Sender Detail</v-card-title>-->
<!--                    <v-card-text class="pt-2">-->
<!--                        <v-row>-->
<!--                            <v-col cols="12" md="12" class="py-0">-->
<!--                                <v-text-field prependInnerIcon="mdi-account" variant="outlined" density="compact" label="Name" persistentPlaceholder/>-->
<!--                            </v-col>-->
<!--                            <v-col cols="12" md="6" class="py-0">-->
<!--                                <v-text-field prependInnerIcon="mdi-email" variant="outlined" density="compact" label="Email" persistentPlaceholder/>-->
<!--                            </v-col>-->
<!--                            <v-col cols="12" md="6" class="py-0">-->
<!--                                <v-text-field prependInnerIcon="mdi-domain" variant="outlined" density="compact" label="Postcode" persistentPlaceholder/>-->
<!--                            </v-col>-->
<!--                            <v-col cols="12" md="12" class="py-0">-->
<!--                                <v-text-field prependInnerIcon="mdi-map-marker" variant="outlined" density="compact" label="Address" persistentPlaceholder/>-->
<!--                            </v-col>-->

<!--                        </v-row>-->
<!--                    </v-card-text>-->
<!--                </v-card>-->
<!--            </v-col>-->
<!--            <v-col cols="12" md="6">-->
<!--                <v-card class="rounded-md shadow-sm">-->
<!--                    <v-card-title>-->
<!--                       Delivery Address-->
<!--                    </v-card-title>-->
<!--                    <v-card-text class="pt-2">-->
<!--                        <v-row dense>-->
<!--                                <v-col cols="12" md="12" class="py-0">-->
<!--                                    <v-text-field prependInnerIcon="mdi-briefcase-account-outline" variant="outlined" density="compact" label="Consignee" persistentPlaceholder/>-->
<!--                                </v-col>-->
<!--                                <v-col cols="12" md="12" class="py-0">-->
<!--                                    <v-text-field variant="outlined" density="compact" label="Address line 1" persistentPlaceholder/>-->
<!--                                </v-col>-->
<!--                                <v-col cols="12" md="12" class="py-0">-->
<!--                                    <v-text-field variant="outlined" density="compact" label="Address line 2" persistentPlaceholder/>-->
<!--                                </v-col>-->
<!--                                <v-col cols="12" md="12" class="py-0">-->
<!--                                    <v-text-field variant="outlined" density="compact" label="Address line 3" persistentPlaceholder/>-->
<!--                                </v-col>-->
<!--                                <v-col cols="12" md="12" class="py-0">-->
<!--                                    <v-text-field variant="outlined" density="compact" label="Town" persistentPlaceholder/>-->
<!--                                </v-col>-->
<!--                                <v-col cols="12" md="12" class="py-0">-->
<!--                                    <v-text-field prependInnerIcon="mdi-map-marker-outline" variant="outlined" density="compact" label="Post Code" persistentPlaceholder/>-->
<!--                                </v-col>-->
<!--                                <v-col cols="12" md="12" class="py-0">-->
<!--                                    <v-text-field prependInnerIcon="mdi-account" variant="outlined" density="compact" label="Contact Name" persistentPlaceholder/>-->
<!--                                </v-col>-->
<!--                                <v-col cols="12" md="6" class="py-0">-->
<!--                                    <v-text-field prependInnerIcon="mdi-phone" variant="outlined" density="compact" label="Telephone" persistentPlaceholder/>-->
<!--                                </v-col>-->
<!--                                <v-col cols="12" md="6" class="py-0">-->
<!--                                    <v-text-field prependInnerIcon="mdi-email" variant="outlined" density="compact" label="Consignee Email" persistentPlaceholder/>-->
<!--                                </v-col>-->
<!--                            </v-row>-->
<!--                    </v-card-text>-->
<!--                </v-card>-->
<!--            </v-col>-->
<!--            <v-col cols="12" md="12">-->
<!--                <div class="d-flex flex-column ga-3">-->
<!--                    <v-card class="rounded-md shadow-sm">-->
<!--                        <v-card-title>Package Information</v-card-title>-->
<!--                        <v-card-text>-->
<!--                            <v-row dense v-for="(box, index) in boxes" :key="index" >-->
<!--                                <v-col cols="12" sm="6" md="6" lg="2" class="py-0">-->
<!--                                    <v-select v-model="box.ptype" variant="outlined" density="compact"-->
<!--                                              :items="ptypes" label="Package Type" persistentPlaceholder />-->
<!--                                </v-col>-->
<!--                                <v-col cols="12" sm="6" md="6" lg="2" class="py-0">-->
<!--                                    <v-number-input controlVariant="stacked" :precision="3" :min="0.5"-->
<!--                                                    v-model="box.actualWeight" variant="outlined" density="compact"-->
<!--                                                    label="Weight (kg)"-->
<!--                                                    persistentPlaceholder placeholder="0.00" />-->
<!--                                </v-col>-->
<!--                                <v-col cols="12" sm="8" md="8" lg="6" class="py-0">-->
<!--                                    <div class="d-flex ga-2">-->
<!--                                        <v-number-input controlVariant="stacked" :min="10" v-model="box.length" variant="outlined" density="compact" label="L (cm)" persistent-placeholder/>-->
<!--                                        <v-number-input controlVariant="stacked" :min="5" v-model="box.width" variant="outlined" density="compact" label="W (cm)" persistent-placeholder/>-->
<!--                                        <v-number-input controlVariant="stacked" :min="1" v-model="box.height" variant="outlined" density="compact" label="H (cm)" persistent-placeholder/>-->
<!--                                    </div>-->
<!--                                </v-col>-->
<!--                                <v-col cols="12" sm="4" md="4" lg="2" class="py-0 d-flex ga-1">-->
<!--                                    <v-text-field :value="getChargeable(box).toFixed(3) + ' Kg'"-->
<!--                                                  variant="outlined" readonly density="compact" label="Volumetric Weight" persistentPlaceholder/>-->
<!--                                    <v-icon color="red" @click="removeBox(index)" title="Remove">mdi-package-variant-closed-minus</v-icon>-->
<!--                                </v-col>-->
<!--                            </v-row>-->
<!--                            <v-btn color="success" size="small" @click="addBox" appendIcon="mdi-package-variant-closed-plus"-->
<!--                                   class="ms-auto">Add another box</v-btn>-->
<!--                            <div class="mt-3">-->
<!--                                <strong>Total Chargeable Weight for {{boxes?.length}} Box{{boxes?.length > 1 ? 'es' : ''}}:</strong>-->
<!--                                {{ totalWeight.toFixed(3) }} Kg-->
<!--                            </div>-->
<!--                            <div>-->
<!--                                <strong>Total <span class="text-capitalize">{{selectedService}}</span> Price @ £{{ratePerKg}} per Kg:</strong>-->
<!--                                £{{ totalPrice.toFixed(2) }}-->
<!--                            </div>-->
<!--&lt;!&ndash;                            <div>Chargeable Weight = MAX(actual weight, volumetric weight)</div>&ndash;&gt;-->
<!--                        </v-card-text>-->
<!--                    </v-card>-->
<!--                    <v-card class="rounded-md shadow-sm">-->
<!--                        <v-card-title>Shipping Service</v-card-title>-->
<!--                        <v-card-text>-->
<!--                            <v-row dense>-->
<!--                                <v-col cols="12" sm="4" md="4">-->
<!--                                    <v-card class="position-relative  rounded-md" :class="selectedService === 'standard' ? 'border-md border-success' : ''">-->
<!--                                        <v-card-text>-->
<!--                                            <div class="d-flex justify-space-between">-->
<!--                                                <input class="text-primary focus:ring-primary" name="service"-->
<!--                                                       type="radio" value="standard" v-model="selectedService">-->
<!--                                                <v-icon class="material-symbols-outlined text-primary mb-2">mdi-clock-fast</v-icon>-->
<!--                                            </div>-->
<!--                                            <h4 class="font-weight-bold">Standard</h4>-->
<!--                                            <p class="text-body-2">5-7 Business Days</p>-->
<!--                                        </v-card-text>-->
<!--                                    </v-card>-->
<!--                                </v-col>-->
<!--                                <v-col cols="12" sm="4" md="4">-->
<!--                                    <v-card class="position-relative  rounded-md" :class="selectedService === 'express' ? 'border-md border-success' : ''">-->
<!--                                        <v-card-text>-->
<!--                                            <div class="d-flex justify-space-between">-->
<!--                                                <input class="text-primary focus:ring-primary" name="service"-->
<!--                                                       type="radio" value="express" v-model="selectedService">-->
<!--                                                <v-icon class="material-symbols-outlined text-primary mb-2">mdi-lightning-bolt</v-icon>-->
<!--                                            </div>-->
<!--                                            <h4 class="font-weight-bold">Express</h4>-->
<!--                                            <p class="text-body-2">2-3 Business Days</p>-->
<!--                                        </v-card-text>-->
<!--                                    </v-card>-->
<!--                                </v-col>-->
<!--                                <v-col cols="12" sm="4" md="4">-->
<!--                                    <v-card class="position-relative  rounded-md" :class="selectedService === 'overnight' ? 'border-md border-success' : ''">-->
<!--                                        <v-card-text>-->
<!--                                            <div class="d-flex justify-space-between">-->
<!--                                                <input class="text-primary focus:ring-primary" name="service"-->
<!--                                                       type="radio" value="overnight" v-model="selectedService">-->
<!--                                                <v-icon class="material-symbols-outlined text-primary mb-2">mdi-rocket-launch</v-icon>-->
<!--                                            </div>-->
<!--                                            <h4 class="font-weight-bold">Overnight</h4>-->
<!--                                            <p class="text-body-2">Next Day Delivery</p>-->
<!--                                        </v-card-text>-->
<!--                                    </v-card>-->
<!--                                </v-col>-->
<!--                            </v-row>-->
<!--                        </v-card-text>-->
<!--                    </v-card>-->
<!--                    <v-card-actions class="justify-center">-->
<!--                        <v-btn variant="outlined" color="secondary">Save Draft</v-btn>-->
<!--                        <v-btn variant="elevated" color="primary" @click="saveShipment">Review Shipment</v-btn>-->
<!--                    </v-card-actions>-->

<!--                </div>-->
<!--            </v-col>-->
<!--            <v-col cols="12" md="6" lg="4">-->
<!--                <aside class="d-flex flex-column ga-3">-->
<!--                    <v-card class="rounded-md overflow-hidden">-->
<!--                        <v-card-title>Shipment Summary</v-card-title>-->
<!--                        <v-card-text class="d-flex flex-column ga-3">-->
<!--                            <div class="d-flex justify-space-between text-sm">-->
<!--                                <span class="text-slate-500 text-capitalize">{{selectedService}} Shipping</span>-->
<!--                                <span class="font-medium">£{{ standardPrice.toFixed(2) }}</span>-->
<!--                            </div>-->
<!--                            <div class="d-flex justify-space-between text-sm">-->
<!--                                <span class="text-slate-500">Fuel Surcharge</span>-->
<!--                                <span class="font-medium">£{{ fuelCharge.toFixed(2) }}</span>-->
<!--                            </div>-->
<!--                            <div class="d-flex justify-space-between text-sm">-->
<!--                                <span class="text-slate-500">Insurance (Optional)</span>-->
<!--                                <span class="font-medium">£0.00</span>-->
<!--                            </div>-->
<!--                            <div class="d-flex justify-space-between text-sm">-->
<!--                                <span class="text-slate-500">Taxes</span>-->
<!--                                <span class="font-medium">£{{ ukTax.toFixed(2) }}</span>-->
<!--                            </div>-->
<!--                            <div class="pt-3 border-t border-slate-100  d-flex justify-space-between">-->
<!--                                <span class="font-bold">Total Estimate</span>-->
<!--                                <span class="font-bold text-xl text-primary">£{{ finalPrice.toFixed(2) }}</span>-->
<!--                            </div>-->
<!--                        </v-card-text>-->
<!--                    </v-card>-->
<!--                </aside>-->
<!--            </v-col>-->
<!--            <v-col cols="12" sm="6" md="6" lg="4">-->
<!--                <aside class="d-flex flex-column ga-3">-->
<!--                    <v-card>-->
<!--                        <v-card-text class="bg-primary/5 dark:bg-primary/10 rounded-lg">-->
<!--                            <div class="d-flex items-start ga-3 mb-3">-->
<!--                                <v-icon class="text-primary mt-1">mdi-information</v-icon>-->
<!--                                <p class="text-xs text-slate-600  leading-relaxed">-->
<!--                                    Rates are estimated based on provided details. Final price may vary after official pickup weighing.-->
<!--                                </p>-->
<!--                            </div>-->
<!--                            <v-btn block color="primary" variant="tonal">-->
<!--                                <v-icon class="text-lg">mdi-download</v-icon>-->
<!--                                Download Quote PDF-->
<!--                            </v-btn>-->
<!--                        </v-card-text>-->
<!--                    </v-card>-->
<!--                </aside>-->
<!--            </v-col>-->
<!--            <v-col cols="12" sm="6" md="12" lg="4">-->
<!--                <aside class="d-flex flex-column ga-3">-->
<!--                    <v-card class="bg-primary rounded-md">-->
<!--                        <v-card-title>-->
<!--                            Need assistance?-->
<!--                        </v-card-title>-->
<!--                        <v-card-text>-->
<!--                            <p class="mb-4">Our logistics experts are available 24/7 to help with your complex shipping needs.</p>-->
<!--                            <v-btn variant="outlined">Contact Support</v-btn>-->
<!--                        </v-card-text>-->
<!--                    </v-card>-->
<!--                </aside>-->
<!--            </v-col>-->

        </v-row>
    </v-container>
</template>
<script>
import axios from "axios";
import { Country, State, City } from 'country-state-city';
export default {
    name: "ShipmentNew",
    async mounted() {
        await this.fetchCountries();
        await this.fetchServices();
    },
    watch: {
        boxes: {
            handler() {
                this.calculatePrice();
            },
            deep: true
        },
        selectedCountry() {
            this.calculatePrice();
        },
        selectedService() {
            this.calculatePrice();
        }
    },
    computed:{
        company(){
            return this.$store.state.company;
        },
        totalWeight() {
            return this.totalWeightApi;
        },
        totalPrice() {
            return this.totalPriceApi;
        },
        servicePrice() {
            return this.totalPriceApi;
        },
        standardPrice(){
            return this.servicePrice;
        },
        fuelCharge(){
            return (1+this.standardPrice/10)
        },
        ukTax(){
            return ((this.standardPrice)+(this.fuelCharge))*20/100
        },
        finalPrice(){
            return (this.servicePrice+this.fuelCharge+this.ukTax)
        }
    },
    data(){
        return{
            countries:[],
            services:[],
            selectedService:null,
            form:{
                country_id:null,
                parcel_type:'parcel',
                weight:0,
            },
            ratePerKg: 0,
            totalWeightApi: 0,
            totalPriceApi: 0,
            boxes: [
                {
                    ptype: 'Standard Box',
                    actualWeight: 1,
                    length: 35,
                    width: 25,
                    height: 6,
                }
            ],
            ptypes:['Standard Box','Envelope','Pallet','Custom Package'],
            selectedCountry:'IN',
            loading:false,
            business:{
                business_name:'',
                address_line1:'',
                address_line2:'',
                region:'',
                postcode:'',
                country:'',
                reg_no:'',
                vat_no:'',
                email:'',
                phone:'',
                whatsapp:'',
            },
        }
    },
    methods:{
        async fetchCountries() {
            await this.$store.dispatch('fetchActiveCountries');
            this.countries = this.$store.state.activeCountries;
        },
        async fetchServices(){
            const res = await axios.get('/admin/company/services');
            this.services = res.data.services;
        },
        async calculateRates(){
            const res = await axios.post('/admin/company/calculate-rates', this.form);
            this.services = res.data;
        },
        async calculatePrice(){
            await axios.post('/admin/company/shipments',{
                service_id: this.selectedService.service_id,
                country_id: this.form.country_id,
                weight: this.form.weight
            });
        },
        // async calculatePrice() {
        //     if (!this.selectedCountry || !this.boxes.length) return;
        //
        //     try {
        //         const res = await axios.post('/shipment/calculate', {
        //             destination_country: this.selectedCountry,
        //             service: this.selectedService,
        //             boxes: this.boxes.map(b => ({
        //                 actual_weight: b.actualWeight,
        //                 length: b.length,
        //                 width: b.width,
        //                 height: b.height,
        //                 quantity: 1
        //             }))
        //         });
        //
        //         this.totalWeightApi = res.data.total_weight;
        //         this.ratePerKg = res.data.rate_per_kg;
        //         this.totalPriceApi = res.data.total_price;
        //         const finalData = {
        //             ...res.data, // ← real backend values
        //             boxes: this.boxes,
        //             destination_country: this.selectedCountry,
        //             service: this.selectedService
        //         };
        //
        //         console.log('FINAL DATA', finalData);
        //
        //     } catch (e) {
        //         console.error(e);
        //     }
        // },
        addBox() {
            this.boxes.push({
                ptype: 'Standard Box',
                actualWeight: 0,
                length: 35,
                width: 25,
                height:6,
            });
        },
        removeBox(index) {
            this.boxes.splice(index, 1);
        },
        getVolumetric(box) {
            if (!box.length || !box.width || !box.height) return 0;

            // standard courier formula
            return (box.length * box.width * box.height) / 5000;
        },
        getChargeable(box) {
            const volumetric = this.getVolumetric(box);
            const actual = box.actualWeight || 0;

            return Math.max(actual, volumetric);
        },
        saveShipment() {
            const payload = {
                destination_country: this.selectedCountry,
                service: this.selectedService,
                boxes: this.boxes.map(b => ({
                    actual_weight: b.actualWeight,
                    length: b.length,
                    width: b.width,
                    height: b.height,
                    quantity: 1
                })),
                total_weight: this.totalWeight,
                base_price: this.totalPrice,
                final_price: this.servicePrice,
                afterTax:this.finalPrice
            };

            console.log("payload",payload);
        }
    }
}
</script>

<style scoped>

</style>
