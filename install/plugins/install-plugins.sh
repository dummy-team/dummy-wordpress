#!/bin/sh 
# Install plugins list in plugins.txt file
# Require : WP-CLI Tools (wp command)
# Don't forget to change pluginfilepath variable
# Use in project root folder
# Add --activate parameter to automatically activate plugins
pluginsfilepath="your-project-path/wp-content/themes/skin/install/plugins/plugins.txt"

while read line
do
    #wp plugin install $line --activate
    wp plugin install $line
done < $pluginsfilepath
