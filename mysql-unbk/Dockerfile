FROM mariadb:10.4
MAINTAINER Ahmad Sholihul <kartinisoftjepara@gmail.com>

# Definitioon of Databse
ENV MYSQL_DATABASE unbk

# Copy Data from script automatic during container startup
COPY ./dump /docker-entrypoint-initdb.d/


