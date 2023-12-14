<?php

namespace App\Http\Controllers\Admin\Agent;

use App\Models\User;
use App\Models\Admin\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    public function index()
    {
       // $users = User::where('agent_id', Auth::user()->id)->get();
        $userId = auth()->id(); // ID of the master user
        $user = User::findOrFail($userId);
        // Retrieve all agents created by this master
        $users = $user->createdAgents;
        //dd($users);
        return view('admin.agent.user_list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.agent.user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
    'name' => 'required|min:3|unique:users,name',
    'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'unique:users,phone'],
    'password' => 'required|min:6|confirmed',
]);
        $this->authorize('createUser', User::class);

        $user = User::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'password'=> Hash::make( $request->password ),
            //'role' => "Agent",
            'agent_id' => Auth::user()->id,
        ]);
        //$user->roles()->sync('3');
        $agentRole = Role::where('title', 'User')->first();
        $user->roles()->sync($agentRole->id);
        return redirect(route('admin.agent-user-list'))->with('success','User has been created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user_detail = User::find($id);
        return view('admin.agent.user_show', compact('user_detail'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('admin.agent.user_edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
    'name' => 'required|min:3|unique:users,name,'.$id,
    'phone' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'unique:users,phone,'.$id],
    'password' => 'nullable|min:6|confirmed',
]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->phone = $request->phone;

        if($request->password){
            $user->password = Hash::make( $request->password );
        }
        $user->agent_id = Auth::user()->id;
        //$user->roles()->sync('3');
        $agentRole = Role::where('title', 'User')->first();
        $user->roles()->sync($agentRole->id);
        $user->save();
        return redirect(route('admin.agent-user-list'))->with('success','User has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect(route('admin.agent-user-list'))->with('success','User has been deleted successfully.');
    }
}