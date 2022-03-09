# Php Framework Custom MVC

This backend application is a custom framework base on the MVC architecture. The Model represents all the manipulations with the data, it contains DAOs, services. The View is the part where we generate the render of a componant. The Controller interacts with the Model to fill the View and back a response to the Client.   

It is divided into 3 main fonctionnals blocs.
- Routing : This module receive the HTTP request from the Client side to find the corresponding route. By Using the URI and the method of the request, it invoke the corresponding controller and method defined by the developper.
- Controller : Its role is to call the specified DAO to interact with data and send back to the Client side a response. If a view is requested, it generate and fill the view to send it back.
- DAO : This interface has a purpose to manipulate our data source by implementing CRUD interface. When it is request to retrieve a data he returns it in an specified object form.  


Environment settings :
- php 8.0
- Debian Apache httpd
- Composer

The dev has to :
- type command 'compose init' to create an autoloader file and be able to define namespaces
- type command 'a2enmod rewrite' to enable mod_rewrite our .htaccess file. This file modify our requested URI format to not indicate index.php, indeed changing page in our website corresponding to change the content of the index.php.  
- configure the connexion with the database in the database.json.
- define all the routes needed in the routing.json to receive requests from the Client.

To use the framework, each folder has its specifications, the dev has to :
- create a view in the view folder
- create an entity in the model folder
- create and extends his concret DAO with the abstract DAO placed in the core folder
- create and extends his concret Controller with the abstract Controller placed in the core folder

(TEST in progress in Test branch)
