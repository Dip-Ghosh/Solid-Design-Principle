<?php 
/************************************************************
 * Open-Closed principle states that Objects or entities    *
 * should be open for extension but closed for modification *
 ************************************************************
 */

/*
 * Violation of open closed
 */
class Developer {

    public function writeCode(){

        // to do something
    }
}

class Tester {

    public function TestCode(){

        // to do something
    }
}

class ProjectManagement{

    public function process($member){

        if ($member instanceof Developer) {

            $member->writeCode();

        } elseif ($member instanceof Tester) {

            $member->TestCode();
        };

        throw new Exception('Invalid member');
    }
}


// refactor the code using open closed principle
// for that we need to create a interface that can be implemented by both and new other classes too

interface Workable{
    
    public function work();
}

class Developer implements Workable{

    public function work(){
        
        // to do something
    }
}

class Tester implements Workable{

    public function work(){
        
        // to do something
    }
}

class ProjectManagement{

    public function process(Workable $workable){

     return $workable->work();
    }
}