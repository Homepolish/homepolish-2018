# homepolish-2018
Replatforming of homepolish.com

# Installation

##1

At the command prompt, execute the following:
```
$ git clone https://github.com/Homepolish/homepolish-2018.git
$ cd homepolish-2018
```

##2

Download or clone the WordPress repo from https://github.com/WordPress/WordPress.git and copy all the files EXCEPT for the wp-content directory to the wp directory. We don't keep WordPress under version control; it's updated by WP Engine.

##3

Open wp-config-hp.php and and enter your database username, password, etc, then save the file as wp-config.php. Don't save or commit your changes to wp-config-hp.php.

##4

Download the database from https://my.wpengine.com/installs/devhp/phpmyadmin and load it into your local copy of MySQL.

##5

Set your local domain to use homepolish-2018 as your document root and you should be able to see the site, less images, because the devhp.wpengine.com instance where our dev site lives, is blocked by a .htpasswd file.

# Making changes to files in the directory

Commit your changes and to push to the devhp.wpengine.com repo, commit to the remote repo "dev"

```
$ git push dev master
```

Please note that database changes and content updates in wp-admin should be made https://devhp.wpengine.com/wp-admin. Databases should not move from your local to https://devhp.wpengine.com. Get a fresh copy of the database if your local copy gets stale.

Currently, we use SASS to override some styles from https://homepolish.com. To use my method, 

```
$ cd ~/path/to/homepolish-2018/wp-content/themes/homepolish-2018/assets/styles/scss/
``` 

Modify the SCSS files and 

```
$ cd ..
$ sass --watch scss:.
```

After When all of your changes have been pushed to devhp.wpengine.com, push to Github

```
$ git push origin master
```