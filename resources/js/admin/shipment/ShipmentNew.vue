<template>
    <v-container fluid class="pa-2">
        <div class="mb-3">
            <h2 class="font-bold">Create New Shipment</h2>
        </div>
        <!-- Multistep Layout -->
        <v-row>
            <v-col cols="12" md="8">
                <div class="d-flex flex-column ga-3">
                    <!-- Step 1: Origin & Destination -->
                    <v-card class="rounded-md shadow-sm">
                        <v-card-title>
                            Origin &amp; Destination
                        </v-card-title>
                        <v-card-text>
                            <div class="space-y-4">
                                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500">From (Origin)</h3>
                                <label class="block">
                                    <v-text-field variant="outlined" density="compact" label="Full Name"/>
                                </label>
                                <label class="block">
                                    <v-text-field variant="outlined" density="compact" label="Address / Zip Code"/>
                                </label>
                            </div>
                            <div class="space-y-4">
                                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500">To (Destination)</h3>
                                <v-row dense>
                                    <v-col cols="12" md="12" class="block mt-2">
                                        <v-text-field prependInnerIcon="mdi-account" variant="outlined" density="compact" label="Recipient Name"/>
                                    </v-col>
                                    <v-col cols="12" md="6" class="block">
                                        <v-autocomplete v-model="selectedCountry" :items="countries" item-title="name"
                                                        prependInnerIcon="mdi-map-marker" variant="outlined"
                                                        density="compact" label="Country" returnObject/>
                                    </v-col>
                                    <v-col cols="12" md="6" class="block">
                                        <v-autocomplete v-model="selectedState" :items="states" prependInnerIcon="mdi-city" item-title="name"
                                                        variant="outlined"
                                                        density="compact" label="State" returnObject/>
                                    </v-col>
                                    <v-col cols="12" md="6" class="block">
                                        <v-autocomplete :items="regions" item-title="name"
                                                        prependInnerIcon="mdi-office-building" variant="outlined"
                                                        density="compact" label="Region" returnObject/>
                                    </v-col>
                                    <v-col cols="12" md="6" class="block">
                                        <v-text-field prependInnerIcon="mdi-map-marker-outline" variant="outlined" density="compact" label="Post Code"/>
                                    </v-col>
                                    <v-col cols="12" md="12" class="block">
                                        <v-text-field variant="outlined" density="compact" label="Address line 1"/>
                                    </v-col>
                                    <v-col cols="12" md="12" class="block">
                                        <v-text-field variant="outlined" density="compact" label="Address line 2"/>
                                    </v-col>
                                </v-row>
                            </div>
                        </v-card-text>
                    </v-card>
                    <!-- Step 2: Package Info -->
                    <v-card class="rounded-md shadow-sm">
                        <v-card-title>
                            Package Information
                        </v-card-title>
                        <v-card-text>
                            <v-row>
                                <v-col cols="12" md="3">
                                    <div class="block">
                                        <span class="text-sm font-medium text-slate-700">Package Type</span>
                                        <v-select class="mt-2" v-model="shipment.ptype" variant="outlined" density="compact" :items="ptypes" placeholder="Select Type" />
                                    </div>
                                </v-col>
                                <v-col cols="12" md="3">
                                    <div class="block">
                                        <span class="text-sm font-medium text-slate-700">Weight (Kg)</span>
                                        <v-number-input controlVariant="split" :precision="3" :min="0.5" class="mt-2" v-model="shipment.actualWeight" variant="outlined" density="compact" label="Weight (kg)" persistent-placeholder placeholder="0.00"/>
                                    </div>
                                </v-col>
                                <v-col cols="12" md="6">
                                    <div class="block">
                                        <span class="text-sm font-medium text-slate-700">Dimensions (L x W x H)cm</span>
                                        <div class="d-flex ga-2 mt-2">
                                            <v-number-input controlVariant="stacked" :min="10" v-model="shipment.length" variant="outlined" density="compact" label="L" persistent-placeholder/>
                                            <v-number-input controlVariant="stacked" :min="5" v-model="shipment.width" variant="outlined" density="compact" label="W" persistent-placeholder/>
                                            <v-number-input controlVariant="stacked" :min="1" v-model="shipment.height" variant="outlined" density="compact" label="H" persistent-placeholder/>
                                        </div>
                                    </div>
                                    Volumetric Weight {{volumeWeight.toFixed(3)}} Kg
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card>
                    <!-- Step 3: Service Selection -->
                    <v-card class="rounded-md shadow-sm">
                        <v-card-title>
                            Shipping Service
                        </v-card-title>
                        <v-card-text class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <v-row>
                                <v-col cols="12" md="4">
                                    <!-- Standard -->
                                    <v-card class="position-relative  rounded-md">
                                        <v-card-text>
                                            <div class="d-flex justify-space-between">
                                                <input checked="" class="text-primary focus:ring-primary" name="service" type="radio">
                                                <v-icon class="material-symbols-outlined text-primary mb-2">mdi-clock-fast</v-icon>
                                            </div>
                                            <h4 class="font-weight-bold">Standard</h4>
                                            <p class="text-body-2 mb-2">5-7 Business Days</p>
                                            <p class="font-weight-bold text-body-1 text-primary">£{{standardPrice.toFixed(2)}}</p>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <!-- Express -->
                                    <v-card class="position-relative  rounded-md">
                                        <v-card-text>
                                            <div class="d-flex justify-space-between">
                                                <input checked="" class="text-primary focus:ring-primary" name="service" type="radio">
                                                <v-icon class="material-symbols-outlined text-primary mb-2">mdi-lightning-bolt</v-icon>
                                            </div>
                                            <h4 class="font-weight-bold">Express</h4>
                                            <p class="text-body-2 mb-2">2-3 Business Days</p>
                                            <p class="font-weight-bold text-body-1 text-primary">£{{expressPrice.toFixed(2)}}</p>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <!-- Overnight -->
                                    <v-card class="position-relative  rounded-md">
                                        <v-card-text>
                                            <div class="d-flex justify-space-between">
                                                <input checked="" class="text-primary focus:ring-primary" name="service" type="radio">
                                                <v-icon class="material-symbols-outlined text-primary mb-2">mdi-rocket-launch</v-icon>
                                            </div>
                                            <h4 class="font-weight-bold">Overnight</h4>
                                            <p class="text-body-2 mb-2">Next Day Delivery</p>
                                            <p class="font-weight-bold text-body-1 text-primary">£{{overnightPrice.toFixed(2)}}</p>
                                        </v-card-text>
                                    </v-card>
                                </v-col>
                            </v-row>
                        </v-card-text>
                    </v-card>
                    <v-card-actions class="justify-end">
                        <v-btn variant="outlined" color="secondary">Save Draft</v-btn>
                        <v-btn variant="elevated" color="primary">Review Shipment</v-btn>
                    </v-card-actions>

                </div>
            </v-col>
            <v-col cols="12" md="4">
                <aside class="d-flex flex-column ga-3">
                    <v-card class="rounded-md overflow-hidden">
                        <v-card-title>Shipment Summary</v-card-title>
                        <v-card-text class="d-flex flex-column ga-3">
                            <div class="d-flex justify-space-between text-sm">
                                <span class="text-slate-500">Base Shipping</span>
                                <span class="font-medium">£{{ standardPrice.toFixed(2) }}</span>
                            </div>
                            <div class="d-flex justify-space-between text-sm">
                                <span class="text-slate-500">Fuel Surcharge</span>
                                <span class="font-medium">£{{ fuelCharge.toFixed(2) }}</span>
                            </div>
                            <div class="d-flex justify-space-between text-sm">
                                <span class="text-slate-500">Insurance (Optional)</span>
                                <span class="font-medium">£0.00</span>
                            </div>
                            <div class="d-flex justify-space-between text-sm">
                                <span class="text-slate-500">Taxes</span>
                                <span class="font-medium">£{{ ukTax.toFixed(2) }}</span>
                            </div>
                            <div class="pt-3 border-t border-slate-100  d-flex justify-space-between">
                                <span class="font-bold">Total Estimate</span>
                                <span class="font-bold text-xl text-primary">£{{ totalPrice.toFixed(2) }}</span>
                            </div>
                        </v-card-text>
                    </v-card>
                    <v-card>
                        <v-card-text class="bg-primary/5 dark:bg-primary/10 rounded-lg">
                            <div class="d-flex items-start ga-3 mb-3">
                                <v-icon class="text-primary mt-1">mdi-information</v-icon>
                                <p class="text-xs text-slate-600  leading-relaxed">
                                    Rates are estimated based on provided details. Final price may vary after official pickup weighing.
                                </p>
                            </div>
                            <v-btn block color="primary" variant="tonal">
                                <v-icon class="text-lg">mdi-download</v-icon>
                                Download Quote PDF
                            </v-btn>
                        </v-card-text>
                    </v-card>
                    <!-- Need Help Card -->
                    <v-card class="bg-primary rounded-md">
                        <v-card-title>
                            Need assistance?
                        </v-card-title>
                        <v-card-text>
                            <p class="mb-4">Our logistics experts are available 24/7 to help with your complex shipping needs.</p>
                            <v-btn variant="outlined">Contact Support</v-btn>
                        </v-card-text>
                    </v-card>
                </aside>
            </v-col>
        </v-row>
    </v-container>
