A simple application build on symfony 3.3.0 that manages phone contacts users.

<h1>1.Installation :</h1>
  You can this code via git clone or direct download.

<h1>2.Define parameters :</h1>
  By altering the app/config/parameters.yml

<h1>3.Downloding Vendors :</h1>
  Using composer.
  
<h1>4.Create database :</h1> 
  If your database does not exist yet :
    - php bin/console doctrine:database:create
  Create Tables :
    - php bin/console doctrine:schema:update --dump-sql
    - php bin/console doctrine:schema:update --force
    
<h1>5.Install assets :</h1>
  php bin/console assets:install web
  
<strong>Enjoy.</strong>
  

    
  
  
