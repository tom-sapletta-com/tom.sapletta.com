Info about project
---

This is example how to easy is possible creating PHP framework with make services with remote data.

The principle of this project are less exceptions, the more rules.

The main elements:

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




Wersja lokalna - podstawowa projektu
---
 ```
  +----------------+
  |                |
  |  Community     |
  |                |
  |  Core          |
  |                |
  |  Local         |
  |                |
  |  Private       |
  |                |
  |  Public        |
  |                |
  +----------------+
 ```

Wersja rozproszona z delegowaniem danych i kodu z zewnętrznych repozytoriów na użytkownika, serwer, chmurę

  +--------------+     +----------------+
  |              |     |                |
  |  Community   +----&gt;|   Core         |
  |              |     |                |
  +--------------+     |   Local        |
                       |                |
                       |   Private      |
                       |                |
                       |   Public       |
                       |                |
                       +----------------+


Wersja z delegowaniem rdzenia i danych/kodu zewnętrznego na użytkownika, serwer, chmurę

                      ^
 +--------------+     |
 |              |     |
 |  Community   +----&gt;|    +----------------+
 |              |     |    | domain1.com    |
 +--------------+     +---&gt;|----------------|
                      |    |                |
      +---------+     |    |   Local        |
      |         |     |    |                |
      |  Core   +----&gt;|    |   Private      |
      |         |     |    |                |
      +---------+     |    |   Public       |
                      |    |                |
                      |    +----------------+
                      |
                      |    +----------------+
                      |    | domain2.com    |
                      +---&gt;|----------------|
                      |    |                |
                      |    |   Local        |
                      |    |                |
                      |    |   Private      |
                      |    |                |
                      |    |   Public       |
                      |    |                |
                      |    +----------------+
                      |
                      v



Wersja z delegowaniem rdzenia i danych/kodu zewnętrznego na użytkownika, serwer, chmurę oraz wspólnych danych publicznych, które w przypadku projektu opartego np. o system multiblogowy, wielojęzyczny umożliwia umieszczanie tych samych danych w różnych językach w jednym folderze, bez potrzeby duplikowania tych danych.
                      ^
 +--------------+     |
 |              |     |
 |  Community   +----&gt;|    +----------------+
 |              |     |    | domain1.com    |
 +--------------+     +---&gt;|----------------|
                      |    |                |
   +------------+     |    |   Local        |
   |            |     |    |                |
   |   Core     +----&gt;|    |   Private      |
   |            |     |    |                |
   +------------+     |    +----------------+
                      |
     +----------+     |
     |          |     |
     |  Public  +----&gt;|    +----------------+
     |          |     |    | domain2.com    |
     +----------+     +---&gt;|----------------|
                      |    |                |
                      |    |   Local        |
                      |    |                |
                      |    |   Private      |
                      |    |                |
                      |    +----------------+
                      |
                      v



Wersja rozszerzona o overriding - czyli rozwiązanie modułowe, nadpisujące tylko część danych związanych z innym językiem - np. obrazy

                      ^
 +--------------+     |
 |              |     |
 |  Community   +----&gt;|    +----------------+
 |              |     |    | domain1.com    |
 +--------------+     +---&gt;|----------------|
                      |    |                |
   +------------+     |    |   Local        |
   |            |     |    |                |
   |   Core     +----&gt;|    |   Private      |
   |            |     |    |                |
   +------------+     |    |   Public       |
                      |    |                |
     +----------+     |    +----------------+
     |          |     |
     |  Public  +----&gt;|    +----------------+
     |          |     |    | domain2.com    |
     +----------+     +---&gt;|----------------|
                      |    |                |
                      |    |   Local        |
                      |    |                |
                      |    |   Private      |
                      |    |                |
                      |    |   Public       |
                      |    |                |
                      |    +----------------+
                      v



More info about patterns:
http://sapletta.com/pl/prywatne-dane-odseparowane-od-projektu/
