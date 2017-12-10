#Author:
    liltongungob03@gmail.com
    
#Database
To set up the database, the database configuration file is in
    
    server/Database/Config.php
    
#SQL File
    The Sql File is code_challenge.sql

#Index.php
The re route to the main page is inside index.php



#Setting User names
    Before you can post a comment, you must set your user name first
    by entering it and in the Posting as:[  ] input box. After submitting
    your new username a unique value will be returned, this unique value 
    serves as your usernames identifier, you can use this to set your username
    to the username you just registered. 
    
    Example:
    insert new username 'Doe'
    example returned unique value for 'Doe' = '81c'
    
    now to set and retrieve your username to 'Doe' 
    
    enter '81c' to the Posting as:[] inpyt box with '{' '}'
    wrapped around the string, like so:
    
    {81c} and enter. After that your username will be set to 'Doe' 
    when posting comments or replies.
    
#Programming Languages Used:        
    PHP for the backend
    Javascript for the Front End.

#Object Oriented Design Pattern Used
       Factory Method    

    
#Folders    
src/html/
        
        All front end files
        
src/html/module/
        
       Front End Code
       
               
        
        
src/server/
    
        All backend Code
        
        
#Module Structure:
            
   #Controller
    
        All End points that can be levereage in the front end, through
        Restful fashion
   
   #Factory
        Factory classess for all the Class Manager
                 
                
   #Manager
        All the manager classes

   #Module
   
        Contains all the modules, modules connect the Controllers with the Manger
        