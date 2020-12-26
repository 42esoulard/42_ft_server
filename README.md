# 42_ft_server
Install a complete web server, using a deployment technology named Docker.

- You must set up a web server with Nginx, in only one docker container. The container OS must be debian buster.
- Your web server must be able to run several services at the same time. The services will be a WordPress website, phpMyAdmin and MySQL. You will need to make sure your SQL database works with the WordPress and phpMyAdmin.
- Your server should be able to use the SSL protocol.
- You will have to make sure that, depending on the url, your server redirects to the correct website.
- You will also need to make sure your server is running with an autoindex that must be able to be disabled


**DOCKER COMMANDS :**
- Build docker image from dockerfile : 
   docker build -t nameofimage .

- Run docker image linking port 80 to 80 : 
  docker run -it -p 80:80 nameofimage

- Launch shell of container :
  docker exec -it containername bash

- Delete all stopped containers :
  docker container prune 

- Show all running containers :
  docker ps -a
	
- Show all created images :
  docker images

- Open port url (replace 12345 by port indicated by docker ps):
  curl localhost:12345
	
Written in january 2020.
