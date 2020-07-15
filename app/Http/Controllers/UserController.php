<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function book(Request $request)
	{
		$userList = User::all();
		return View('welcome')->with('book', $userList);
	}

	public function newPage(Request $request)
    {
        return View('new');
    }

    public function newContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sur_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return View('new')->withErrors($validator);
        }

        if ($this->user->create($request->all()))
        {
            return redirect('/');
        }
    }

    public function editPage(Request $request, $id)
    {
        return View('edit')->with('user', $this->user->find($id));
    }

    public function editContact(Request $request, $id)
    {
        $this->user = User::find($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'sur_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return View('edit')->withErrors($validator)->with('user', $this->user);
        }

        $this->user->name = $request->post('name');
        $this->user->sur_name = $request->post('sur_name');
        $this->user->last_name = $request->post('last_name');
        $this->user->phone = $request->post('phone');

        $this->user->save();

        return View('edit')->with('user', $this->user);
    }

}
