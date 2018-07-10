# homepolish-2018
Replatforming of homepolish.com

# Installation

At the command prompt, execute the following:
```
$ git clone https://github.com/Homepolish/homepolish-2018.git
$ cd homepolish-2018
```

# Docroot and Database setup

Download or clone the WordPress repo from https://github.com/WordPress/WordPress.git and copy all the files ~~EXCEPT for the wp-content directory~~ to the homepolish-2018 directory. We don't keep WordPress under version control; it's updated by WP Engine and we keep all of our wp-content files in the wp-content-2018 directory.

Open wp-config-hp.php and and enter your database username, password, etc, then save the file as wp-config.php. Do not modify wp-config-hp.php itself. Your new wp-config.php file is not under version control.

Download the database from https://my.wpengine.com/installs/devhp/phpmyadmin and load it into your local instance of MySQL. The latest will probably be the wp_homepolishwp database. The other is for the staging instance.

Set your local domain to use homepolish-2018 as your document root and you should be able to see the site, less images, because the WP_SITEURL is set to your local. You can point this at https://homepolishwp.wpengine.com to see images but if you visit yourlocal/wp-admin, you'll be redirected to https://homepolishwp.wpengine.com/wp-admin/

Please note that database changes and content updates in wp-admin should be made https://homepolishwp.wpengine.com/wp-admin. Databases should not move from your local to https://homepolishwp.wpengine.com. Get a fresh copy of the database if your local copy gets stale.

# Making changes to files in the styles directory

Currently, we use SASS to override those styles that were copied over from Hive in the svelt.css file. To use my method, 

```
$ cd ~/path/to/homepolish-2018/wp-content-2018/themes/thevoux-wp/assets/styles/scss/
``` 

Modify the SCSS files and 

```
$ cd ..
$ sass --watch scss:.
```

You can make a watcher file and start it like so:

```
$ echo "sass --watch scss:." > watch
$ chmod +x watch
$ ./watch
```

Commit your changes and to push to the homepolishwp.wpengine.com repo. This will push to Github and to homepolishwp.staging.wpengine.com. A tagged release will be required to push to the production instance  

```
$ git origin dev master
```