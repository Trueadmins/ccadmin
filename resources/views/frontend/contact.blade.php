@extends('layouts.app')

@section('content')
    <section class="sheader bg-primary text-white text-shadow-xs text-shadow-gray-400 py-10">
        <div class="container max-w-7xl flex flex-col gap-2 items-center text-center">
            <h1 class="text-3xl lg:text-5xl">Contact Courier City Ltd.</h1>
            <h2 class="text-2xl lg:text-4xl mb-4">Get In Touch.</h2>
            <p class="text-xl">We're on hand to help, 24/7, 365 days a year.</p>
        </div>
    </section>
    <section class="py-12 bg-linear-to-b lg:bg-linear-to-r from-secondary to-primary">
        <div class="container max-w-7xl">
            <h2 class="text-gray-50">How can we help?</h2>
            <p class="text-gray-100">
                Let us know how we can help by completing the form below. While we aim to respond as quickly as possible, please allow up to 24 hours for a reply (Monday to Friday).
            </p>
            <p class="text-gray-100">
                If your query is urgent, or relates to a booking currently in progress, please contact your local service centre team. Find the contact details for your nearest location
            </p>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-5 mt-6">
                <div class="flex flex-col gap-4">
                    <div>
                        <h5 class="font-bold text-primary uppercase tracking-wider text-base">Southall</h5>
                        <h5 class="font-bold text-gray-200 mb-6 uppercase tracking-wider text-xs">Opp Fire Station</h5>
                        <ul class="space-y-4 text-sm text-slate-300">
                            <li class="flex flex-col gap-1">
                                <div class="flex items-center gap-1">
                                    <i data-icon="mdi-map-marker" class="iconify text-primary"></i>
                                    <span class="text-sm">32 High Street, Southall, UB1 3DA</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i data-icon="mdi-phone" class="iconify text-primary"></i>
                                    <span class="text-sm">0208 571 9555</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i data-icon="mdi-whatsapp" class="iconify text-primary"></i>
                                    <span class="text-sm">0755 381 2222</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i data-icon="mdi-email" class="iconify text-primary"></i>
                                    <span class="text-sm">couriercityuk@gmail.com</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="font-bold text-primary uppercase tracking-wider text-base">Southall</h5>
                        <h5 class="font-bold text-gray-200 mb-6 uppercase tracking-wider text-xs">Near Railway Station</h5>
                        <ul class="space-y-4 text-sm text-slate-300">
                            <li class="flex flex-col gap-1">
                                <div class="flex items-center gap-1">
                                    <i data-icon="mdi-map-marker" class="iconify text-primary"></i>
                                    <span class="text-sm">12 Beaconsfield Road, Southall, UB1 1DW</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i data-icon="mdi-phone" class="iconify text-primary"></i>
                                    <span class="text-sm">0208 843 0092</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i data-icon="mdi-whatsapp" class="iconify text-primary"></i>
                                    <span class="text-sm">0788 833 8810</span>
                                </div>
                                <div class="flex items-center gap-1">
                                    <i data-icon="mdi-email" class="iconify text-primary"></i>
                                    <span class="text-sm">couriercityuk@gmail.com</span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col gap-3 bg-white p-2 lg:p-4 shadow rounded-xl overflow-hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                        <div>
                            <label for="fname" class="block mb-1 text-sm font-medium">First Name</label>
                            <input placeholder="First Name" name="fname" type="text" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                        </div>
                        <div>
                            <label for="lname" class="block mb-1 text-sm font-medium">Last Name</label>
                            <input placeholder="Last Name" name="lname" type="text" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-3">
                        <div>
                            <label for="cname" class="block mb-1 text-sm font-medium">Company Name</label>
                            <input placeholder="Company Name" name="cname" type="text" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                        </div>
                        <div>
                            <label for="email" class="block mb-1 text-sm font-medium">Email Address</label>
                            <input placeholder="Email Address" name="email" type="text" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                        </div>
                    </div>
                    <div>
                        <label for="phone" class="block mb-1 text-sm font-medium">Phone No</label>
                        <input placeholder="Phone no" name="phone" type="text" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                    </div>
                    <div>
                        <label for="message" class="block mb-1 text-sm font-medium">Message</label>
                        <textarea rows="5" placeholder="type your message" name="message" class="w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </textarea>
                    </div>
                    <div type="submit" title="Send Message" class="inline-flex px-4 py-1.5 rounded-lg text-white bg-primary justify-center text-shadow-xs text-shadow-gray-400 tracking-wide">Send Message</div>
                </div>
            </div>
        </div>
    </section>
@endsection
