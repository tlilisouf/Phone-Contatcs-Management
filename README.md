A simple application built on symfony 3.3.0 that manages phone contacts users.

<h1>1.Installation :</h1>
  You can this code via git clone or direct download.

<h1>2.Define parameters :</h1>
  By altering the app/config/parameters.yml

<h1>3.Downloding Vendors :</h1>
  Using composer.
  
<h1>4.Create database :</h1> 
  If your database does not exist yet :<br>
    - php bin/console doctrine:database:create<br>
  Create Tables :<br>
    - php bin/console doctrine:schema:update --dump-sql<br>
    - php bin/console doctrine:schema:update --force
    
<h1>5.Install assets :</h1>
  php bin/console assets:install web
  
<strong>Login</strong>
<img src="https://github.com/tlilisouf/Phone-Contatcs-Management/blob/ScreenShots/ScreenShots/login.png">
<strong>Register</strong>
<img src="https://github.com/tlilisouf/Phone-Contatcs-Management/blob/ScreenShots/ScreenShots/register%20.png">
<strong>UserContacts</strong>
<img src="https://github.com/tlilisouf/Phone-Contatcs-Management/blob/ScreenShots/ScreenShots/contacts.png">
