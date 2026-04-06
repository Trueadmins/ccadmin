@extends('layouts.app')

@section('content')
    @php
        $glances = [
             [
                "title" => "Tracked delivery services are at our core.",
                "icon" => "mdi-truck-fast",
                "text" => "We pride ourselves on our service levels and the ability to meet tight delivery deadlines across the UK."
             ],
            [
                "title" => "International reach with a local feel.",
                "icon" => "mdi-earth",
                "text" => "Our 26 strategically partners placed service centres are run by local delivery experts, ensuring we successfully deliver for our customers."
            ],
            [
                "title" => "Award-winning customer service.",
                "icon" => "mdi-shield-check",
                "text" => "Our customer care teams are here to support you every step of the way, whenever you need us."
            ],
            [
                "title" => "Building a partnership on trust.",
                "icon" => "mdi-handshake",
                "text" => "We’re here as an extension of your business to help you grow and succeed. You can trust us to deliver, it’s what we do best."
            ],
            [
                "title" => "Here for the communities we serve.",
                "icon" => "mdi-hand-heart-outline",
                "text" => "From our sustainable initiatives to local charity support, to recruiting and developing people, we’re here for you."
            ],
            [
                "title" => "Investing in innovation technology.",
                "icon" => "mdi-code",
                "text" => "Wherever technology can better your experience, improve efficiency or minimise our environmental impact, we invest in it."
            ]
    ];
    $avals = [
             [
                "title" => "Honesty.",
                "icon" => "mdi-truck-fast",
                "text" => "We value facts and measure our performance with simple visible metrics. Integrity and transparency are at the core of everything that we do."
             ],
            [
                "title" => "Respect.",
                "icon" => "mdi-earth",
                "text" => "We create a welcoming, collaborative and inclusive culture. We value debate and encourage feedback from everyone."
            ],
            [
                "title" => "Accountability.",
                "icon" => "mdi-shield-check",
                "text" => "We take personal accountability to deliver what matters every day. We have clear ownership of our goals, and we make the right things happen."
            ],
            [
                "title" => "Caring.",
                "icon" => "mdi-handshake",
                "text" => "We take the time to listen and understand what’s important. We are compassionate and show empathy. We commit to doing business safely and sustainably."
            ],
            [
                "title" => "Passion.",
                "icon" => "mdi-hand-heart-outline",
                "text" => "We celebrate our achievements and recognise our people through our values, believing in ourselves and our teams. We never stop progressing and shaping the delivery service of tomorrow."
            ],
            [
                "title" => "Flexibility.",
                "icon" => "mdi-code",
                "text" => "We embrace change, challenging ourselves to move quickly, be adaptable and take smart risks. We constantly challenge the status quo to ensure that the business remains flexible and agile."
            ]
    ]
    @endphp
    <section class="sheader bg-primary text-white text-shadow-xs text-shadow-gray-400 py-10">
        <div class="container max-w-7xl flex flex-col gap-2 items-center text-center">
            <h1 class="text-3xl lg:text-5xl">About Courier City Ltd.</h1>
            <h2 class="text-2xl lg:text-4xl mb-4">Delivering what matters for our community.</h2>
            <p class="text-xl">Supporting customers, colleagues and suppliers to grow and be successful.</p>
        </div>
    </section>
    <section class="py-12 bg-linear-to-tr from-orange-200 via-white/50 to-primary/50">
        <div class="container max-w-7xl">
            <h2>Courier City at a glance.</h2>
            <p>
                At Courier City, we’re clear on who we are and why we exist. Our purpose is simple: “Delivering what matters.” We are passionate about delivering what matters for our customers, colleagues and suppliers. Whether we are delivering life-saving equipment or a parcel on behalf of a local business, we deliver what matters.
            </p>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mt-6">
                @foreach($glances as $glance)
                    <div class="shadow-xl p-2 lg:p-4 bg-white rounded-xl overflow-hidden hover:-translate-y-1 transition-all border border-gray-200">
                        <i class="iconify text-4xl" data-icon="{{$glance['icon']}}"></i>
                        <h3 class="text-primary">{{$glance['title']}}</h3>
                        <p>{{$glance['text']}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="py-12 bg-linear-to-br from-orange-200 via-white/50 to-primary/50">
        <div class="container max-w-7xl">
            <h2>Our Values.</h2>
            <p>
                How we'll do it.
            </p>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 mt-6">
                @foreach($avals as $aval)
                    <div class="shadow-xl p-2 lg:p-4 bg-white rounded-xl overflow-hidden hover:-translate-y-1 transition-all border border-orange-200">
                        <i class="iconify text-6xl px-1 bg-primary rounded-xl text-white" data-icon="{{$aval['icon']}}"></i>
                        <h3 class="text-secondary">{{$aval['title']}}</h3>
                        <p class="text-sm">{{$aval['text']}}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
