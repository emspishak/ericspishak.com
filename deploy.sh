#!/bin/bash

# Copies files to their correct locations

WEDDING="var/www/mandianderic2016.com"
WEDDING_WORKING="root/$WEDDING"

rsync -r --exclude=*~ --exclude=$WEDDING --inplace root/* /
rsync -r --exclude=*~ --exclude=*.php --inplace $WEDDING_WORKING/* /$WEDDING

pushd root
PHPS=`find $WEDDING -name "*.php"`
for PHP in $PHPS; do
    if [ $(basename $PHP) = "template.php" ]; then
        continue
    fi
    HTML=`echo $PHP | sed 's/\.php$/.html/'`
    php $PHP > /$HTML
done
popd
