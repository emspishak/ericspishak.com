#!/bin/bash

# Copies files to their correct locations

WEDDING="var/www/mandianderic2016.com"
WEDDING_WORKING="root/$WEDDING"

MANDI="var/www/aspishakthomas.com"
MANDI_WORKING="root/$MANDI"

rsync -r --exclude=*~ --exclude=$WEDDING --exclude=$MANDI --inplace root/* /
rsync -r --exclude=*~ --exclude=*.php --inplace $WEDDING_WORKING/* /$WEDDING
rsync -r --exclude=*~ --exclude=*.php --inplace $MANDI_WORKING/* /$MANDI

pushd root
PHPS=`find $WEDDING $MANDI -name "*.php"`
for PHP in $PHPS; do
    if [ $(basename $PHP) = "template.php" ]; then
        continue
    fi
    HTML=`echo $PHP | sed 's/\.php$/.html/'`
    php $PHP > /$HTML
done
popd
