#!/bin/bash

if [[ ! -d "/home/luthemes/public_html/wp-content/themes/luthemes" ]]; then
    mv -f "luthemes" "/home/luthemes/public_html/wp-content/themes/luthemes"
else
    rsync -r "luthemes/*" "/home/luthemes/public_html/wp-content/themes/luthemes"
fi