#!/bin/sh 
# Create pages list in pages.txt file
# Require : WP-CLI Tools (wp command)
# Don't forget to change pluginfilepath variable
# Use in project root folder
pagesfilepath="/Users/sullivan/Sites/entre-cites/wp-content/themes/skin/install/contents/pages.txt"

while read line
do
    #echo $line
    wp post create --post_type=page --post_title="$line" --post_status=publish
done < $pagesfilepath