</template>
<script>
import axios from "axios";
import { Country, State, City } from 'country-state-city';
export default {
    name: "ShipmentNew",
    mounted() {

    },
    computed:{
        countries(){
            return Country.getAllCountries();
        },
        states(){
            return State.getStatesOfCountry(this.selectedCountry.isoCode)
        },
        regions(){
            return City.getCitiesOfState(this.selectedState.countryCode,this.selectedState.isoCode)
        },
        volumeWeight(){
            return (this.shipment.length * this.shipment.width * this.shipment.height)/5000
        },
        standardPrice(){
            return (4+this.pricePerKg*this.volumeWeight)
        },
        expressPrice(){
            return (3*this.standardPrice)
        },
        overnightPrice(){
            return (6*this.standardPrice)
        },
        fuelCharge(){
            return (1+this.standardPrice/10)
        },
        ukTax(){
            return ((this.standardPrice)+(this.fuelCharge))*20/100
        },
        totalPrice(){
            return (this.standardPrice + this.fuelCharge + this.ukTax)
        }
    },
    data(){
        return{
            selectedCountry:{ "name": "United Kingdom", "isoCode": "GB", "flag": "🇬🇧", "phonecode": "44", "currency": "GBP", "latitude": "54.00000000", "longitude": "-2.00000000", "timezones": [ { "zoneName": "Europe/London", "gmtOffset": 0, "gmtOffsetName": "UTC±00", "abbreviation": "GMT", "tzName": "Greenwich Mean Time" } ] },
            selectedState: { "name": "London Borough of Ealing", "isoCode": "EAL", "countryCode": "GB", "latitude": "51.52503660", "longitude": "-0.34139650" },
            searchQuery :'',
            selectedPlace:null,
            loading:false,
            predictions:[],
            place_id: '',
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
            ptypes:['Standard Box','Envelope','Pallet','Custom Package'],
            pricePerKg:4,
            shipment:{
                ptype:'Standard Box',
                actualWeight:1,
                length:35,
                width:25,
                height:6,
            }
        }
    },
    methods:{
        async onSearchChange(val) {
            this.searchQuery = val;
            if (val && val.length > 3) {
                await this.getPredictions(val);
            } else {
                this.predictions = [];
            }
            console.log(Country.getAllCountries());
            this.countries = Country.getAllCountries();

        },
        async getPredictions(input) {
            try {
                this.loading = true;
                const resp = await axios.get(`/google/autocomplete?query=${encodeURIComponent(input)}`);
                this.predictions = resp.data.predictions || [];
            } catch (err) {
                console.error("Prediction error:", err);
            } finally {
                this.loading = false;
            }
        },
        async onPlaceSelect(place) {
            if (place && place.place_id) {
                await this.getPlaceDetails(place.place_id);
            }
        },
        async getPlaceDetails(placeId) {
            try {
                const resp = await axios.get(`/google/details?place_id=${placeId}`);
                const details = resp.data.result;

                console.log("Full address details:", details);

                // Auto-fill your fields:
                this.business.address_line1 = this.extractComponent(details, "street_number")+ ' ' + this.extractComponent(details, "route") ;
                this.business.address_line2 = this.extractComponent(details, "sublocality") || this.extractComponent(details, "locality") + ' ' + this.extractComponent(details, "postal_town");
                this.business.region = this.extractComponent(details, "administrative_area_level_2") || this.extractComponent(details, "postal_town");
                this.business.postcode = this.extractComponent(details, "postal_code");
                this.business.country = this.extractComponent(details, "country");

                console.log("Auto-filled business:", this.business);
            } catch (err) {
                console.error("Place details error:", err);
            }
        },
        extractComponent(details, type) {
            const comp = details.address_components?.find((c) => c.types.includes(type));
            return comp ? comp.long_name : "";
        },
    }
}
</script>

<style scoped>

</style>
