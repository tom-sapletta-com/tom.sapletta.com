Info about project
---

This is example how to easy is possible creating PHP framework with make services with remote data.

- domains
  - http://tom.sapletta.com - with files from this project
  - http://sapletta.com/Private/cv.yaml - data in yaml format for read only with  .htaccess

- libraries: 
  - http://dubphp.com
  - http://github.com/mustangostang/spyc
   
  
Tree folders:
 ```
  - /Community - external library (read only, Writing by System )
  - /Core - library for start project (read only, Writing by Producer )
  - /Private - private data for project and external services (read only for guest, Writing by System, Admin, User )
  - /Public - all data with are share for internet (read only)
 ```  
  
Roles:
  - Producer - made a system - not used in project
    - System - executing system, Admin, User, Guest acces controll for content (by Admin config)
      - Admin - make a config data file date
        - User - access for more Private data
          - Guest - access only for Public and share Private/user/guest


Interesting solutions:
  - Decode private data by JS function
    - for all data which are private
    - data which the Internet search engine should be saving as original string, but as encoding data
  - opportunity to present data from an external server
  - the file structure for the data set (Private/Public, Core/Community)
