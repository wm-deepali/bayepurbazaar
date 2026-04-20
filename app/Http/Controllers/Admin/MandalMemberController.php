<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MandalMember;
use App\Models\Mandal;
use App\Models\MandalCategory;
use App\Models\State;
use App\Models\City;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class MandalMemberController extends Controller
{
    // ✅ LIST
    public function index()
    {
        $members = MandalMember::with(['mandal', 'category', 'state', 'city'])->latest()->get();

        return view('admin.mandal-members.index', compact('members'));
    }

    // ✅ CREATE
    public function create()
    {
        $categories = MandalCategory::where('status', 1)->get();
        $mandals = Mandal::where('status', 1)->get();
        $states = State::where('status', 1)->get();

        return view('admin.mandal-members.create', compact('categories', 'mandals', 'states'));
    }

    // ✅ STORE
    public function store(Request $request)
    {
        $request->validate([
            'mandal_category_id' => 'required',
            'mandal_id' => 'required',
            'name' => 'required',
            'mobile' => 'required'
        ]);

        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('mandal-members', 'public');
        }

        MandalMember::create([
            'mandal_id' => $request->mandal_id,
            'mandal_category_id' => $request->mandal_category_id,

            'photo' => $photo,
            'name' => $request->name,
            'designation' => $request->designation,
            'location' => $request->location,
            'since' => $request->since,

            'mobile' => $request->mobile,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,

            // ✅ NEW
            'father_name' => $request->father_name,
            'gender' => $request->gender,
            'code' => $request->code,
            'address' => $request->address,
            'experience' => $request->experience,
            'suggestion' => $request->suggestion,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'pin_code' => $request->pin_code,

            'relation' => $request->relation,
            'contribution' => isset($request->contribution) ? implode(',', $request->contribution) : null,
            'message' => $request->message,

            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->route('admin.mandal-members.index')
            ->with('success', 'Member Added Successfully');
    }

    // ✅ EDIT
    public function edit($id)
    {
        $member = MandalMember::findOrFail($id);

        $categories = MandalCategory::where('status', 1)->get();
        $mandals = Mandal::where('status', 1)->get();
        $states = State::where('status', 1)->get();
        $cities = City::where('state_id', $member->state_id)->get();

        return view('admin.mandal-members.edit', compact(
            'member',
            'categories',
            'mandals',
            'states',
            'cities'
        ));
    }

    // ✅ UPDATE
    public function update(Request $request, $id)
    {
        $member = MandalMember::findOrFail($id);

        $request->validate([
            'mandal_category_id' => 'required',
            'mandal_id' => 'required',
            'name' => 'required',
            'mobile' => 'required'
        ]);

        $photo = $member->photo;

        if ($request->hasFile('photo')) {

            if ($member->photo && Storage::disk('public')->exists($member->photo)) {
                Storage::disk('public')->delete($member->photo);
            }

            $photo = $request->file('photo')->store('mandal-members', 'public');
        }

        $member->update([
            'mandal_id' => $request->mandal_id,
            'mandal_category_id' => $request->mandal_category_id,

            'photo' => $photo,
            'name' => $request->name,
            'designation' => $request->designation,
            'location' => $request->location,
            'since' => $request->since,

            'mobile' => $request->mobile,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,

            // ✅ NEW
            'father_name' => $request->father_name,
            'gender' => $request->gender,
            'code' => $request->code,
            'address' => $request->address,
            'experience' => $request->experience,
            'suggestion' => $request->suggestion,
            'state_id' => $request->state_id,
            'city_id' => $request->city_id,
            'pin_code' => $request->pin_code,

            'relation' => $request->relation,
            'contribution' => isset($request->contribution) ? implode(',', $request->contribution) : null,
            'message' => $request->message,

            'status' => $request->status ? 1 : 0
        ]);

        return redirect()->route('admin.mandal-members.index')
            ->with('success', 'Member Updated Successfully');
    }

    // ✅ DELETE
    public function destroy($id)
    {
        MandalMember::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Member Deleted Successfully'
        ]);
    }

    // ✅ AJAX: CATEGORY → MANDALS
    public function getMandals($category_id)
    {
        return Mandal::where('mandal_category_id', $category_id)
            ->where('status', 1)
            ->get();
    }

    // ✅ AJAX: STATE → CITIES
    public function getCities($state_id)
    {
        return City::where('state_id', $state_id)->get();
    }


    public function sample()
    {
        $headers = [
            "Content-type" => "text/csv",
            "Content-Disposition" => "attachment; filename=mandal_members_full_sample.csv",
        ];

        $columns = [
            'name',
            'father_name',
            'gender',
            'mobile',
            'whatsapp',
            'mandal_category_id',
            'mandal_id',
            'designation',
            'location',
            'since',
            'code',
            'address',
            'experience',
            'suggestion',
            'state_id',
            'city_id',
            'pin_code',
            'email',
            'relation',
            'contribution',
            'message'
        ];

        $callback = function () use ($columns) {
            $file = fopen('php://output', 'w');

            fputcsv($file, $columns);

            // sample row
            fputcsv($file, [
                'Ravi Kumar',
                'Shyam Kumar',
                'Male',
                '9999999999',
                '9999999999',
                '1',
                '2',
                'President',
                'Delhi',
                '2020',
                'A123',
                'Some address',
                '5 years',
                'Good work',
                '1',
                '5',
                '132001',
                'test@mail.com',
                'native',
                'mandal,volunteer',
                'Hello message'
            ]);

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }




    public function import(Request $request)
    {
        // ✅ FILE VALIDATION (fixed)
        $request->validate([
            'file' => 'required|file|mimes:csv,txt,xlsx'
        ]);

        $file = $request->file('file');

        $rows = Excel::toArray([], $file);

        if (empty($rows[0]) || count($rows[0]) <= 1) {
            return back()->with('error', 'File is empty or only header present');
        }

        $errors = [];
        $successCount = 0;

        foreach ($rows[0] as $key => $row) {

            if ($key == 0)
                continue; // skip header

            // skip fully empty rows
            if (empty(array_filter($row)))
                continue;

            try {

                // ✅ VALIDATION PER ROW
                if (empty($row[0])) {
                    throw new \Exception("Name is required");
                }

                if (empty($row[3])) {
                    throw new \Exception("Mobile is required");
                }

                if (empty($row[6])) {
                    throw new \Exception("Mandal ID is required");
                }

                // optional: duplicate mobile check
                if (MandalMember::where('mobile', $row[3])->exists()) {
                    throw new \Exception("Mobile already exists: " . $row[3]);
                }

                // optional: FK validation
                if (!empty($row[6]) && !\App\Models\Mandal::where('id', $row[6])->exists()) {
                    throw new \Exception("Invalid Mandal ID: " . $row[6]);
                }

                // ✅ CREATE DATA
                MandalMember::create([

                    'name' => $row[0] ?? null,
                    'father_name' => $row[1] ?? null,
                    'gender' => $row[2] ?? null,

                    'mobile' => $row[3] ?? null,
                    'whatsapp' => $row[4] ?? null,

                    'mandal_category_id' => $row[5] ?? null,
                    'mandal_id' => $row[6] ?? null,

                    'designation' => $row[7] ?? null,
                    'location' => $row[8] ?? null,
                    'since' => $row[9] ?? null,

                    'code' => $row[10] ?? null,
                    'address' => $row[11] ?? null,
                    'experience' => $row[12] ?? null,
                    'suggestion' => $row[13] ?? null,

                    'state_id' => $row[14] ?? null,
                    'city_id' => $row[15] ?? null,
                    'pin_code' => $row[16] ?? null,

                    'email' => $row[17] ?? null,
                    'relation' => $row[18] ?? null,

                    'contribution' => $row[19] ?? null,
                    'message' => $row[20] ?? null,

                    'status' => 1
                ]);

                $successCount++;

            } catch (\Exception $e) {

                $errors[] = "Row " . ($key + 1) . ": " . $e->getMessage();
            }
        }

        // ❌ If any errors
        if (!empty($errors)) {
            return back()->with('error', implode('<br>', $errors));
        }

        return back()->with('success', $successCount . ' Members Imported Successfully');
    }
}