FROM alpine:3.7

RUN apk add --no-cache apache2 php5-apache2 php5-mysql php5-pdo php5-pdo_mysql php5-opcache php5-mysqli
RUN apk add --no-cache mysql mysql-client

# Settings for apache2 and mysql
RUN mkdir /run/apache2 \
  && chown -R apache:apache /run/apache2 \
  && mkdir -p /run/mysqld

EXPOSE 80
WORKDIR /

COPY my.cnf /etc/mysql/my.cnf
COPY startup.sh /
CMD sh startup.sh
