<?php 

/****************************************************************
 * Derived classes must be substitutable for their base classes.*
 * Simply says that codes that work with parent classes or      *
 * interfaces should not break when those classes are replaced  *
 * with the child classes or interface- implementing classes.   *
 ****************************************************************
 */

/*
 * Violation of LSP
 */

class Bird{
    
    public function fly(){
        
        //to do something
    }

    public function eat(){
        
        //to do something
    }
}

class Eagle extends Bird{
    
    public function fly(){
            
        //to do something
    }

    public function eat(){
        
        //to do something
    }
}

class ostrich extends Bird{
    
    public function fly(){
            
        throw new Exception("Ostrich can't fly");
    }

    public function eat(){
        
        //to do something
    }
}

// the above code violates the LSP. Problem arises when we try to extents the ostrich with bird
// this is throw an exception.

//refactoring the above code

interface Flyable {
    
    public function fly();
}
interface Eatable {
    
    public function eat();
}

class Eagle implements Flyable,Eatable{
    
    public function fly(){
            
        //to do something
    }
    public function eat(){
        
        //to do something
    }
}

class Ostrich implements Eatable{
    
    public function eat(){
        
        //to do something
    }
}