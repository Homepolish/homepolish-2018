# homepolish-2018
Replatforming of homepolish.com

## Installation

1. At the command prompt, execute the following:
```
$ git clone https://github.com/Homepolish/homepolish-2018.git
$ cd homepolish-2018
$ git submodule update --init --recursive
```

This will clone the Homepolish Git repo and the submodule and then do a pull on the submodule which points to our WordPress installation at WP Engine.

Download or clone the WordPress repo from https://github.com/WordPress/WordPress.git and copy all the files EXCEPT for the wp-content directory to the wp directory. We don't keep WordPress under version control; it's updated by WP Engine.

Open wp-config-hp.php and and enter your database username, password, etc, then save the file as wp-config.php. Don't save or commit your changes to wp-config-hp.php.

Download the database from https://my.wpengine.com/installs/devhp/phpmyadmin and load it into your local copy of MySQL.

Set your domain to use the wp directory as your root and if all has gone well, you should see an update database button.

2. Making changes to files in the wp directory

Commit your changes and view them on https://devhp.wpengine.com. (Please note that database changes and content updates in wp-admin should be made https://devhp.wpengine.com/wp-admin. Databases should not move from your local to https://devhp.wpengine.com. Get a fresh copy of the database if your local copy gets stale.)

When you finish making your changes and have committed them to WP Engine, 

```
$ cd ..
$ pwd 
/PATH/TO/homepolish-2018
$ git status
modified:   wp (new commits)
$ git commit -am "Your message"
$ git push
```

This will push submodule changes to the Homepolish Github repo.
