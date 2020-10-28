
N/B I assumed you have set up all the necessesary requirements to run a web application on you machine i.e php, mysql, apache, (xampp for windows user)


1) After cloning the repository, cd into it
2) Create a database on your mysql server
3) Access your database and copy paste the contents of COUNTIES.sql. Hit enter
    This will dump the data into your database
4) For linux users; Start your php server on your terminal i.e  "php -S 0.0.0.0:8000" without the quotes
   For windows users; just start your xampp. Make sure you cloned the repository into your your xampp/htdocs directory
5) For linux users; Open your browser and type in the url http://localhost/8000
   For windows users; Open your browser and type in the url http://localhost/name_of_repository_you_cloned . It should match project name in xampp/htdocs directory
