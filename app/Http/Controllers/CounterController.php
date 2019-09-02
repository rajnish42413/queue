<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CounterRepository;
use App\Models\Counter;
use Illuminate\Support\Facades\DB;

class CounterController extends Controller
{
    protected $counters;

    public function __construct(CounterRepository $counters)
    {
        $this->counters = $counters;
    }

    public function index()
    {
        $this->authorize('access', Counter::class);

        return view('user.counters.index', [
            'counters' =>$this->counters->getAll(),
        ]);
    }

    public function create()
    {
        $this->authorize('access', Counter::class);
        $users = DB::table('users')
                ->where('role', 'S')
                ->get();

        return view('user.counters.create', ['users' => $users]);
    }

    public function store(Request $request)
    {
        $this->authorize('access', Counter::class);

        $this->validate($request, [
            'name' => 'required',
            'vendor' =>'required',
            'dep' => 'required',
        ]);

        Counter::create($request->all());

        flash()->success('Counter created');
        return redirect()->route('counters.index');
    }

    public function edit(Request $request, Counter $counter)
    {
        $this->authorize('access', Counter::class);

        $users = DB::table('users')
                ->where('role', 'S')
                ->get();

        return view('user.counters.edit', [
            'counter' => $counter,            
            'users' => $users,
        ]);
    }

    public function update(Request $request, Counter $counter)
    {
        $this->authorize('access', Counter::class);

        $this->validate($request, [
            'name' => 'required',
        ]);

        $counter->name = $request->name;
        $counter->save();

        flash()->success('Counter updated');
        return redirect()->route('counters.index');
    }

    public function destroy(Request $request, Counter $counter)
    {
        $this->authorize('access', Counter::class);

        $counter->delete();

        flash()->success('Counter deleted');
        return redirect()->route('counters.index');
    }


 
}
