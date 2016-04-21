## Installation
#### Prerequisites
* Linux based host
* Installed web server (i.e. nginx or Apache)
..* Note: Must have PHP installed and set up
* MySQL installed and configured (with root account and password)
* Access to root directory for the web server

#### Setting up
1. Download install/install.sh into the root directory for content on the webserver.
..* [install.sh link](https://github.com/6footgeek/FAWSAP/install/install.sh)
2. Run the script
..* `sudo sh ./install.sh`
3. Enter MySQL root account password when the prompt "Enter Password: " is shown


## Database access
For configuring the database, use either the root account if accessing locally or use the 'www'@'localhost' account to access the admin database of username, challenges and scores


