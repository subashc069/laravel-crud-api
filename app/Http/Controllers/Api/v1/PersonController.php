<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Resources\PersonResource;
use App\Http\Resources\PersonResourceCollection;
use App\Person;
use App\Http\Controllers\Controller;

class PersonController extends Controller
{   /**
    *@param Person $person
    *@return PersonResource
   */
    public function show(Person $person): PersonResource
    {
        return new PersonResource($person);
    }
    /**
     * @return PersonResourceCollection
     */
    public function index(): PersonResourceCollection
    {
        return new PersonResourceCollection(Person::all());
    }

    public function store(Request $request)
    {   
        $request->validate(
            [
                'first_name'    => 'required',
                'last_name'     => 'required',
                'phone'         => 'required',
                'email'         => 'required',
                'city'          => 'required',
            ]
        );
        $person = Person::create($request->all());
        return new PersonResource($person);
    }

    public function update(Person $person, Request $request)
    {   
        // $request->validate(
        //     [
        //         'first_name'    => 'required',
        //         'last_name'     => 'required',
        //         'phone'         => 'required',
        //         'email'         => 'required',
        //         'city'          => 'required',
        //     ]
        // );
        $person->update($request->all());
        return new PersonResource($person);
    }

    public function destroy(Person $person)
    {
        $person->delete();
        return response()->json();
    }
    
}
