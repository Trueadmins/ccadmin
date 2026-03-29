<template>
    <v-container fluid class="pa-2">
        <div class="mb-8">
            <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400 text-sm mb-2">
                <span>Shipments</span>
                <v-icon>mdi-chevron-right</v-icon>
                <span class="text-slate-900 dark:text-slate-100 font-medium">Create New Shipment</span>
            </div>
            <h1 class="text-3xl font-bold text-slate-900 dark:text-slate-100">Create New Shipment</h1>
        </div>
        <!-- Multistep Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            <!-- Form Area -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Step 1: Origin & Destination -->
                <section class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="size-8 bg-primary rounded-full flex items-center justify-center text-white font-bold text-sm">1</div>
                        <h2 class="text-xl font-semibold">Origin &amp; Destination</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500">From (Origin)</h3>
                            <label class="block">
                                <span class="text-sm font-medium text-slate-700 dark:text-slate-300 mb-1 block">Full Name</span>
                                <input class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary text-sm" placeholder="Sender's Name" type="text">
                            </label>
                            <label class="block">
                                <span class="text-sm font-medium text-slate-700 dark:text-slate-300 mb-1 block">Address / Zip Code</span>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-2.5 text-slate-400 text-sm">location_on</span>
                                    <input class="w-full pl-10 rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary text-sm" placeholder="City or Zip Code" type="text">
                                </div>
                            </label>
                        </div>
                        <div class="space-y-4">
                            <h3 class="text-sm font-bold uppercase tracking-wider text-slate-500">To (Destination)</h3>
                            <label class="block">
                                <span class="text-sm font-medium text-slate-700 dark:text-slate-300 mb-1 block">Recipient Name</span>
                                <input class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary text-sm" placeholder="Receiver's Name" type="text">
                            </label>
                            <label class="block">
                                <span class="text-sm font-medium text-slate-700 dark:text-slate-300 mb-1 block">Address / Zip Code</span>
                                <div class="relative">
                                    <span class="material-symbols-outlined absolute left-3 top-2.5 text-slate-400 text-sm">flag</span>
                                    <input class="w-full pl-10 rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary text-sm" placeholder="City or Zip Code" type="text">
                                </div>
                            </label>
                        </div>
                    </div>
                </section>
                <!-- Step 2: Package Info -->
                <section class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="size-8 bg-slate-200 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-full flex items-center justify-center font-bold text-sm">2</div>
                        <h2 class="text-xl font-semibold">Package Information</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300 mb-1 block">Package Type</span>
                            <select class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary text-sm">
                                <option>Standard Box</option>
                                <option>Envelope</option>
                                <option>Pallet</option>
                                <option>Custom Packaging</option>
                            </select>
                        </label>
                        <label class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300 mb-1 block">Weight (kg)</span>
                            <input class="w-full rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary text-sm" placeholder="0.00" type="number">
                        </label>
                        <div class="block">
                            <span class="text-sm font-medium text-slate-700 dark:text-slate-300 mb-1 block">Dimensions (L x W x H)</span>
                            <div class="flex gap-2">
                                <input class="w-1/3 rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary text-sm text-center px-1" placeholder="L" type="text">
                                <input class="w-1/3 rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary text-sm text-center px-1" placeholder="W" type="text">
                                <input class="w-1/3 rounded-lg border-slate-200 dark:border-slate-700 dark:bg-slate-800 focus:ring-primary focus:border-primary text-sm text-center px-1" placeholder="H" type="text">
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Step 3: Service Selection -->
                <section class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="size-8 bg-slate-200 dark:bg-slate-800 text-slate-600 dark:text-slate-400 rounded-full flex items-center justify-center font-bold text-sm">3</div>
                        <h2 class="text-xl font-semibold">Shipping Service</h2>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Standard -->
                        <div class="relative group cursor-pointer border-2 border-slate-200 dark:border-slate-800 hover:border-primary dark:hover:border-primary rounded-xl p-4 transition-all">
                            <input checked="" class="absolute right-4 top-4 text-primary focus:ring-primary" name="service" type="radio">
                            <span class="material-symbols-outlined text-primary mb-2">schedule</span>
                            <h4 class="font-bold text-lg">Standard</h4>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mb-4">5-7 Business Days</p>
                            <p class="text-xl font-bold text-primary">$12.50</p>
                        </div>
                        <!-- Express -->
                        <div class="relative group cursor-pointer border-2 border-slate-200 dark:border-slate-800 hover:border-primary dark:hover:border-primary rounded-xl p-4 transition-all">
                            <input class="absolute right-4 top-4 text-primary focus:ring-primary" name="service" type="radio">
                            <span class="material-symbols-outlined text-primary mb-2">bolt</span>
                            <h4 class="font-bold text-lg">Express</h4>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mb-4">2-3 Business Days</p>
                            <p class="text-xl font-bold text-primary">$28.90</p>
                        </div>
                        <!-- Overnight -->
                        <div class="relative group cursor-pointer border-2 border-slate-200 dark:border-slate-800 hover:border-primary dark:hover:border-primary rounded-xl p-4 transition-all">
                            <input class="absolute right-4 top-4 text-primary focus:ring-primary" name="service" type="radio">
                            <span class="material-symbols-outlined text-primary mb-2">rocket_launch</span>
                            <h4 class="font-bold text-lg">Overnight</h4>
                            <p class="text-xs text-slate-500 dark:text-slate-400 mb-4">Next Day Delivery</p>
                            <p class="text-xl font-bold text-primary">$54.20</p>
                        </div>
                    </div>
                </section>
                <div class="flex justify-end gap-4 pt-4">
                    <button class="px-6 py-3 rounded-lg border border-slate-300 dark:border-slate-700 text-slate-700 dark:text-slate-300 font-semibold hover:bg-slate-50 dark:hover:bg-slate-800 transition-colors">Save Draft</button>
                    <button class="px-8 py-3 rounded-lg bg-primary text-white font-bold hover:bg-primary/90 shadow-lg shadow-primary/20 transition-all">Review Shipment</button>
                </div>
            </div>
            <!-- Sidebar: Price Summary -->
            <aside class="space-y-6 sticky top-24">
                <div class="bg-white dark:bg-slate-900 rounded-xl border border-slate-200 dark:border-slate-800 p-6 shadow-sm overflow-hidden">
                    <div class="relative h-32 -mx-6 -mt-6 mb-6 bg-slate-100 overflow-hidden">
                        <img class="w-full h-full object-cover opacity-80" data-alt="Abstract map showing logistics routes and points" data-location="New York" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBlVc5dyG8Xyba5o8cSBEyACClMGQNZD9fiKJA4_iLh43Iot11rlYzcP1VA32HAGcT2uMhG4LvzO8ziYRazNJ2HxXpPTmI1LIffJRrKjm5F74yVFHg9G4xHAlPhdutf5oMiEhh3ALdAJWjU0tQfZKxTDRlQhGD4OxpQqEOigMa-oxtQ1bpJ4iZxqsABPANlGaotLE6s8n830jXu0Hq2c-j81nEpc8qih62IvtMyFbMY-X9DmllRjgShEKqkfcYSxnkFGSu6CQnau71z">
                        <div class="absolute inset-0 bg-gradient-to-t from-white dark:from-slate-900 to-transparent"></div>
                    </div>
                    <h3 class="text-lg font-bold mb-4">Shipment Summary</h3>
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-500">Base Shipping</span>
                            <span class="font-medium">$12.50</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-500">Fuel Surcharge</span>
                            <span class="font-medium">$1.20</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-500">Insurance (Optional)</span>
                            <span class="font-medium">$0.00</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-slate-500">Taxes</span>
                            <span class="font-medium">$0.85</span>
                        </div>
                        <div class="pt-3 border-t border-slate-100 dark:border-slate-800 flex justify-between">
                            <span class="font-bold">Total Estimate</span>
                            <span class="font-bold text-xl text-primary">$14.55</span>
                        </div>
                    </div>
                    <div class="bg-primary/5 dark:bg-primary/10 rounded-lg p-4 mb-4">
                        <div class="flex items-start gap-3">
                            <span class="material-symbols-outlined text-primary text-lg mt-0.5">info</span>
                            <p class="text-xs text-slate-600 dark:text-slate-400 leading-relaxed">
                                Rates are estimated based on provided details. Final price may vary after official pickup weighing.
                            </p>
                        </div>
                    </div>
                    <button class="w-full py-3 bg-slate-100 dark:bg-slate-800 text-slate-700 dark:text-slate-300 rounded-lg text-sm font-semibold flex items-center justify-center gap-2 hover:bg-slate-200 transition-colors">
                        <span class="material-symbols-outlined text-lg">download</span>
                        Download Quote PDF
                    </button>
                </div>
                <!-- Need Help Card -->
                <div class="bg-primary text-white rounded-xl p-6 shadow-lg shadow-primary/20">
                    <h4 class="font-bold mb-2">Need assistance?</h4>
                    <p class="text-sm text-primary-50 dark:text-slate-200 mb-4 opacity-90">Our logistics experts are available 24/7 to help with your complex shipping needs.</p>
                    <button class="w-full py-2 bg-white/20 hover:bg-white/30 rounded-lg text-sm font-bold transition-all backdrop-blur-md">Contact Support</button>
                </div>
            </aside>
        </div>
    </v-container>
</template>
<script>
export default {
    name: "ShipmentNew"
}
</script>

<style scoped>

</style>
