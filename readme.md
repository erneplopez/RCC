**application.properties file:**
The application.properties file inside the resources file can be used to
specify the database connection string. 
It is also used to select the DMS
to be used on the persistence layer, being mysql the only provided implementation.
Other implementations can be added by satisfying the GuestRepository Interface.
Other implementations will need to be registered on the GuestRepositoryFactory class.
