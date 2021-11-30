<?php 
/*************************************************************
 *Higher level modules should not depend on lower level ones.*
 *Both should depend on abstraction.                         *
 *************************************************************
 */

/*
 * Violation of open closed
 */
public function index(){
     $user = new User();
     $user = $user->where('created_at',Carbon::now())->get();
     return response()->json([
        "user" => $user
     ]);
}

//The above code violates the single responsibility principle.
//cannot reuse code
// difficult to test
// difficult to extend

//Refactoring the above code

interface UserRepositoryInterface{

    public function getAll($date);
}

class UserRepository implements UserRepositoryInterface{

    public function getAll($date){
        
        return  User::where('created_at',$date)->get();
    }
}

//In controller
 public function index(UserRepositoryInterface $userRepository){

        $user = $userRepository->getAll(Carbon::now());

        return response()->json([

            "user" => $user
        ]);
    }