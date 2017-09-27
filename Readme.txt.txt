 
Notes:make sure to check design.doc and design.ppt before 
running this apps to understand how apps work and the features that apps  has
some error can be caused browser issue sometime it can be browser history or browser
 which does not support the script like example rss some browser can not support it

Testing Result:check on test folder


Step to create and Initialise The database.
   option no 1.

1.you can run only one file called runprogram.bat under source folder then it will do all task
for you to  install all database and run This Project.
Notes:skip no 2 and 3 option. to learn more how no 1 and no 2 work open learnmore.txt

    option no 2.
2.you can run only one file called setup.vbs  under source folder then it will do all task
for you to  install all database and run This Project;but make sure when 
you will finish check project you can stop this program by click on Stop_program.bat 
Notes:skip no 1 and 3 option.

3.option No 3.make sure to create  database and rename it news on wampserser(localhost under phpmyadmin).
my database name is called news and  is located under source folder .env file on line number 11 using
notepad++ or any editor;my database does not require password .
make sure that you have git
software on your computer because some command can be refused to run on cmd(command prompt)

click on source project folder and right click and choose git bash here and then git will be 
open type    php artisan migrate   

this command will migrate all table required for you.

after that run php artisan serve

Then open your web browser and type:localhost:8000 or http://localhost:8000 



Note:skip option no 1 and no 2
     make sure your wampserver does not need permission to be accessible;if it require password
     remove password option because my project setting there is no password required 






 