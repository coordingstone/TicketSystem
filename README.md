# TicketSystem

Local development environment:
MAMP

Setup virtual hosts MAMP -> https://www.taniarascia.com/setting-up-virtual-hosts/

Configuration for vhost:

#
# VirtualHost example:
# Document root and Directory points to your local path for this project
#
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
