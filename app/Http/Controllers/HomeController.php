<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\CompanyCourier;
use App\Models\CompanyCourierService;
use App\Models\Country;
use App\Models\Courier;
use App\Models\CourierRate;
use App\Models\Shipment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('sadmin');
    }

    public function sadminDashboard(Request $request)
    {
        return response()->json([
            'success' => true,
            'users' => User::all()->count(),
        ]);
    }

    public function allUsers()
    {
        $users = User::get();
        return response()->json([
            'success' => true,
            'users' => $users,
        ]);
    }

    public function seedCountries(Request $request)
    {
        $countries = $request->countries;
        foreach ($countries as $c) {
            Country::updateOrCreate(
                ['iso_code' => $c['isoCode']],
                [
                    'name' => $c['name'],
                    'currency' => $c['currency'] ?? null,
                    'phone_code' => $c['phonecode'] ?? null,
                    'flag' => $c['flag'] ?? null,
                    'is_active' => false, // 👈 all disabled by default
                    'sort_order' => 0
                ]
            );
        }
        return response()->json([
            'success' => true,
            'countries' => Country::get(),
        ]);
    }

    public function getCountries(Request $request)
    {
        $countries = Country::orderBy('is_active','DESC')
            ->orderBy('sort_order','DESC')
            ->get();
        return response()->json([
            'success' => true,
            'countries' => $countries,
        ]);
    }

    public function updateCountry(Request $request)
    {
        $request->validate([
            'iso_code' => 'required|exists:countries,iso_code',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'required|boolean',
        ]);
        $country = Country::where('iso_code', $request->iso_code)->firstOrFail();

        $country->update([
            'sort_order' => $request->sort_order,
            'is_active' => $request->is_active,
        ]);

        return response()->json([
            'success' => true,
            'country' => $country,
        ]);
    }

    public function getActiveCountries()
    {
        $countries = Country::where('is_active', true)
            ->orderBy('sort_order', 'DESC')
            ->get();
        return response()->json([
            'success' => true,
            'countries' => $countries,
        ]);
    }

    public function adminCompanies(Request $request)
    {
        $companies = Company::orderBy('name')->get();;
        return response()->json([
            'success' => true,
            'companies' => $companies,
        ]);
    }

    public function addAdminUser(Request $request)
    {
        if (auth()->user()->role !== 'superadmin') {
            abort(403);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'company_id' => 'required|exists:companies,id',
            'status' => 'required|in:active,inactive,pending','rejected',
        ]);
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($request->password),
            'role' => "user",
            'status' => $validated['status'],
            'company_id' => $validated['company_id'],
        ]);

        return response()->json(['user' => $user]);
    }

    public function updateAdminUser(Request $request,$id)
    {
        if (auth()->user()->role !== 'superadmin') {
            abort(403);
        }

        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:150',
            'email' => "required|email|unique:users,email,{$user->id}",
            'password' => 'nullable|min:6',
            'company_id' => 'required|exists:companies,id',
            'status' => 'required|in:active,inactive,pending','rejected',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'company_id' => $request->company_id,
            'status' => $request->status,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }
        // Never allow role change here
        $user->update($data);
        return response()->json(['user' => $user]);
    }

    public function addAdminCompany(Request $request)
    {
        if (auth()->user()->role !== 'superadmin') {
            abort(403);
        }
        $vdata = $request->validate([
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:companies,email',
            'phone' => 'required|string|max:20',
        ]);

        $company = Company::create([
            'name' => $vdata['name'],
            'slug' => Str::slug(strtolower($vdata['name']),'-').'-'.time(),
            'email' => $vdata['email'],
            'phone' => $vdata['phone'],
            'is_active' => (bool) $request->is_active ?? false,
        ]);
        return response()->json([
            'success' => true,
            'company' => $company
        ]);
    }

    public function updateAdminCompany(Request $request)
    {
        if (auth()->user()->role !== 'superadmin') {
            abort(403);
        }
        $vdata = $request->validate([
            'id' => 'required|exists:companies,id',
            'name' => 'required|string|max:150',
            'email' => 'required|email|unique:companies,email,' . $request->id,
            'phone' => 'required|string|max:20',
        ]);
        $company = Company::findOrFail($request->id);
        $data = [
            'name' => $vdata['name'],
            'email' => $vdata['email'],
            'phone' => $vdata['phone'],
            'is_active' => (bool) $request->is_active,
        ];
        // update slug only if name changed
        if ($company->name !== $vdata['name']) {
            $data['slug'] = Str::slug(strtolower($vdata['name']), '-') . '-' . time();
        }

        $company->update($data);

        return response()->json([
            'success' => true,
            'company' => $company
        ]);
    }

    public function getAdminCouriers(Request $request)
    {
        $couriers = Courier::orderBy('sort_order','DESC')->get();
        return response()->json([
            'success' => true,
            'couriers' => $couriers,
        ]);
    }

    public function addAdminCourier(Request $request)
    {
        if (auth()->user()->role !== 'superadmin') {
            abort(403);
        }

        $cdata = $request->validate([
            'name' => 'required|string|max:150',
            'code' => 'required|string|max:50',
            'logo_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'sort_order' => 'required|numeric|min:0',
        ]);
        // handle logo upload (optional)
//        if ($request->hasFile('logo')) {
//            $path = $request->file('logo')->store('companies', 'public');
//            $data['logo'] = $path;
//        }

        $courier = Courier::create([
            'name' => $cdata['name'],
            'code' => $cdata['code'],
            'logo_url' => $cdata['logo'] ?? null,
            'sort_order' => $cdata['sort_order'],
            'is_active' => (bool) $request->is_active,
        ]);
        return response()->json([
            'success' => true,
            'courier' => $courier
        ]);
    }

    public function editAdminCourier(Request $request)
    {
        if (auth()->user()->role !== 'superadmin') {
            abort(403);
        }

        $cdata = $request->validate([
            'id' => 'required|exists:couriers,id',
            'name' => 'required|string|max:150',
            'code' => 'required|string|max:50',
            'logo_url' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg',
            'sort_order' => 'required|numeric|min:0',
        ]);
        // handle logo upload (optional)
//        if ($request->hasFile('logo')) {
//            $path = $request->file('logo')->store('companies', 'public');
//            $data['logo'] = $path;
//        }
        $courier = Courier::findOrFail($request->id);
        $data = [
            'name' => $cdata['name'],
            'code' => $cdata['code'],
            'logo_url' => $cdata['logo'] ?? null,
            'sort_order' => $cdata['sort_order'],
            'is_active' => (bool) $request->is_active,
        ];
        $courier->update($data);

        return response()->json([
            'success' => true,
            'courier' => $courier
        ]);
    }

    public function getCompanyCouriers($companyId)
    {
        $couriers = Courier::select('id','name','code','is_active')->get();

        $companyCouriers = CompanyCourier::with('services')
            ->where('company_id', $companyId)
            ->get()
            ->keyBy('courier_id'); // important

        $data = $couriers->map(function ($c) use ($companyCouriers) {
            $companyCourier = $companyCouriers->get($c->id);
            return [
                'courier_id' => $c->id,
                'company_courier_id' => $companyCourier?->id,
                'name' => $c->name,
                'code' => $c->code,
                'global_active' => $c->is_active,
                'assigned' => !!$companyCourier,
                'is_active' => $companyCourier?->is_active ?? false,
                'services' => $companyCourier?->services ?? [],
            ];
        });

        return response()->json(['couriers' => $data]);
    }

    public function upsertCompanyCourier(Request $request, $companyId)
    {
        $v = $request->validate([
            'courier_id' => 'required|exists:couriers,id',
            'is_active'  => 'required|boolean',
        ]);

        CompanyCourier::updateOrCreate(
            ['company_id' => $companyId, 'courier_id' => $v['courier_id']],
            ['is_active' => $v['is_active']]
        );

        return response()->json(['success' => true]);
    }

    public function upsertService(Request $request)
    {
        $v = $request->validate([
            'company_courier_id' => 'required|exists:company_couriers,id',
            'service_name' => 'required|string|max:100',
            'service_code' => 'nullable|string|max:50',
            'is_active' => 'required|boolean',
        ]);

        $service = CompanyCourierService::updateOrCreate(
            [
                'company_courier_id' => $v['company_courier_id'],
                'service_name' => $v['service_name'],
            ],
            [
                'service_code' => $v['service_code'],
                'is_active' => $v['is_active'],
            ]
        );

        return response()->json(['service' => $service]);
    }

    public function getRates($serviceId)
    {
        $rates = CourierRate::with('country:id,name')
            ->where('company_courier_service_id', $serviceId)
            ->get();

        return response()->json([
            'rates' => $rates
        ]);
    }

    public function storeRate(Request $request)
    {
        $v = $request->validate([
            'company_courier_service_id' => 'required|exists:company_courier_services,id',
            'country_id' => 'required|exists:countries,id',
            'parcel_type' => 'required|in:envelope,parcel,pallet,document',
            'weight_from' => 'required|numeric|min:0',
            'weight_to' => 'required|numeric|gt:weight_from',
            'rate' => 'required|numeric|min:0',
        ]);

        $exists = CourierRate::where('company_courier_service_id', $v['company_courier_service_id'])
            ->where('country_id', $v['country_id'])
            ->where('parcel_type', $v['parcel_type'])
            ->where(function ($q) use ($v) {
                $q->where('weight_from', '<', $v['weight_to'])
                    ->where('weight_to', '>', $v['weight_from']);
            })
            ->exists();

        if ($exists) {
            return response()->json([
                'error' => 'Overlapping weight range exists'
            ], 422);
        }

        $rate = CourierRate::create($v);

        return response()->json(['rate' => $rate]);
    }

    public function updateRate(Request $request, $id)
    {
        $rate = CourierRate::findOrFail($id);

        $v = $request->validate([
            'country_id' => 'required|exists:countries,id',
            'parcel_type' => 'required|in:envelope,parcel,pallet,document',
            'weight_from' => 'required|numeric|min:0',
            'weight_to' => 'required|numeric|gt:weight_from',
            'rate' => 'required|numeric|min:0',
        ]);

        // overlap check (exclude current)
        $exists = CourierRate::where('company_courier_service_id', $rate->company_courier_service_id)
            ->where('country_id', $v['country_id'])
            ->where('parcel_type', $v['parcel_type'])
            ->where('id', '!=', $id)
            ->where(function ($q) use ($v) {
                $q->where('weight_from', '<', $v['weight_to'])
                    ->where('weight_to', '>', $v['weight_from']);
            })
            ->exists();

        if ($exists) {
            return response()->json(['error' => 'Overlapping weight range exists'], 422);
        }

        $rate->update($v);

        return response()->json(['rate' => $rate]);
    }

    public function deleteRate($id)
    {
        CourierRate::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }

    public function getAdminShipments(Request $request)
    {
        if (auth()->user()->role !== 'superadmin') {
            abort(403);
        }

        $shipments = Shipment::with([
            'company:id,company_name',
            'user:id,name,email'
        ])
            ->latest()->get();

        return response()->json([
            'success' => true,
            'shipments' => $shipments
        ]);
    }
}
