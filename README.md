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

  - /Community - external library (read only, Writing by System )
  - /Core - library for start project (read only, Writing by Producer )
  - /Private - private data for project and external services (.htaccess)
  - /Public - all data with are share for internet
  
  
Roles:
  - Producer - made a system - not used in project
    - System - executing system, Admin, User, Guest acces controll for content (by Admin config)
      - Admin - make a config data file date
        - User - access for more Private data
          - Guest - access only for Public and share Private/user/guest
