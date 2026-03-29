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
                                <label class="block">
                                    <v-text-field variant="outlined" density="compact" label="Recipient Name"/>
                                </label>
                                <label class="block">
                                    <v-text-field variant="outlined" density="compact" label="Address / Zip Code"/>
                                </label>
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
                                <v-col cols="12" md="4">
                                    <div class="block">
                                        <span class="text-sm font-medium text-slate-700  mb-1 block">Package Type</span>
                                        <v-select variant="outlined" density="compact" :items="ptypes" placeholder="Select Type" />
                                    </div>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <div class="block">
                                        <span class="text-sm font-medium text-slate-700  mb-1 block">Weight (Kg)</span>
                                        <v-text-field variant="outlined" density="compact" label="Weight (kg)" persistent-placeholder placeholder="0.00"/>
                                    </div>
                                </v-col>
                                <v-col cols="12" md="4">
                                    <div class="block">
                                        <span class="text-sm font-medium text-slate-700  mb-1 block">Dimensions (L x W x H)</span>
                                        <div class="d-flex ga-2">
                                            <v-text-field variant="outlined" density="compact" label="L" persistent-placeholder/>
                                            <v-text-field variant="outlined" density="compact" label="W" persistent-placeholder/>
                                            <v-text-field variant="outlined" density="compact" label="H" persistent-placeholder/>
                                        </div>
                                    </div>
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
                                            <p class="font-weight-bold text-body-1 text-primary">£12.50</p>
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
                                            <p class="font-weight-bold text-body-1 text-primary">£28.90</p>
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
                                            <p class="font-weight-bold text-body-1 text-primary">£54.20</p>
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
                                <span class="font-medium">£12.50</span>
                            </div>
                            <div class="d-flex justify-space-between text-sm">
                                <span class="text-slate-500">Fuel Surcharge</span>
                                <span class="font-medium">£1.20</span>
                            </div>
                            <div class="d-flex justify-space-between text-sm">
                                <span class="text-slate-500">Insurance (Optional)</span>
                                <span class="font-medium">£0.00</span>
                            </div>
                            <div class="d-flex justify-space-between text-sm">
                                <span class="text-slate-500">Taxes</span>
                                <span class="font-medium">£0.85</span>
                            </div>
                            <div class="pt-3 border-t border-slate-100  d-flex justify-space-between">
                                <span class="font-bold">Total Estimate</span>
                                <span class="font-bold text-xl text-primary">£14.55</span>
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
export default {
    name: "ShipmentNew",
    data(){
        return{
            ptypes:['Standard Box','Envelope','Pallet','Custom Package']
        }
    }
}
</script>

<style scoped>

</style>
