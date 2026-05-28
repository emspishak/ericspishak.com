#!/bin/bash

# Copies files to their correct locations

if [ ! -f .env ]; then
    echo "ERROR: missing .env file"
    exit 1
fi

source .env

if [[ ! -n "$SITE" ]]; then
    echo "ERROR: site should be set in .env"
    exit 1
fi

echo "site: $SITE"
echo "is static template: $IS_STATIC_TEMPLATE"
echo ""

WEB="$HOME/web"

if [[ "$IS_STATIC_TEMPLATE" = true ]]; then
    rsync -avh --exclude=*~ --exclude=*.php --inplace sites/$SITE/ $HOME/web/ --delete
    pushd "sites/$SITE"
    PHPS=`find . -name "*.php"`
    for PHP in $PHPS; do
	if [ $(basename $PHP) = "template.php" ]; then
            continue
	fi
	HTML=`echo $PHP | sed 's/\.php$/.html/'`
	php $PHP > $HOME/web/$HTML
    done
    popd
else
    rsync -avh --exclude=*~ --inplace sites/$SITE/ $HOME/web/ --delete
fi
