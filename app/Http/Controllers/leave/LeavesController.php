<?php

namespace App\Http\Controllers\leave;

use Illuminate\Http\Request;
use App\Models\Leave\Leave;
use App\Http\Controllers\Controller;

class LeavesController extends Controller
{
      public function __construct()
    {
        $this->middleware("auth");
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function index()
    {
        $this->authorize("view", Leave::class);

        //$leaves = Leave::latest()->paginate();
        //$groups = GroupMember::all()->load('Groups');

             $leaves= Leave::latest()
            ->when(request("q"), function($query){
                return $query
                    ->where("start_date", "LIKE", "%". request("q") ."%")
                    ->orWhere("end_date", "LIKE", "%". request("q") ."%");
            })
            ->paginate();

       return view("leaves.index", compact("leaves"));
    }

    /**
     * @return View
     * @throws AuthorizationException
     */
    public function create()
    {
        $this->authorize("create", Leave::class);

        return view("leaves.create");
    }

    /**
     * @param LeaveCreateRequest $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        $this->authorize("create", Leave::class);
          $this->validate($request, [
            "remark" => "required",
            "employee" => "required",
            "leavetype" => "required",
            "start_date" => "required",
            "end_date" => "required",
            
        ]);


        $leave = Leave::create([
            "start_date" => request("start_date"),
            "end_date" => request("end_date"),
            "employee_id" => request("employee"),
            "remark" => request("remark"),
            "leavetype_id" => request("leavetype"),
            "creator_id" => auth()->id(),
        ]);

               
        return redirect()->route("leaves.index")->with('success', "Successfully requested a Leave");
    }

    /**
     * @param Leave $leave
     * @return RedirectResponse
     * @throws AuthorizationException
     */

    public function edit(Leave $leave)
    {
        $this->authorize("edit", Leave::class);

        return view("leaves.edit", [
            "states" => State::getCountryName("Tanzania"),
            "Leave" =>$leave,
            "groups" =>Group::All(),
            "groupmember"=>GroupMember::All(),
           
        ]);
    }
/* public function update(Leave $leave)
    {
        $this->authorize("edit", $leave);

        $leave->update([
            "start_date" => request("start_date", $leave->start_date),
            "end_date" => request("end_date", $leave->end_date),
            "employee" => request("employee", $leave->employee),
            "remark" => request("remark", $leave->remark),
            "gender" => request("gender", $leave->gender),
        ]);

        return redirect()->back();
    }

*/

    public function update(Request $request,Leave $leave)
    {
        $this->authorize("update", $leave);
        $this->validate($request, [
            "start_date" => "required",
            "end_date" => "required",
            "employee" => "required",
            "country" => "required",
            "gender" => ["required", Rule::in(["male","female"])],
        ]);

        $leave->update([
            "start_date" => request("start_date"),
            "end_date" => request("end_date"),
            "remark" => request("remark"),
            "employee" => request("employee"),
            "gender" => request("gender"),
        ]);

        if ($leave->address()->exists()){
            $leave->address()->update([
                "street" => request("street", optional($leave->address)->street),
                "address" => request("address", optional($leave->address)->address),
                "state" => request("state", optional($leave->address)->state),
                "country" => request("country", optional($leave->address)->country),
                "postal_code" => request("postal_code", optional($leave->address)->postal_code),
            ]);
        } else {
            $leave->address()->create([
                "street" => request("street"),
                "address" => request("address", ""),
                "state" => request("state"),
                "country" => request("country"),
                "postal_code" => request("postal_code"),
            ]);
        }

        $leave->groups()->sync($request->group_id);
        return redirect()->route("leaves.index");
        //return redirect()->back();
    }
    /**
     * @param Leave $leave
     * @return View
     * @throws AuthorizationException
     */
    public function show(Leave $leave)
    {
        $this->authorize("view", $leave);

        return view("leaves.show", compact("Leave"));
    }

    /**
     * @param Leave $leave
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();

        return redirect()->route("leaves.index");
    }
    
  
}
