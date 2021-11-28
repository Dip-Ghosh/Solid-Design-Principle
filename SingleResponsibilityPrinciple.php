<?php
/***********************************
 * Single Responsibility Principle  states that a class should have a single
 * responsibility but not more than that. Simple a class should have one reason
 * to change.
 *********************************** 
 */

/*
 * Violation of single responsibility
 */

 class Document{
     
    private $title,$content;
     public function __construct(string $title,string $content)
     {
         $this->title = $title;
         $this->content = $content;
         
     } 

     public function getTitle(){

         return $this->title;
     }
     public function getContent(){

        return $this->content;
     }

     public function exportHTML(){
         
        //to do something
     }

     public function exportExcel(){
         
        //to do something
     }
 }

 // this document class is only responsible for providing title and content 
 // not to download or export any content.


 /**
  * Make the class single Responsible
  * 
  */


  interface ExportableDocumentInterface{
      
    public function export(Document $document);
  }

  class  HTMLExportDocument implements ExportableDocumentInterface{

    public function export(Document $document){
        
        // do the code here
    }
  }

  class  ExcelExportDocument implements ExportableDocumentInterface{

    public function export(Document $document){
        
        // do the code here
    }
  }

  class Document{
     
    private $title,$content;
     public function __construct(string $title,string $content)
     {
         $this->title = $title;
         $this->content = $content;
         
     } 

     public function getTitle(){

         return $this->title;
     }
     public function getContent(){

        return $this->content;
     }
 }
