@extends('layouts.app')

@section('content')
    <section class="relative aspect-7/3 bg-orange-900">
{{--        <video autoplay loop muted playsinline class="absolute w-full z-2 h-full object-cover object-bottom inset-0 opacity-50" poster="{{asset('images/dhl.jpg')}}">--}}
{{--            <source src="{{asset('images/dhl.mp4')}}"/>--}}
{{--        </video>--}}
        <video autoplay loop muted playsinline class="absolute w-full h-full object-cover object-bottom inset-0 opacity-50" poster="{{asset('images/fedex.jpg')}}">
            <source src="{{asset('images/fedex.mp4')}}"/>
        </video>
{{--        <video autoplay loop muted playsinline class="absolute w-1/2 h-full z-1 object-cover object-center inset-0 opacity-90" poster="{{asset('images/fedex.jpg')}}">--}}
{{--            <source src="{{asset('images/video3.mp4')}}"/>--}}
{{--        </video>--}}
        <div class="container max-w-7xl h-full flex items-center justify-end text-center">
            <h1 class="text-white drop-shadow-lg drop-shadow-gray-800 text-[6vw]">
                Worldwide <br/> <span class="text-primary">Courier</span> <br/> & Cargo
            </h1>
        </div>
    </section>
{{--    <section class="hero relative bg-secondary">--}}
{{--        <img src="{{asset('images/hero1.jpg')}}" alt="Courier City" class="aspect-video lg:aspect-7/3 opacity-50 w-full object-cover object-top"/>--}}
{{--        <div class="absolute top-0 w-full h-full">--}}
{{--            <div class="container max-w-7xl h-full flex items-center justify-center">--}}
{{--            <h1 class="text-white drop-shadow-lg drop-shadow-gray-800 text-[6vw]">--}}
{{--            Worldwide <span class="text-primary">Courier</span> & Cargo--}}
{{--            </h1>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
{{--    <section class=" border-y bg-secondary border-white/5 py-12 relative">--}}
{{--        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">--}}
{{--            <div class="grid grid-cols-2 md:grid-cols-4 gap-8">--}}
{{--                <div class="text-center space-y-1 border-r border-slate-200 last:border-0">--}}
{{--                    <p class="text-2xl lg:text-4xl font-black text-primary">1,000+</p>--}}
{{--                    <p class="text-sm text-gray-200 font-semibold uppercase tracking-wider">Packages--}}
{{--                        Daily</p>--}}
{{--                </div>--}}
{{--                <div class="text-center space-y-1 md:border-r border-slate-200 last:border-0">--}}
{{--                    <p class="text-2xl lg:text-4xl font-black text-primary">99.9%</p>--}}
{{--                    <p class="text-sm text-gray-200 font-semibold  uppercase tracking-wider">Success--}}
{{--                        Rate</p>--}}
{{--                </div>--}}
{{--                <div class="text-center space-y-1 border-r border-slate-200  last:border-0">--}}
{{--                    <p class="text-2xl lg:text-4xl font-black text-primary">25 Min</p>--}}
{{--                    <p class="text-sm text-gray-200 font-semibold  uppercase tracking-wider">Avg.--}}
{{--                        Pickup Time</p>--}}
{{--                </div>--}}
{{--                <div--}}
{{--                    class="text-center space-y-1 border-r border-slate-100  last:border-0">--}}
{{--                    <p class="text-2xl lg:text-4xl font-black text-primary">24/7</p>--}}
{{--                    <p class="text-sm text-gray-200 font-semibold  uppercase tracking-wider">Support--}}
{{--                        Ready</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </section>--}}
    <section class="py-24 px-4 bg-gray-50">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col items-center text-center mb-16 space-y-4">
                <h2 class="text-primary font-bold tracking-widest uppercase text-sm">Our Expertise</h2>
                <h3 class="text-4xl md:text-5xl font-black tracking-tight">Tailored Delivery Solutions</h3>
                <div class="w-20 h-1.5 bg-primary rounded-full"></div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div
                    class="group bg-white p-8 rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 hover:border-primary transition-all flex flex-col items-start gap-6">
                    <div
                        class="w-16 h-16 rounded-xl bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                        <span data-icon="mdi-lightning-bolt" class="iconify material-symbols-outlined text-4xl">bolt</span>
                    </div>
                    <div class="space-y-3">
                        <h4 class="text-2xl font-bold">Express Delivery</h4>
                        <p class="leading-relaxed">
                            Get your urgent documents and packages delivered within hours with our priority
                            dispatch system.
                        </p>
                    </div>
                    <a class="mt-auto text-primary font-bold inline-flex items-center gap-2 group/btn"
                       href="#">
                        Learn more <span data-icon="mdi-arrow-right"
                                         class="iconify material-symbols-outlined text-lg group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
                <div
                    class="group bg-white p-8 rounded-2xl shadow-xl shadow-slate-200/50 border-slate-100 hover:border-primary transition-all flex flex-col items-start gap-6 scale-105 z-10">
                    <div class="w-16 h-16 rounded-xl bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                        <span data-icon="mdi-map-marker"
                              class="iconify material-symbols-outlined text-4xl">location_on</span>
                    </div>
                    <div class="space-y-3">
                        <h4 class="text-2xl font-bold">Same Day Local</h4>
                        <p class="text-slate-600 leading-relaxed">
                            Reliable local delivery across the city within the same business day. Perfect for
                            e-commerce and retail.
                        </p>
                    </div>
                    <a class="mt-auto text-primary font-bold inline-flex items-center gap-2 group/btn"
                       href="#">
                        Learn more <span data-icon="mdi-arrow-right"
                                         class="iconify material-symbols-outlined text-lg group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
                <div class="group bg-white p-8 rounded-2xl shadow-xl shadow-slate-200/50 border border-slate-100 hover:border-primary transition-all flex flex-col items-start gap-6">
                    <div class="w-16 h-16 rounded-xl bg-primary/10 flex items-center justify-center text-primary group-hover:bg-primary group-hover:text-white transition-all">
                        <span data-icon="mdi-earth" class="iconify material-symbols-outlined text-4xl">public</span>
                    </div>
                    <div class="space-y-3">
                        <h4 class="text-2xl font-bold">International Shipping</h4>
                        <p class="text-slate-600 leading-relaxed">
                            Seamless global logistics connecting you to over 200 countries with full customs
                            support.
                        </p>
                    </div>
                    <a class="mt-auto text-primary font-bold inline-flex items-center gap-2 group/btn"
                       href="#">
                        Learn more <span data-icon="mdi-arrow-right" class="iconify material-symbols-outlined text-lg group-hover/btn:translate-x-1 transition-transform">arrow_forward</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <section class="pt-24 bg-secondary text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="space-y-8">
                    <h2 class="text-4xl md:text-5xl font-bold">Simple Steps to <span
                            class="text-primary">Send Anything</span></h2>
                    <p class="text-slate-200 text-lg">
                        We've streamlined the process to make shipping as
                        easy as ordering a pizza.
                    </p>
                    <div class="space-y-10">
                        <div class="flex gap-6">
                            <div
                                class="shrink-0 w-12 h-12 rounded-full border-2 border-primary flex items-center justify-center text-xl font-bold text-primary">1
                            </div>
                            <div>
                                <h4 class="text-xl font-bold mb-2">Book Online</h4>
                                <p class="text-slate-300">Schedule your shipment via our website or app in
                                    seconds. Choose your speed and destination.</p>
                            </div>
                        </div>
                        <div class="flex gap-6">
                            <div
                                class="shrink-0 w-12 h-12 rounded-full border-2 border-primary flex items-center justify-center text-xl font-bold text-primary">2
                            </div>
                            <div>
                                <h4 class="text-xl font-bold mb-2">Easy Pick Up</h4>
                                <p class="text-slate-300">A professional courier collects your package from
                                    your door. No need to visit a drop-off point.</p>
                            </div>
                        </div>
                        <div class="flex gap-6">
                            <div
                                class="shrink-0 w-12 h-12 rounded-full border-2 border-primary flex items-center justify-center text-xl font-bold text-primary">3
                            </div>
                            <div>
                                <h4 class="text-xl font-bold mb-2">Live Track</h4>
                                <p class="text-slate-300">Monitor your delivery in real-time on a map until it
                                    reaches its destination safely.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="relative group">
                    <div class="absolute -inset-4 bg-primary/10 blur-3xl rounded-full transition-all group-hover:bg-primary/40"></div>
                    <div class="relative rounded-3xl overflow-hidden shadow-2xl">
                        <img alt="Tracking Interface" sizes="100vw" class="w-71 lg:w-full"
                               width="284" height="400"
                               data-alt="Smartphone screen showing a live delivery tracking map interface"
                               src="{{asset('images/calculate-1.png')}}"/>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-primary rounded-4xl p-12 md:p-20 text-center relative overflow-hidden group">
                <div
                    class="absolute top-0 left-0 w-full h-full opacity-10 bg-[radial-gradient(circle_at_center,var(--tw-gradient-stops))] from-white via-transparent to-transparent"></div>
                <h2 class="text-4xl md:text-6xl font-black text-secondary mb-6 relative z-10">
                    Ready to move your package?
                </h2>
                <p class="text-secondary/80 text-lg md:text-xl font-medium mb-10 max-w-2xl mx-auto relative z-10">Join
                    thousands of businesses who trust Courier City for their critical urban logistics.</p>
                <div class="flex flex-col sm:flex-row justify-center gap-4 relative z-10">
                    <button
                        class="bg-secondary text-white font-black px-10 py-4 rounded-xl hover:scale-105 transition-transform shadow-xl">
                        Start a Shipment
                    </button>
                    <button
                        class="bg-transparent border-2 border-secondary text-secondary font-black px-10 py-4 rounded-xl hover:bg-secondary hover:text-white transition-all">
                        Get a Quote
                    </button>
                </div>
            </div>
        </div>
    </section>
@endsection
