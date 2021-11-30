<?php 
/***************************************************************
 *A client should never be forced to implement an interface    *
 *that does not use or a client should not forced to depend on *
 *methods that they do not use.                                *
 ***************************************************************
 */

/*
 * Violation of open closed
 */
interface BaseInterface
{
    public function getAll();
    public function getById($id);
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}

// There is nothing wrong with this baseInterface implementation.
// Lets assume that we have two model name user and customers
// The user model will implement the baseInterface.There is nothing wrong
// with this implementation.But the problem is customers model will not.
// so we have to implement the baseInterface in the customers model which is not good.
// so we can do two separate interface one for readOnly ,another for writeOnly. 

//Refactoring the code

interface ReadOnlyInterface
{
    public function getAll();
    public function getById($id);
}

interface WriteOnlyInterface
{
    public function create($data);
    public function update($id, $data);
    public function delete($id);
}

// now the problem is solved. user and customer can implements the interface as required and
// none is forced to implement the interface that does not use
