<h1>Email with Queue job install and work floww steps below</h1>
<p>Step-1 : git clone https://github.com/pazhani6264/emailQueue.git</p>
<p>Step-2 : cd emailQueue</p>
<p>Step-3 : php artisan queue:table</p>
<p>Step-4 : php artisan migrate</p>
<p>Step-5 : php artisan serve</p>
<p>Step-6 : php artisan queue:work --queue=emails</p>
