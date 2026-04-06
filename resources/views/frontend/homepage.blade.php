@extends('layouts.app')

@section('content')
    @php
        $whys = [
                 [
                    "title" => "Global Reach.",
                    "icon" => "mdi-earth",
                    "text" => "We're connected all over the world, so no matter your parcel's destination, CitySprint ensures your items are delivered with ease."
                 ],
                [
                    "title" => "Carefully selected partners.",
                    "icon" => "mdi-handshake",
                    "text" => "Providing a positive service is key, so we ensure our partner's performance and values align with our own to offer you trusted International shipping from the UK."
                ],
                [
                    "title" => "Flexible solutions.",
                    "icon" => "mdi-file-document-check-outline",
                    "text" => "Whether it's an urgent delivery or a non-time sensitive shipment, we've got you covered."
                ],
        ];
    @endphp
    <section class="relative aspect-video lg:aspect-7/3 bg-orange-900">
{{--        <video autoplay loop muted playsinline class="absolute w-full z-2 h-full object-cover object-bottom inset-0 opacity-50" poster="{{asset('images/dhl.jpg')}}">--}}
{{--            <source src="{{asset('images/dhl.mp4')}}"/>--}}
{{--        </video>--}}
        <video autoplay loop muted playsinline class="absolute w-full h-full object-cover object-bottom inset-0 opacity-50"
               poster="{{asset('images/plane1.png')}}">
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
    <section class="py-10 bg-linear-to-tr from-orange-200 via-white/50 to-primary/50">
        <div class="container max-w-7xl">
            <div class="grid grid-cols-12 items-center gap-3">
                <div class="col-span-12 lg:col-span-7 detail flex flex-col gap-4">
                    <h2 class="text-slate-700 text-2xl lg:text-4xl font-light underline underline-offset-4">Courier Services</h2>
                    <div class="bg-primary px-2 tracking-wider">
                        <h3 class="text-xl lg:text-2xl font-light text-white text-shadow-xs text-shadow-gray-400">Express Delivery Services and International Shipping</h3>
                        <div class="text-sm text-secondary">Fast. Door-to-Door. Courier Delivered.</div>
                    </div>
                    <p class="text-sm tracking-wide">When you ship with Our Courier Services – you’re shipping with specialists in international shipping and delivery services! With our wide range of express parcel and package services, along with shipping and tracking solutions to fit your needs – DHL, UPS, FedEx and other reputated companies can deliver! </p>
                    <p class="text-sm tracking-wide">Our Courier partners connects people in over 220 countries and territories worldwide. Driven by the power of more than 380,000 employees, we deliver integrated services and tailored solutions for managing and transporting letters, goods and information. </p>
                    <div class="grid grid-cols-3 sm:grid-cols-2 md:grid-cols-3 gap-3">
                        <div class="text-center">
                            <img class="aspect-video object-cover rounded-t-xl" src="{{asset('images/fedex.png')}}" alt="Fedex">
                        </div>
                        <div class="text-center">
                            <img class="aspect-video object-cover rounded-t-xl" src="{{asset('images/ups.png')}}" alt="UPS">
                        </div>
                        <div class="text-center">
                            <img class="aspect-video object-cover rounded-t-xl" src="{{asset('images/dhl.png')}}" alt="DHL">
                        </div>
                    </div>
                    <div class="bg-primary leading-relaxed rounded-ss-xl rounded-ee-xl text-center px-4 text-white text-xl text-shadow-xs text-shadow-gray-400 tracking-wider">
                        Guaranteed Delivery to India with in 5-15 working days
                    </div>
                    <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-3 gap-3">
                        <div class="text-center shadow-xl overflow-hidden rounded-xl">
                            <img class="aspect-video object-cover rounded-t-xl" src="{{asset('images/air-f.jpg')}}" alt="Air Freight">
                            <div class="bg-primary rounded-b-xl text-white text-shadow-xs text-shadow-gray-400 tracking-wide">Air Freight</div>
                        </div>
                        <div class="text-center shadow-xl overflow-hidden rounded-xl">
                            <img class="aspect-video object-cover rounded-t-xl" src="{{asset('images/sea-f.jpg')}}" alt="Sea Freight">
                            <div class="bg-primary rounded-b-xl text-white text-shadow-xs text-shadow-gray-400 tracking-wide">Sea Freight</div>
                        </div>
                        <div class="text-center shadow-xl overflow-hidden rounded-xl">
                            <img class="aspect-video object-cover rounded-t-xl" src="{{asset('images/road-f.jpg')}}" alt="Road Freight">
                            <div class="bg-primary rounded-b-xl text-white text-shadow-xs text-shadow-gray-400 tracking-wide">Road Freight</div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 dimage lg:col-span-5">
                    <img src="{{asset('images/serv2.png')}}" alt="Courier Services">
                </div>
            </div>
        </div>
    </section>
    <section class="py-20 bg-primary">
        <div class="container max-w-7xl">
            <div class="flex flex-col items-center text-center mb-16 space-y-4">
                <h2 class="text-white font-bold tracking-widest uppercase text-sm">International Delivery</h2>
                <h3 class="text-4xl md:text-5xl font-black tracking-tight">Why choose City Courier for International delivery?</h3>
                <div class="w-20 h-1.5 bg-primary rounded-full"></div>
                <p>
                    Courier City is a well-established British brand with a global reach, and is a trusted name in
                    deliveries. Our International courier service connects regional Courier City UK service centres with
                    high performance partners across the map, enabling us to offer an exceptional International parcel
                    service that is fast, reliable and flexible. Our express International shipping ensures your items
                    get to their destination on time and as expected. You can stay up to date with its progress by using
                    our full tracking services and electronic proof of delivery so you can have peace of mind.
                </p>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
                @foreach($whys as $why)
                    <div class="hover:shadow text-white p-2 lg:p-4 rounded-xl overflow-hidden hover:-translate-y-1 transition-all">
                        <i class="iconify text-9xl" data-icon="{{$why['icon']}}"></i>
                        <h3 class="text-3xl">{{$why['title']}}</h3>
                        <p class="text-sm lg:text-base">{{$why['text']}}</p>
                    </div>
                @endforeach
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-4 mt-6">
                <div class="flex flex-col gap-3">
                    <h2 class="text-xl lg:text-4xl">International Economy delivery</h2>
                    <p>
                        Heavier, bulky items are perfect to send via our Economy service. This International Parcel delivery solution is a cost-effective, door-to-door service. Choose your delivery day to over 200 countries and book your order online with a City Courier account.
                    </p>
                    <a href="{{route('login')}}" class="px-4 py-1.5 rounded-lg text-xl shadow text-center max-w-75 border-2 border-white text-white hover:text-secondary text-shadow-xs text-shadow-gray-400">Create an Account</a>
                </div>
                <div>
                    <img src="{{asset('images/international1.png')}}" class="rounded-lg shadow" alt="International Delivery"/>
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-2 items-center gap-4 mt-6">
                <div>
                    <img src="{{asset('images/international2.png')}}" class="rounded-lg shadow" alt="International Delivery"/>
                </div>
                <div class="flex flex-col gap-3">
                    <h2 class="text-xl lg:text-4xl">International Express delivery</h2>
                    <p>
                        Express is the fastest way to send a parcel internationally. We can provide optional first flight out and delivery by 9:00, 10:00 and 12:00 the same or next working day to major cities worldwide – plus Next Day delivery to Europe and the US. The service also offers tailored customs clearance and document support, so we can support you every step of the way.
                    </p>
                    <a href="{{route('login')}}" class="px-4 py-1.5 rounded-lg text-xl shadow text-center max-w-75 border-2 border-white text-white hover:text-secondary text-shadow-xs text-shadow-gray-400">Create an Account</a>
                </div>
            </div>
        </div>
    </section>
    <section class="py-24 px-4 bg-linear-to-br from-orange-200 via-white/50 to-primary/50">
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
                               src="{{asset('images/guy1.png')}}"/>
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
