# elmacare-api

##DEVOPS

1 - Create and raise containers inside devops folder with: 

    docker-compose build
    docker-compose up -d

##SYMFONY

1 - Composer install
    
    composer install
    
2 - Database
    
    copy your .env.dist to .env and adapt to your configuration
    php bin/console doctrine:database:create
    php bin/console doctrine:migrations:migrate
    
3 - Edit you etc/host file and add:

    127.0.0.1 dev.elmacare.com
    
3 - Go to http://dev.elmacare.com:8080/api/doc

##ENDPOINTS
    
    /api/users/create: the "active" field simulates the fingerprint access
    /api/users/findAll: show all users
    
    /api/core/start: start the working day
    /api/core/end; ends working day and send report email
    
    /api/login: login the user and send email
 
##EMAIL

    email: rogerelmacare@gmail.com
    psw: elmacare2018
