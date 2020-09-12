# P2000-to-API
Sends each line of the command promp to the url so you can handle the request your own way.

## Setup
First, you will need to make a folder. in this folder you will clone this repo.
```cmd
mkdir ~/p2000-api/ && cd ~/p2000-api/
git clone https://github.com/JSTLWK-DEV/P2000-to-API.git
```
After that, make sure this script is working on your PI. You need to excute this under a screen so it will always be running.
```cmd
screen php ./p2000.php url
```
