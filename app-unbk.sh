#!/bin/bash
# Application App-UNBK installation wrapper
# http://kartinisoft.com
#
# Currently Supported Operating Systems:
#
#   RHEL 5, 6, 7
#   CentOS 5, 6, 7
#   Debian 7, 8
#   Ubuntu 12.04 - 18.04
#

# Am I root?
if [ "x$(id -u)" != 'x0' ]; then
    echo 'Error: Skrip ini hanya dapat dijalankan dengan akses root'
    exit 1
fi

#Determine if Apache is installed on a system
if [[ -z $(apache2 -v 2>/dev/null) ]] && [[ -z $(httpd -v 2>/dev/null) ]]; then 
    echo "Apache tidak ditemukan"; 
else
    echo "Mulai hapus instalasi apache dari sistem"
    service apache2 stop
    apt-get purge apache2 apache2-utils apache2-bin apache2.2-common
    apt-get autoremove
    rm -rf /etc/apache2
    exit 1
fi

#Determine if Apache is installed on a system
if [[ -z $(mysql -v 2>/dev/null) ]] && [[ -z $(mysqld -v 2>/dev/null) ]]; then 
    echo "mysql tidak ditemukan"; 
else
    echo "Mulai hapus instalasi mysql dari sistem"
    service mysql stop
    killall -KILL mysql mysqld_safe mysqld
    apt-get --yes purge mysql-server mysql-client
    apt-get --yes autoremove --purge
    apt-get autoclean
    deluser --remove-home mysql
    delgroup mysql
    rm -rf /etc/apparmor.d/abstractions/mysql /etc/apparmor.d/cache/usr.sbin.mysqld /etc/mysql /var/lib/mysql /var/log/mysql* /var/log/upstart/mysql.log* /var/run/mysqld
    updatedb
    exit 1
fi

# Detect OS
case $(head -n1 /etc/issue | cut -f 1 -d ' ') in
    Debian)     type="debian" ;;
    Ubuntu)     type="ubuntu" ;;
    Amazon)     type="amazon" ;;
    *)          type="rhel" ;;
esac

# Check wget
if [ -e '/usr/bin/wget' ]; then
    wget https://raw.githubusercontent.com/ahmadsholik/repo-unbk/main/app-unbk-$type.sh -O app-unbk-$type.sh
    if [ "$?" -eq '0' ]; then
        bash app-unbk-$type.sh $*
        exit
    else
        echo "Error: app-unbk-$type.sh download failed."
        exit 1
    fi
fi

# Check curl
if [ -e '/usr/bin/curl' ]; then
    curl -O https://raw.githubusercontent.com/ahmadsholik/repo-unbk/main/app-unbk-$type.sh
    if [ "$?" -eq '0' ]; then
        bash app-unbk-$type.sh $*
        exit
    else
        echo "Error: app-unbk-$type.sh download failed."
        exit 1
    fi
fi

exit
