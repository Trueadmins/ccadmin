@extends('layouts.app')

@section('content')
    <section class="sheader bg-primary text-white text-shadow-xs text-shadow-gray-400 py-10">
        <div class="container max-w-7xl flex flex-col gap-2 items-center text-center">
            <h1 class="text-3xl lg:text-5xl">Track Your Shipment.</h1>
            <h2 class="text-2xl lg:text-4xl mb-4">Delivering what matters for our community.</h2>
            <p class="text-xl">Supporting customers, colleagues and suppliers to grow and be successful.</p>
        </div>
    </section>
    <section class="tracksipment py-12">
        <div class="container max-w-4xl">
            <div class="bg-primary/20 p-2 lg:p-4 rounded-lg flex flex-col gap-4">
                <h2>Track Shipment</h2>
                <h3>Enter your tracking number to get real-time updates</h3>
                <div class="flex items-center gap-3">
                    <div class="w-full">
                        <label for="Tracking No" class="block mb-1 text-sm font-medium">Tracking No</label>
                        <input required name="tracking_number" type="text" class="bg-white w-full rounded-lg border border-gray-300 px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"/>
                    </div>
                </div>
                <div class="flex flex-col lg:flex-row justify-between">
                    <button type="submit"
                            class="bg-slate-700 px-4 hover:bg-slate-800 text-white py-2 rounded-lg font-semibold transition">
                        Track Shipment
                    </button>
                    <div>
                        Need help tracking your delivery? <a href="{{route('contactPage')}}" class="text-blue-700">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
