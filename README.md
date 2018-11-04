# TicketSystem

Local development environment:

MAMP

Port:80

MySQL port: 3306

Requirements:

NPM

Composer

#1
Setup virtual hosts MAMP -> https://www.taniarascia.com/setting-up-virtual-hosts/

Configuration for vhost:

Local domain name: 127.0.0.1 ticketsystem.local

VirtualHost example:

Document root and Directory points to your local path for this project

    <VirtualHost *:80>
        php_admin_flag expose_php off
        ServerSignature Off

        ServerName ticketsystem.local

        CustomLog /Applications/MAMP/logs/http-ticketsystem-local-access.log combined
        ErrorLog /Applications/MAMP/logs/http-ticketsystem-local-error.log
        LogLevel warn
        ProxyRequests Off

        DocumentRoot /"LOCAL_PATH_TO_PROJECT"/TicketSystem/www/frontend
        <Directory /"LOCAL_PATH_TO_PROJECT"/TicketSystem/www/frontend>
            AllowOverride All
            Order allow,deny
            allow from all
        </Directory>

    </VirtualHost>
    

#2
Create a database named 'ticketsystem' with utf8_general_ci collation

Grant all privileges to username 'root' password 'root' on host '127.0.0.1'

Could be updated from config.ini.

#3
run npm install to install node_modules

#4 
run composer install to add vendor frameworks

#5
Open terminal and navigate to root folder of project (TicketSystem) -> run ./vendor/bin/doctrine-migrations migrations:migrate

Execute migrations by confirming ('y')

#6 
Open browser and navigate to http://localhost/tickets/#tickets

