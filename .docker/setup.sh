#!/bin/sh

# Setup of permissions
sudo chmod -R 777 ./.docker

# Creation of directories
mkdir -p ./.docker/mysql/data

echo 'Environment successfully set up!'

exit 0
