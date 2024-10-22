Email with Queue job install and work floww steps below
Step-1 : git clone 
Step-2 : cd projectname
Step-3 : php artisan queue:table
Step-4 : php artisan migrate
Step-5 : php artisan serve
Step-6 : php artisan queue:work --queue=emails
