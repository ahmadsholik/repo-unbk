#!/bin/bash

#cek for update system
sudo apt-get update
sudo apt-get upgrade

# install Git application
sudo apt-get install git-all

# install Docker application
sudo apt-get install apt-transport-https ca-certificates curl software-properties-common
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
sudo apt-get install docker-ce

# install Docker Compose 
sudo curl -L "https://github.com/docker/compose/releases/download/1.26.0/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose
sudo ln -s /usr/local/bin/docker-compose /usr/bin/docker-compose

# install portainer for Docker Monitoring and Control
cd ~/
docker volume create portainer_data
docker run -d -p 8000:8000 -p 9000:9000 --name=portainer --restart=always -v /var/run/docker.sock:/var/run/docker.sock -v portainer_data:/data portainer/portainer-ce

# Download and Run Image Application UNBK from Docker Hub ahmadsholik Repository
docker pull ahmadsholik/app-unbk:1.2

# Download and Run Image Database UNBK from Docker Hub ahmadsholik Repository
docker pull ahmadsholik/mysql-unbk:1.1

# run image app-unbk and mysqldb to be a container with environment and many variable




